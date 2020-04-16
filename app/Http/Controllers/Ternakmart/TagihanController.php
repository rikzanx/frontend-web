<?php

namespace App\Http\Controllers\Ternakmart;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzelHttp\exception\RequestEcxception;
use Session;
use App\Http\Controllers\RestAPI;
use App\Http\Controllers\Controller;
use Spatie\Cors\DefaultProfile;


class TagihanController extends Controller
{
    public function getToken(){
        if(!Session::has('is_login') && !Session::get('is_login'))
            return redirect('login')->with('alert','Anda harus masuk dulu');
        $query=array(
            'email' => Session::get('email'),
            'password' => Session::get('password'),
        );
        $response = $this->postRequest('/auth/login',$query);
        if($response != null){
            return $access_token = $response['data']['access_token'];
        }else{
            return null;
        }
    }
    public function postRequest(string $uri = null,  array $formparams = []){
        $base = 'https://api.ternaknesia.com';
        $uri_base = $base.$uri;
        $client = new Client(['http_errors' => false]);
        $response = $client->request('POST',$uri_base,[
            'form_params' => $formparams
        ]);
        if($response->getStatusCode() == "200" || $response->getStatusCode() == "201"){
            return $data=json_decode($response->getBody(),true);
        }else{
            return null;
        }
    }

    public function tagihan($id){
        $url = '/order/myorder/'.$id;
        $query=array(
            'email' => Session::get('email'),
            'password' => Session::get('password'),
        );
        $response = $this->postRequest('/auth/login',$query);
        if(!empty($response['success'])){
            $access_token = $response['data']['access_token'];
            $client = new Client(['http_errors' => false]);
            $clients = new RestAPI($client);
            $query= array(
                'company_id' => '3'
            );
            $request = $clients->getRequestToken($url,$query,$access_token);
            $response = json_decode(json_encode($request),true);
            if($response['metode_bayar'] == 'transfer'){
                $request = $clients->getRequest('/master/payment_bank',$query);
                $bank = json_decode(json_encode($request),true);
                $bank = $bank['data']['result'];
                foreach($bank as $b){
                    if($b['id'] == $response['payment_bank_id']){
                        $data_bank = $b;
                    break;
                    }
                }
                return view('ternakmart.tagihan',[
                    'order_id' => $id,
                    'batas_pembayaran' => $response['batas_pembayaran'],
                    'grand_total' => number_format($response['grand_total'],2,",","."),
                    'no_invoice' => $response['no_invoice'],
                    'payment_bank_id' => $response['payment_bank_id'],
                    'payment_bank_name' => $response['payment_bank_name'],
                    'payment_bank_nama_rekening' => $response['payment_bank_nama_rekening'],
                    'payment_bank_nomor_rekening' => $response['payment_bank_nomor_rekening'],
                    'data_bank' => $data_bank,
                    'pembayaran' => $response['pembayaran']
                ]);
            }else{
                return redirect()->route('ternakmart.transaksi');
            }
            
        }else{
            return redirect('login')->with('alert','Silahkan coba login kembali');
        }
        
    }

    public function confirm(Request $request){
        if (!Session::has('is_login') && !Session::get('is_login'))
            return redirect()->route('home');

        $image_path = $request->file('proof')->getPathname();
        $image_mime = $request->file('proof')->getmimeType();
        $image_org  = $request->file('proof')->getClientOriginalName();

        $data = [
            [
                'name' => "company_id",
                'contents' => '3',
            ],
            [
                'name' => "order_id",
                'contents' => $request->order_id,
            ],
            [
                'name' => "payment_bank_id",
                'contents' => $request->payment_bank_id,
            ],
            [
                'name' => "jumlah",
                'contents' => $request->jumlah,
            ],
            [
                'name'     => 'proof',
                'filename' => $image_org,
                'Mime-Type'=> $image_mime,
                'contents' => fopen( $image_path, 'r' ),
            ],
        ];
        $client = new Client(['http_errors' => false]);
        $clients = new RestAPI($client);
        $access_token = $this->getToken();
        $post = $clients->postRequestToken('/order/confirm', [], $data,$access_token);
        if(isset($post->success) && $post->success){
            return response()->json([
                        'status' => 'ok'
                    ]);
        } else {
            return response()->json([
                'status' => 'gagal'
            ]);
        }
    }

}
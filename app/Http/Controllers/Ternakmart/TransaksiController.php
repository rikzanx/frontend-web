<?php

namespace App\Http\Controllers\Ternakmart;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzelHttp\exception\RequestEcxception;
use Session;
use App\Http\Controllers\RestAPI;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\UploadAble;
use App\Http\Controllers\Traits\FlashMessages;



class TransaksiController extends Controller
{
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

    public function transaksi(Request $request){
        if (Session::has('is_login') && Session::get('is_login'))
        {
            $client = new Client(['http_errors' => false]);
            $clients = new RestAPI($client);
            $company =3;
            $page=1;
            if($request->page){
                $page = $request->$page;
            }
            $query=array(
                'company_id' => $company,
                'page' => $page 
            );
            $access_token = $this->getToken();
            $post = $clients->getRequestToken('/order/myorder', $query,$access_token);
            $post = json_decode(json_encode($post),true);
            if($post['total'] > 0){
                return view('ternakmart.transaksi',[
                    'transaksi' => $post['data'],
                    'last_page' => $post['last_page']
                ]);

            }else{
                return view('ternakmart.transaksi',[
                    'transaksi' => [],
                    'last_page' => $post['last_page']
                ]);
            }
            

        }else{
            return redirect()->route('home');
        }  
    }

    public function detail($id){
        if (Session::has('is_login') && Session::get('is_login'))
        {
            $client = new Client(['http_errors' => false]);
            $clients = new RestAPI($client);
            $url='/order/myorder/'.$id;
            $access_token = $this->getToken();
            $post = $clients->getRequestToken($url,[],$access_token);
            $post = json_decode(json_encode($post),true);
            
            if(empty($post['success'])){
                return view('ternakmart.detail_transaksi',[
                    'transaksi' => $post,
                ]);
            }else{
                return redirect()->route('ternakmart.transaksi');
            }
            

        }else{
            return redirect()->route('home');
        }  
        
    }

    

    public function gets(){
        
    }
   
}

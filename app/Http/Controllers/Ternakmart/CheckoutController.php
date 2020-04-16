<?php

namespace App\Http\Controllers\Ternakmart;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzelHttp\exception\RequestEcxception;
use Session;
use App\Http\Controllers\RestAPI;
use App\Http\Controllers\Controller;
use Spatie\Cors\DefaultProfile;


class CheckoutController extends Controller
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
    public function rawPostRequest(string $uri = null,  array $data = [], string $token = null){
        $base = 'https://api.ternaknesia.com';
        $uri_base = $base.$uri;
        $data_raw = json_encode($data);
        $client = new Client(['http_errors' => false]);
        $response = $client->request('POST', $uri_base, [
            'headers' => [
                'Authorization' => 'Bearer '.$token,
                'Accept' => '*/*',
                'Content-Type' => 'application/json'
            ],
            'body' => $data_raw,
        ]);
        if($response->getStatusCode() == "200" || $response->getStatusCode() == "201"){
            return $data=json_decode($response->getBody(),true);
        }else{
            return null;
        }
    }
    public function checkout(Request $request){
        if(Session::has('is_login')){
            $client = new Client(['http_errors' => false]);
            $clients = new RestAPI($client);
            $query= array(
                'company_id' => '3'
            );
            $response = $clients->getRequest('/master/payment_bank',$query);
            $bank = json_decode(json_encode($response),true);
            $session = Session::get('cart');
            $loc = Session::get('loc');
            $data = Session::get('cart.data');
            date_default_timezone_set("Asia/Bangkok");
            $date = date("yy-m-d");
            if(!empty($loc))
            {
                if($data != null){
                    $product = $session['data'];
                    $jumlah = $session['jumlah'];
                    $total_harga = $session['total_harga'];
                    return view('ternakmart.checkout',[
                        'product' => $product,
                        'jumlah' => $jumlah,
                        'total_harga' => $total_harga,
                        'location' => $loc,
                        'bank' => $bank,
                        'date' => $date
                    ]);
                }else{
                    $jumlah = 0;
                    $total_harga = 0;
                    return view('ternakmart.checkout',[
                        'product' => '',
                        'jumlah' => $jumlah,
                        'total_harga' => $total_harga,
                        'location' => $loc,
                        'bank' => $bank,
                        'date' => $date
                    ]);
                }
            }else{
                return redirect('ternakmart/produk');
            }
        }else{
            return redirect('login')->with('alert','Anda harus masuk dulu');
        }
        
        
    }
    public function add_session_cart(Request $request){
        $value = Session::get('cart.data');
        if($value != null){
            $value = Session::get('cart.data');
            $id = $request->id;
            $cek = true;
            foreach($value as $key=>$v)
            {
                if($id == $v['id']){
                    $cek=false;
                    $index = $key;
                }
            }
            if($cek==false){
                $value[$index]['jumlah']++;
                Session::put('cart.data', $value);
                $jumlah = Session::get('cart.jumlah');
                $jumlah++;
                $total_harga = Session::get('cart.total_harga');
                $total_harga+= $request->harga;
                Session::put('cart.jumlah', $jumlah);
                Session::put('cart.total_harga', $total_harga);
            }else{
                $data = array(
                    'id' => $request->id,
                    'name' => $request->name,
                    'harga' => $request->harga,
                    'jumlah' => $request->jumlah
                );
                Session::push('cart.data', $data);
                $jumlah = Session::get('cart.jumlah');
                $jumlah++;
                $total_harga = Session::get('cart.total_harga');
                $total_harga += $request->harga;
                Session::put('cart.jumlah', $jumlah);
                Session::put('cart.total_harga', $total_harga);
            }
        }else{
            $data = array(
                'id' => $request->id,
                'name' => $request->name,
                'harga' => $request->harga,
                'jumlah' => $request->jumlah
            );
            $jumlah = 1;
            $total_harga = $request->harga;
            Session::push('cart.data', $data);
            Session::put('cart.jumlah', $jumlah);
            Session::put('cart.total_harga', $total_harga);
        }
    }
    public function delete_session_cart(Request $request){
        $value = Session::get('cart');
        if($value != null){
            $jumlah = Session::get('cart.jumlah');
            if($jumlah <= 1){
                //hapus semua data
                Session::forget('cart');
            }else{
                $data = Session::get('cart.data');
                $id = $request->id;
                $new_data = array();
                $total_harga = Session::get('cart.total_harga');
                $jumlah = Session::get('cart.jumlah');
                foreach($data as $key=>$d)
                {
                    if($id == $d['id']){
                        if($d['jumlah'] <= 1){
                            $jumlah--;
                            $total_harga-= $request->harga;
                        }else{
                            array_push($new_data,array(
                                'id' => $d['id'],
                                'name' => $request->nama,
                                'harga' => $request->harga,
                                'jumlah' => --$d['jumlah']
                            ));
                            $jumlah--;
                            $total_harga-=$request->harga;
                        }
                    }else{
                        array_push($new_data,array(
                            'id' => $d['id'],
                            'name' => $d['name'],
                            'harga' => $d['harga'],
                            'jumlah' => $d['jumlah']
                        ));
                    }
                }
                Session::put('cart.data',$new_data);
                Session::put('cart.jumlah',$jumlah);
                Session::put('cart.total_harga',$total_harga);
            }
        }
    }
    public function order(Request $request){
        $query=array(
            'email' => Session::get('email'),
            'password' => Session::get('password'),
        );
        $response = $this->postRequest('/auth/login',$query);
        if($response != null){
            $data = $response['data'];
            $access_token = $data['access_token'];
            $user_data = $data['user'];
            if(Session::has('loc')){
                $lokasi = Session::get('loc');
                $cart = Session::get('cart');
                $order_detail = Array();
                if( $request->nama_pembeli == '' || $request->nama_pembeli == NULL){
                    $nama_pembeli = $user_data['name'];
                }else{
                    $nama_pembeli = $request->nama_pembeli;
                }

                if( $request->email_pembeli == '' || $request->email_pembeli == NULL){
                    $email_pembeli = $user_data['email'];
                }else{
                    $email_pembeli = $request->email_pembeli;
                }
                foreach($cart['data'] as $produk){
                    $order = Array(
                        'id' => NULL,
                        'company_id' => 3,
                        'order_id' => NULL,
                        'product_id' => $produk['id'],
                        'gudang_id' => NULL,
                        'kurir_id' => NULL,
                        'peoduk' => $produk['name'],
                        'metode_kirim' => NULL,
                        'provinsi_id' => NULL,
                        'kota_id' => NULL,
                        'kecamatan_id' => NULL,
                        'desa_id' => NULL,
                        'alamat' => NULL,
                        'kode_pos' => NULL,
                        'lat' => NULL,
                        'lng' => NULL,
                        'delivery_date' => NULL,
                        'catatan' => NULL,
                        'sohibul' => NULL,
                        'qty' => $produk['jumlah'],
                        'harga' => $produk['harga'],
                        'subtotal' => $produk['harga'] * $produk['jumlah'],
                    );
                    array_push($order_detail,$order);
                }
                $data = array (
                    'id' => NULL,
                    'company_id' => 3,
                    'user_id' => $user_data['id'],
                    'tanggal_transaksi' => NULL,
                    'order_type' => 'sale',
                    'metode_bayar' => $request->metode_bayar,
                    'comment' => NULL,
                    'payment_bank_id' => $request->payment_bank_id,
                    'no_rekening' => $request->no_rekening,
                    'nama_akun' => $request->nama_rekening,
                    'name' => $nama_pembeli,
                    'telp' => $user_data['detail']['telp'],
                    'email' => $email_pembeli,
                    'address' => NULL,
                    'metode_kirim' => 'kirim',
                    'provinsi_id' => $lokasi['provinsi_id'],
                    'kota_id' => $lokasi['kota_id'],
                    'kecamatan_id' => $lokasi['kecamatan_id'],
                    'desa_id' => $lokasi['desa_id'],
                    'is_anonim' => NULL,
                    'alamat_kirim' => $lokasi['alamat_kirim'],
                    'address_note' => NULL,
                    'kode_pos' => $lokasi['kode_pos'],
                    'lat' => $lokasi['lat'],
                    'lng' => $lokasi['lng'],
                    'delivery_date' => $request->delivery_date,
                    'tanggal_tempo' => NULL,
                    'promo_id' => NULL,
                    'grand_total' => $cart['total_harga'],
                    'biaya_transaksi' => '0.0',
                    'diskon_persen' => '0.0',
                    'diskon_angka' => '0.0',
                    'kode_unik' => '0.0',
                    'terbayar' => '0.0',
                    'batas_pembayaran' => NULL,
                    'ongkos_kirim' => '0.0',
                    'catatan' => NULL,
                    'ref_code' => NULL,
                    'from' => NULL,
                    'order_detail' => $order_detail,
                );
                $order = $this->rawPostRequest('/order/checkout',$data,$access_token);
                if($order != null){
                    $data = $order['data'];
                    Session::forget('cart');
                    return response()->json([
                        'status' => 'ok',
                        'no_tagihan' => $data['id'],
                        'tanggal' => $request->delivery_date
                    ]);
                }else{
                    return response()->json([
                        'status' => 'gagal'
                    ]);
                }
            }else{
                return response()->json([
                    'status' => 'lokasi'
                ]);
            }
        }else{
            return response()->json([
                'status' => 'login'
            ]);
        }
    }
}
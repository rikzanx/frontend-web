<?php

namespace App\Http\Controllers\Ternakmart;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzelHttp\exception\RequestEcxception;
use Session;
use App\Http\Controllers\RestAPI;
use App\Http\Controllers\Controller;
use Spatie\Cors\DefaultProfile;


class ProdukController extends Controller
{
    public function produk(Request $request){
        $client = new Client(['http_errors' => false]);
        $clients = new RestAPI($client);
        $query = array(
            'company_id' => '3'
        );
        $response = $clients->getRequest('/produk/kategori_produk',$query);
        $category_list = json_decode(json_encode($response),true);
        $loc = Session::get('loc');
        if($category_list != null){
            $category =13;
            $page=1;
            if($request->category)
            {
                $category = $request->category;
            }
            if($request->page){
                $page = $request->$page;
            }
            if(empty($loc['lat']) || $request->lat == "")
            {
                return view('ternakmart.produk',[
                    'lat' => '',
                    'lng' => '', 
                    'produk' => '',
                    'category_list' => $category_list,
                    'category' => $category
                ]);
            }else{
                $loc = array(
                    'lat' => $request->lat,
                    'lng' => $request->lng
                );
                $query = array(
                    'lat' => $request->lat,
                    'lng' => $request->lng,
                    'category_id' => $category,
                    'company_id' => '3',
                    'page'=>$page
                );
                $response = $clients->getRequest('/produk/produk',$query);
                $response = json_decode(json_encode($response),true);
                $cart = Session::get('cart');
                $produk = Session::get('cart.data');
                if($cart != null){
                    return view('ternakmart.produk',[
                        'lat' => $request->lat,
                        'lng' => $request->lng, 
                        'produk' => $response['data']['result'],
                        'category_list' => $category_list,
                        'category' => $category,
                        'pagination' => $response['data']['pagination']['last_page'],
                        'cart_data' => $cart['data'],
                        'cart_jumlah' => $cart['jumlah'],
                        'total_harga' => $cart['total_harga']
                    ]);
                }else{
                    return view('ternakmart.produk',[
                        'lat' => $request->lat,
                        'lng' => $request->lng, 
                        'produk' => $response['data']['result'],
                        'category_list' => $category_list,
                        'category' => $category,
                        'pagination' => $response['data']['pagination']['last_page'],
                        'cart_data' => array(),
                        'cart_jumlah' => 0,
                        'total_harga' => 0
                    ]);
                }  
            } 
        }
    }
    public function check_location(Request $request){
        $lokasi = Array(
            'lat' => $request->lat,
            'lng' => $request->lng,
            'provinsi_id' => '',
            'kota_id' => '',
            'kecamatan_id' => '',
            'desa_id' => '',
            'alamat_kirim' => '',
            'kode_pos' => $request->kode_pos,
            'alamat_lengkap' => $request->alamat_lengkap
        );
        $client = new Client(['http_errors' => false]);
        $clients = new RestAPI($client);
        $lat = $request->lat;
        $lng = $request->lng;
        $address = $request->address;
        if(count($address) == 6){
            $provinsi= $address[4]['long_name'];
            $kota= $address[3]['long_name'];
            $kecamatan= $address[2]['long_name'];
            $desa= $address[1]['long_name'];
            $alamat_kirim= $address[0]['long_name'];
            $lokasi['alamat_kirim'] = $alamat_kirim;

            $provinsi_check = false;
            $kota_check = false;
            $kecamatan_check = false;
            $desa_check = false;

            $response = $clients->getRequest('/master/wilayah/provinsi');
            $provinsi_data = json_decode(json_encode($response),true);
            foreach($provinsi_data['data'] as $prov){
                if(strpos($provinsi, $prov['name']) !== false){
                    $provinsi_check = true;
                    $lokasi['provinsi_id'] = $prov['id'];
                    $api = '/master/wilayah/'.$prov['id'].'/kota';
                    $response = $clients->getRequest($api);
                    $kota_data = json_decode(json_encode($response),true);
                    foreach($kota_data['data'] as $k){
                        if(strpos($kota,$k['name']) !== false){
                            $kota_check = true;
                            $lokasi['kota_id'] = $k['id'];
                            $api = '/master/wilayah/'.$k['id'].'/kecamatan';
                            $response = $clients->getRequest($api);
                            $kecamatan_data = json_decode(json_encode($response),true);
                            foreach($kecamatan_data['data'] as $kec){
                                if(strpos($kecamatan,$kec['name']) !== false){
                                    $kecamatan_check = true;
                                    $lokasi['kecamatan_id'] = $kec['id'];
                                    $api = '/master/wilayah/'.$kec['id'].'/desa';
                                    $response = $clients->getRequest($api);
                                    $desa_data = json_decode(json_encode($response),true);
                                    foreach($desa_data['data'] as $des){
                                        if(strpos($desa,$des['name']) !== false){
                                            $desa_check = true;
                                            $lokasi['desa_id'] = $des['id'];
                                            break;
                                        }
                                    }
                                    break;
                                }
                            }
                            break;
                        }
                    }
                    break;
                }
            }
            if($provinsi_check && $kota_check && $kecamatan_check && $desa_check){
                $this->set_location_session($lokasi);
                return response()->json([
                    'status' => 'ok',
                    'lat' => $lokasi['lat'],
                    'lng' => $lokasi['lng']
                ]);
            }else{
                return response()->json([
                    'status' => 'flase'
                ]);
            }

        }else{
            $provinsi= $address[3]['long_name'];
            $kota= $address[2]['long_name'];
            $kecamatan= $address[1]['long_name'];
            $desa= $address[0]['long_name'];
            $alamat_kirim='';

            $provinsi_check = false;
            $kota_check = false;
            $kecamatan_check = false;
            $desa_check = false;

            $response = $clients->getRequest('/master/wilayah/provinsi');
            $provinsi_data = json_decode(json_encode($response),true);
            foreach($provinsi_data['data'] as $prov){
                if(strpos($provinsi, $prov['name']) !== false){
                    $provinsi_check = true;
                    $lokasi['provinsi_id'] = $prov['id'];
                    $api = '/master/wilayah/'.$prov['id'].'/kota';
                    $response = $clients->getRequest($api);
                    $kota_data = json_decode(json_encode($response),true);
                    foreach($kota_data['data'] as $k){
                        if(strpos($kota,$k['name']) !== false){
                            $kota_check = true;
                            $lokasi['kota_id'] = $k['id'];
                            $api = '/master/wilayah/'.$k['id'].'/kecamatan';
                            $response = $clients->getRequest($api);
                            $kecamatan_data = json_decode(json_encode($response),true);
                            foreach($kecamatan_data['data'] as $kec){
                                if(strpos($kecamatan,$kec['name']) !== false){
                                    $kecamatan_check = true;
                                    $lokasi['kecamatan_id'] = $kec['id'];
                                    $api = '/master/wilayah/'.$kec['id'].'/desa';
                                    $response = $clients->getRequest($api);
                                    $desa_data = json_decode(json_encode($response),true);
                                    foreach($desa_data['data'] as $des){
                                        if(strpos($desa,$des['name']) !== false){
                                            $desa_check = true;
                                            $lokasi['desa_id'] = $des['id'];
                                            break;
                                        }
                                    }
                                    break;
                                }
                            }
                            break;
                        }
                    }
                    break;
                }
            }

            if($provinsi_check && $kota_check && $kecamatan_check && $desa_check){
                $this->set_location_session($lokasi);
                return response()->json([
                    'status' => 'ok',
                    'lat' => $lokasi['lat'],
                    'lng' => $lokasi['lng']
                ]);
            }else{
                return response()->json([
                    'status' => 'flase'
                ]);
            }
        }
        
    }
    public function set_location_session($lokasi){
        Session::put('loc',$lokasi);
    }
}
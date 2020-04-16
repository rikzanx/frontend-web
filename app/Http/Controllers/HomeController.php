<?php

namespace App\Http\Controllers;

use App\Http\Controllers\RestAPI;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Session;

class HomeController extends Controller
{
    protected $url;

    public function __construct()
    {
        $this->url = env('URL_API');
    }

    public function index(Request $request)
    {
        if (Session::has('login')) {
            return redirect()->route('home');
        } else {
            return redirect('login')->with('alert', 'Anda harus masuk dulu');
        }
    }

    public function login_check(Request $request)
    {
        $client = new Client(['http_errors' => false]);
        $response = $client->request('POST', $this->url . 'auth/login', [
            'form_params' => [
                'email' => $request->email,
                'password' => $request->password,
            ],
        ]);
        if ($response->getStatusCode() == "200") {
            $data = json_decode($response->getBody(), true);

            Session::put('access_token', $data['data']['access_token']);
            Session::put('is_login', "1");
            Session::put('user_data', $data['data']['user']);
            Session::save();

            toastr()->success('Berhasil Login');

            if (Session::get('open_checkout_ternakinvest')) {
                return redirect()->route('ternakinvest.checkout');
            } else {
                return redirect()->route('home');
            }
        } else {
            return redirect('login')->with('alert', 'Email / Password Salah');
        }
    }

    public function register_post(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3|max:50',
            'email' => 'email',
            'password' => 'min:6|required_with:password_verif|same:password_verif',
            'password_verif' => 'min:6',
        ]);
        $client = new Client(['http_errors' => false]);
        $response = $client->request('POST', $this->url . 'auth/signup', [
            'form_params' => [
                'email' => $request->email,
                'password' => $request->password,
                'password_confirmation' => $request->password_verif,
                'name' => $request->name,
                'telp' => $request->telp,
            ],
        ]);
        if ($response->getStatusCode() == "201") {
            $data = json_decode($response->getBody(), true);
            return redirect('register-verification')->with([
                'alert-success' => $data['message'],
                'email' => $request->email,
            ]);
        } else {
            return redirect('register')->with('alert', 'Daftar Gagal email sudah dipakai');
        }
    }
    public function registerverification_post(Request $request)
    {
        $client = new Client(['http_errors' => false]);
        $response = $client->request('POST', $this->url . 'auth/verify', [
            'form_params' => [
                'token' => $request->token,
                'email' => $request->email,

            ],
        ]);
        if ($response->getStatusCode() == "201") {
            $data = json_decode($response->getBody(), true);
            return redirect('register-verification')->with([
                'alert-success' => $data['message'],
                'email' => $request->email,
            ]);
        } else {
            return redirect('register')->with('alert', 'Daftar Gagal email sudah dipakai');
        }
    }
    public function password_reset_create(Request $request)
    {
        $client = new Client(['http_errors' => false]);
        $response = $client->request('POST', $this->url . 'auth/forgot/password', [
            'form_params' => [
                'email' => $request->email,
            ],
        ]);
        $data = json_decode($response->getBody(), true);
        if ($response->getStatusCode() == "201") {
            Session::put('email_reset', $request->email);
            return redirect('password-reset')->with([
                'alert-success' => $data['message'],
            ]);
        } else {
            return redirect('password-reset')->with([
                'alert' => $data['message'],
            ]);
        }
    }
    public function password_reset_action(Request $request)
    {
        $client = new Client(['http_errors' => false]);
        $response = $client->request('POST', $this->url . 'password/reset', [
            'form_params' => [
                'email' => $request->email,
                'token' => $request->token,
                'password' => $request->password,
                'password_confirmation' => $request->password_confirmation,
            ],
        ]);
        $data = json_decode($response->getBody(), true);
        if ($response->getStatusCode() == "200") {
            return redirect('password-reset')->with([
                'alert-success' => $data['message'],
            ]);
        } else {
            return redirect('password-reset')->with([
                'alert' => $data['message'],
            ]);
        }
    }

    public function ternakmart_market(Request $request)
    {

    // public function product(Request $request)
    // {
        $client = new Client(['http_errors' => false]);
        $clients = new RestAPI($client);
        $query = array(
            'company_id' => '3',
        );
        $response = $clients->getRequest('/produk/kategori_produk', $query);
        $category_list = json_decode(json_encode($response), true);
        if ($category_list != null) {
            $category = 13;
            $page = 1;
            if ($request->category) {
                $category = $request->category;
            }
            if ($request->page) {
                $page = $request->$page;
            }
            if (!$request->lat || !$request->lng) {
                return view('ternakmart_product', [
                    'lat' => '',
                    'lng' => '',
                    'produk' => '',
                    'category_list' => $category_list,
                    'category' => $category,
                ]);
            } else {
                $loc = array(
                    'lat' => $request->lat,
                    'lng' => $request->lng,
                );
                Session::put('cart.loc', $loc);
                $query = array(
                    'lat' => $request->lat,
                    'lng' => $request->lng,
                    'category_id' => $category,
                    'company_id' => '3',
                    'page' => $page,
                );
                $response = $clients->getRequest('/produk/produk', $query);
                $response = json_decode(json_encode($response), true);
                $cart = Session::get('cart');
                $produk = Session::get('cart.data');
                if ($produk != null) {
                    return view('ternakmart_produk', [
                        'lat' => $request->lat,
                        'lng' => $request->lng,
                        'produk' => $response['data']['result'],
                        'category_list' => $category_list,
                        'category' => $category,
                        'pagination' => $response['data']['pagination']['last_page'],
                        'cart_data' => $cart['data'],
                        'cart_jumlah' => $cart['jumlah'],
                        'total_harga' => $cart['total_harga'],
                    ]);
                } else {
                    return view('ternakmart_produk', [
                        'lat' => $request->lat,
                        'lng' => $request->lng,
                        'produk' => $response['data']['result'],
                        'category_list' => $category_list,
                        'category' => $category,
                        'pagination' => $response['data']['pagination']['last_page'],
                        'cart_data' => array(),
                        'cart_jumlah' => 0,
                        'total_harga' => 0,
                    ]);
                }
            }
        }
    }
    public function showProduct()
    {
        $value = Session::get('cart.loc');
        dd($value);
    }
    public function addProduct(Request $request)
    {
        $value = Session::get('cart.data');
        if ($value != null) {
            $value = Session::get('cart.data');
            $id = $request->id;
            $cek = true;
            foreach ($value as $key => $v) {
                if ($id == $v['id']) {
                    $cek = false;
                    $index = $key;
                }
            }
            if ($cek == false) {
                $value[$index]['jumlah']++;
                Session::put('cart.data', $value);
                $jumlah = Session::get('cart.jumlah');
                $jumlah++;
                $total_harga = Session::get('cart.total_harga');
                $total_harga += $request->harga;
                Session::put('cart.jumlah', $jumlah);
                Session::put('cart.total_harga', $total_harga);
            } else {
                $data = array(
                    'id' => $request->id,
                    'name' => $request->name,
                    'harga' => $request->harga,
                    'jumlah' => $request->jumlah,
                );
                Session::push('cart.data', $data);
                $jumlah = Session::get('cart.jumlah');
                $jumlah++;
                $total_harga = Session::get('cart.total_harga');
                $total_harga += $request->harga;
                Session::put('cart.jumlah', $jumlah);
                Session::put('cart.total_harga', $total_harga);
            }
        } else {
            $data = array(
                'id' => $request->id,
                'name' => $request->name,
                'harga' => $request->harga,
                'jumlah' => $request->jumlah,
            );
            $jumlah = 1;
            $total_harga = $request->harga;
            Session::push('cart.data', $data);
            Session::put('cart.jumlah', $jumlah);
            Session::put('cart.total_harga', $total_harga);
        }
    }

    public function deleteProduct(Request $request)
    {
        $value = Session::get('cart');
        if ($value != null) {
            $jumlah = Session::get('cart.jumlah');
            if ($jumlah <= 1) {
                //hapus semua data
                Session::forget('cart');
            } else {
                $data = Session::get('cart.data');
                $id = $request->id;
                $new_data = array();
                $total_harga = Session::get('cart.total_harga');
                $jumlah = Session::get('cart.jumlah');
                foreach ($data as $key => $d) {
                    if ($id == $d['id']) {
                        if ($d['jumlah'] <= 1) {
                            $jumlah--;
                            $total_harga -= $request->harga;
                        } else {
                            array_push($new_data, array(
                                'id' => $d['id'],
                                'name' => $request->nama,
                                'harga' => $request->harga,
                                'jumlah' => --$d['jumlah'],
                            ));
                            $jumlah--;
                            $total_harga -= $request->harga;
                        }
                    } else {
                        array_push($new_data, array(
                            'id' => $d['id'],
                            'name' => $d['name'],
                            'harga' => $d['harga'],
                            'jumlah' => $d['jumlah'],
                        ));
                    }
                }
                Session::put('cart.data', $new_data);
                Session::put('cart.jumlah', $jumlah);
                Session::put('cart.total_harga', $total_harga);
            }
        }
    }

    public function checkout(Request $request)
    {
        $session = Session::get('cart');
        $data = Session::get('cart.data');
        if ($data != null) {
            $product = $session['data'];
            $jumlah = $session['jumlah'];
            $total_harga = $session['total_harga'];
            $loc = $session['loc'];
            return view('ternakmart_checkout', [
                'product' => $product,
                'jumlah' => $jumlah,
                'total_harga' => $total_harga,
                'location' => $loc,
            ]);
        } else {
            $jumlah = 0;
            $total_harga = 0;
            $loc = $session['loc'];
            return view('ternakmart_checkout', [
                'product' => '',
                'jumlah' => $jumlah,
                'total_harga' => $total_harga,
                'location' => $loc,
            ]);
        }

    }

    public function logout(Request $request)
    {
        Session::forget('login');
        Session::flush();
        return redirect('login')->with('alert-success', 'Berhasil logout ');
    }
}

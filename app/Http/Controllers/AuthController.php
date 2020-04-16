<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Session;
use App\Http\Controllers\RestAPI;

class AuthController extends Controller
{
    //
    public function index(Request $request){
        if(Session::has('login')){
            return redirect()->back();
        }else{
            return redirect('login')->with('alert','Anda harus masuk dulu');
        }
    }
    public function login_check(Request $request){
        $client = new Client(['http_errors' => false]);
        $response = $client->request('POST','https://api.ternaknesia.com/auth/login',[
            'form_params' => [
                'email' => $request->email,
                'password' => $request->password
            ]
        ]);
        if($response->getStatusCode() == "200"){
            Session::put('email',$request->email);
            Session::put('password',$request->password);
            Session::put('is_login',true);
            $login = Session::get('is_login');
            if($login){
                return redirect()->route('home');
            }else{
                return redirect('login')->with('alert','Silahkan coba login kembali');
            }
        }else{
            return redirect('login')->with('alert','Email / Password Salah');
        }
    }
    public function register_post(Request $request){
        $this->validate($request, [
            'name' => 'required|min:3|max:50',
            'email' => 'email',
            'password' => 'min:6|required_with:password_verif|same:password_verif',
            'password_verif' => 'min:6'
        ]);
        $client = new Client(['http_errors' => false]);
        $response = $client->request('POST','https://api.ternaknesia.com/auth/signup',[
            'form_params' => [
                'email' => $request->email,
                'password' => $request->password,
                'password_confirmation' => $request->password_verif,
                'name' => $request->name,
                'telp' => $request->telp
            ]
        ]);
        if($response->getStatusCode()== "201"){
            $data=json_decode($response->getBody(),true);
            return redirect('register-verification')->with([
                'alert-success' => $data['message'],
                'email' => $request->email
            ]);
        }else{
            return redirect('register')->with('alert','Daftar Gagal email sudah dipakai');
        }
    }
    public function registerverification_post(Request $request){
        $client = new Client(['http_errors' => false]);
        $response = $client->request('POST','https://api.ternaknesia.com/auth/verify',[
            'form_params' => [
                'token' => $request->token,
                'email' => $request->email
                
            ]
        ]);
        if($response->getStatusCode()== "201"){
            $data=json_decode($response->getBody(),true);
            return redirect('register-verification')->with([
                'alert-success' => $data['message'],
                'email' => $request->email
            ]);
        }else{
            return redirect('register')->with('alert','Daftar Gagal email sudah dipakai');
        }
    }
    public function password_reset_create(Request $request){
        $client = new Client(['http_errors' => false]);
        $response = $client->request('POST','https://api.ternaknesia.com/auth/forgot/password',[
            'form_params' => [
                'email' => $request->email     
            ]
        ]);
        $data=json_decode($response->getBody(),true);
        if($response->getStatusCode()== "201"){
            Session::put('email_reset',$request->email);
            return redirect('password-reset')->with([
                'alert-success' => $data['message']
            ]);
        }else{
            return redirect('password-reset')->with([
                'alert' => $data['message']
            ]);
        }
    }
    public function password_reset_action(Request $request){
        $client = new Client(['http_errors' => false]);
        $response = $client->request('POST','https://api.ternaknesia.com/password/reset',[
            'form_params' => [
                'email' => $request->email,
                'token' => $request->token,     
                'password' => $request->password,     
                'password_confirmation' => $request->password_confirmation     
            ]
        ]);
        $data=json_decode($response->getBody(),true);
        if($response->getStatusCode()== "200"){
            return redirect('password-reset')->with([
                'alert-success' => $data['message']
            ]);
        }else{
            return redirect('password-reset')->with([
                'alert' => $data['message']
            ]);
        }
    }
    public function logout(Request $request){
        Session::forget('login');
        Session::flush();
        return redirect()->back();
        //return redirect('login')->with('alert-success','Berhasil logout ');
    }
}

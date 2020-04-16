<?php

namespace App\Http\Controllers\Ternakmart;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzelHttp\exception\RequestEcxception;
use Session;
use App\Http\Controllers\RestAPI;
use App\Http\Controllers\Controller;
use Spatie\Cors\DefaultProfile;


class HomeController extends Controller
{
    public function index(){
        return view('ternakmart');
    }

    public function user(){
        $data = Session::all();
        dd($data);
    }
}

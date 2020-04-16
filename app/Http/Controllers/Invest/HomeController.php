<?php

namespace App\Http\Controllers\Invest;

use Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzelHttp\exception\RequestEcxception;
use App\Http\Controllers\RestAPI;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        return view('ternakinvest.index');
    }
}

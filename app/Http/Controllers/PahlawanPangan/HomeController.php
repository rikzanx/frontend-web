<?php

namespace App\Http\Controllers\PahlawanPangan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\RestAPI;

class HomeController extends Controller
{
    private $restAPI;
    private $companyId;

    public function __construct(RestAPI $restAPI)
    {
        $this->restAPI = $restAPI;
        $this->companyId = 5;
    }

    public function index(Request $request)
    {
        $data_donasi = $this->restAPI->getRequest('produk/produk', ['company_id' => $this->companyId]);

        if(isset($data_donasi->success) && $data_donasi->success){

            $results    = $data_donasi->data->result;

            return view('pahlawanPangan.index', compact('results'));
        } else {
            abort(404);
        }
    }

    public function detail($id = null)
    {
        $data_detail = $this->restAPI->getRequest('produk/produk/', ['company_id' => $this->companyId, 'id' => $id]);

        if(isset($data_detail->success) && $data_detail->success && !empty($id)){

            $results    = $data_detail->data->result;

            return view('pahlawanPangan.detail', compact('results'));
        } else {
            abort(404);
        }
    }
}

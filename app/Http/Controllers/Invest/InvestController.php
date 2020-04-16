<?php

namespace App\Http\Controllers\Invest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\RestAPI;
use Session;

class InvestController extends Controller
{
    private $restAPI;

    public function __construct(RestAPI $restAPI)
    {
        $this->restAPI = $restAPI;
    }

    public function index(Request $request)
    {
        dd(Session::all());
        $pagination  = null;
        $data_invest = $this->restAPI->getRequest('produk/produk', ['company_id' => 2]);

        if(isset($data_invest->success) && $data_invest->success){

            $results    = $data_invest->data->result;
            $pagination = $data_invest->data->pagination;
            $next_page  = substr($pagination->next_page_url, -1);

            return view('ternakinvest.produk', compact('results', 'pagination', 'next_page'));
        } else {
            abort(404);
        }
    }

    public function detail(Request $request, $id)
    {
        $invest = $this->restAPI->getRequest('produk/produk/' . $id);

        if($invest){
            $data = $invest;
            return view('ternakinvest.detail', compact('data'));
        } else {
            abort(404);
        }
    }

    public function loadData(Request $request)
    {
        $data        = "";
        $page        = $request->page;
        $pagination  = null;
        $data_invest = $this->restAPI->getRequest('produk/produk', ['company_id' => 2, 'page' => $page]);
        
        if(isset($data_invest->success) && $data_invest->success){
            $results    = $data_invest->data->result;
            $pagination = $data_invest->data->pagination;
            $next_page  = substr($pagination->next_page_url, -1);

            if(!empty($data_invest)){
                foreach($results as $result){
                    $data .= self::template($result);
                }
            }
        }

        return response()->json(["data" => $data, "next_page" => $next_page, "last_page" => $pagination->last_page], 200);
    }

    public static function template($data)
    {
        $html = '<div class="col-sm-12 col-md-12 col-lg-6">
        <div class="produk-box">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-4">
                    <img class="d-block w-100" src="">
                </div>
                <div class="col-sm-12 col-md-12 col-lg-8">
                    <div class="row container-title">
                        <div class="col-sm-10 col-md-10 col-lg-10">
                            <div class="title">
                                '.$data->nama.'
                            </div>
                        </div>
                        <div class="col-sm-2 col-md-2 col-lg-2">
                            <div class="like">
                                <embed src="' . asset('img/invest/like.svg') . '"></embed>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <div class="description">
                                <table>
                                    <tr>
                                        <td>Slot</td>
                                        <td>
                                            <p class="slot">
                                                '.$data->invest->total_stock.'
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>ROI</td>
                                        <td>
                                            <span class="roi">
                                                '.$data->invest->est_roi_min.'
                                                -
                                                '.$data->invest->est_roi_max.'
                                            </span>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-6 container-button">
                            <a href="'.route("ternakinvest.detail", $data->id).'" class="btn btn-large btn-invest">
                                Lihat Detail
                            </a>    
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>';

        return $html;
    }
}

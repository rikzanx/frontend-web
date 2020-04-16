<?php

namespace App\Http\Controllers\Invest;

use Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\RestAPI;
use App\Http\Controllers\Traits\UploadAble;
use App\Http\Controllers\Traits\FlashMessages;

class PaymentController extends Controller
{
    use UploadAble;
    use FlashMessages;
    private $restAPI;

    public function __construct(RestAPI $restAPI)
    {
        $this->restAPI = $restAPI;
    }

    public function payment()
    {
        if (!Session::has('is_login') && !Session::get('is_login'))
            return redirect()->route('home');

        $data_order     = session()->get('data_order');
        $payments       = $this->restAPI->getRequest('master/payment_bank');
        $payment_detail = $this->restAPI->getRequest('master/payment_bank/show/' . $data_order->payment_bank_id);

        $data_payments = [];
        foreach ($payments as $payment) {
            $data_payments[$payment->id] = $payment->name;
        }

        return view('ternakinvest.payment', compact('data_order', 'data_payments', 'payment_detail'));
    }

    public function postPayment(Request $request)
    {
        if (!Session::has('is_login') && !Session::get('is_login'))
            return redirect()->route('home');

        $image = $this->uploadOne($request->file('proof'), null, 'pembayaran_order');
        $image_path = $request->file('proof')->getPathname();
        $image_mime = $request->file('proof')->getmimeType();
        $image_org  = $request->file('proof')->getClientOriginalName();

        $data = [
            [
                'name' => "order_id",
                'contents' => session()->get('data_order')->id,
            ],
            [
                'name' => "payment_bank_id",
                'contents' => $request->payment_bank_id,
            ],
            [
                'name' => "jumlah",
                'contents' => session()->get('data_order')->grand_total,
            ],
            [
                'name'     => 'proof',
                'filename' => $image_org,
                'Mime-Type'=> $image_mime,
                'contents' => fopen( $image_path, 'r' ),

            ],
        ];

        $post = $this->restAPI->postRequest('order/confirm', [], $data);
        if(isset($post->success) && $post->success){
            Session::put('data_confirm', $post->data);

            toastr()->success('Berhasil Konfirm asi Pembayaran');
            return redirect()->route('ternakinvest.index');
        } else {
            $this->flashSuccessDelete($post->message);
            return redirect()->back()->withInput();
        }
    }
}

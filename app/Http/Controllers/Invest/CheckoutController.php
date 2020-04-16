<?php

namespace App\Http\Controllers\Invest;

use Session;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\RestAPI;
use App\Http\Controllers\Traits\FlashMessages;

class CheckoutController extends Controller
{
    use FlashMessages;
    private $restAPI;

    public function __construct(RestAPI $restAPI)
    {
        $this->restAPI = $restAPI;
    }

    public function checkout(Request $request)
    {
        dd($request->all(), session()->all());
        $id       = $request->id ?? Session::get('produk_id');
        $invest   = $this->restAPI->getRequest('produk/produk/' . $id);
        $payments = $this->restAPI->getRequest('master/payment_bank', ['company_id' => 2]);        
        $is_login = session()->get("is_login");

        if(!Session::has('produk_id') && $id !== null){
            session(['produk_id' => $id]);
        }

        if($id !== null && $invest){
            session(['produk_invest' => $invest]);
            session(['qty_order' => $request->qty]);
            session(['grand_total' => $request->qty * $invest->invest->price]);
            session(['open_checkout_ternakinvest' => "1"]);

            $data = $invest;

            session()->get('qty_order') < $request->qty ? toastr()->success('Berhasil Di Tambahkan') : toastr()->success('Berhasil Di Kurangi');

            return view('ternakinvest.checkout', compact('data', 'payments', 'is_login'));
        } else {
            return redirect()->route('ternakinvest.index');
        }
    }

    public function postCheckout(Request $request)
    {
        if (!Session::has('is_login') && !Session::get('is_login')){
            toastr()->success('Anda harus login');
            return redirect()->route('login');
        }
        
        $request->validate(['payment_bank_id' => 'required']);

        $user = session()->get('user_data');
        $invest   = $this->restAPI->getRequest('produk/produk/' . session()->get('produk_id'));
        $payment_detail = $this->restAPI->getRequest('master/payment_bank/show/' . $request->payment_bank_id);

        $data = [
            'user_id'         => $user->id,
            'metode_bayar'    => 'transfer',
            'payment_bank_id' => $request->payment_bank_id,
            'no_rekening'     => $payment_detail->data->nomor_rekening,
            'nama_akun'       => $payment_detail->data->nama_rekening,
            "name"            => $user->name,
            'telp'            => $user->detail->telp ?? "08549858495844",
            'email'           => $user->email,
            'address'         => null,
            'metode_kirim'    => 'ambil',
            'grand_total'     => session()->get('grand_total'),
            'delivery_date'   => Carbon::now()->format('Y-m-d H:i:s'),
            'order_detail'    => [
                [
                    "product_id" => $invest->data->id,
                    "qty"        => session()->get('qty_order'),
                    "harga"      => $invest->invest->price,
                    "subtotal"   => session()->get('grand_total'),
                ],
            ],
        ];

        $post = $this->restAPI->postRequest('order/checkout', $data);
        if(isset($post->success) && $post->success){
            Session::put('data_order', $post->data);

            toastr()->success('Berhasil Order Invest');
            return redirect()->route('ternakinvest.payment');
        } else {
            $this->flashSuccessDelete($post->message);
            return redirect()->back()->withInput();
        }
    }
}

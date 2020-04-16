<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
|--------------------------------------------------------------------------
| Landing
|--------------------------------------------------------------------------
|
|
*/
Route::get('/',function () {return view('beranda');})->name('home');
Route::get('/ternakmart', function () {
    return view('ternakmart');
})->name('ternakmart');
Route::get('/ternak-invest', function () {
    return view('ternak-invest');
})->name('ternak-invest');
Route::get('/tentang-kami', function () {return view('tentang-kami');})->name('tentang-kami');
Route::get('/pahlawan-pangan', function () {return view('pahlawan-pangan');})->name('pahlawan-pangan');

/*
|--------------------------------------------------------------------------
| Auth
|--------------------------------------------------------------------------
|
*/

//login
Route::get('/login',function(){ return view('login'); })->name('login');
Route::post('/login_check','AuthController@login_check')->name('login_check');

//register
Route::get('/register', function (){return view('register');})->name('register');
Route::post('/register_post','AuthController@register_post')->name('register_post');
Route::get('/register-verification',function(){return view('register-verification');})->name('register-verification');
Route::post('/register-verification_post','AuthController@registerverification_post')->name('register-verification_post');

//logout
Route::get('/logout','AuthController@logout')->name('logout');

//reset password
Route::get('/password-reset',function(){return view('password-reset');})->name('password-reset');
Route::get('/password-reset-form',function(){return view('password-reset-form');})->name('password-reset-form');
Route::post('/password-reset-action','AuthController@password_reset_action')->name('password-reset-action');
Route::post('/password-reset-create','AuthController@password_reset_create')->name('password-reset-create');

/*
|--------------------------------------------------------------------------
| SMARTQURBAN
|--------------------------------------------------------------------------
*/
Route::namespace('SmartQurban')
    ->name('smartqurban.')
    ->prefix('smartqurban')
    ->group(function () {
        // Index
        Route::get('', 'HomeController@index')->name('index');
    });

/*
|--------------------------------------------------------------------------
| PAHLAWAN PANGAN
|--------------------------------------------------------------------------
*/
Route::namespace('PahlawanPangan')
    ->name('pahlawanPangan.')
    ->prefix('pahlawan-pangan')
    ->group(function () {
        // Index
        Route::get('', 'HomeController@index')->name('index');
        
        // Detail
        Route::get('detail/{id?}', 'HomeController@detail')->name('detail');
    });
    
/*
|--------------------------------------------------------------------------
| TERNAKINVEST
|--------------------------------------------------------------------------
*/
Route::namespace('Invest')
    ->name('ternakinvest.')
    ->prefix('ternakinvest')
    ->group(function () {

        // Index
        Route::get('', 'HomeController@index')->name('index');

        // Produk
        Route::get('produk', 'InvestController@index')->name('index');
        Route::get('loadData', 'InvestController@loadData')->name('loadData');
        Route::get('produk/detail/{id}', 'InvestController@detail')->name('detail');

        // Checkout
        Route::post('tempCheckout', 'CheckoutController@tempCheckout')->name('tempCheckout');
        Route::post('checkout', 'CheckoutController@checkout')->name('checkout');
        Route::get('checkout', 'CheckoutController@checkout')->name('checkout');
        Route::post('postCheckout', 'CheckoutController@postCheckout')->name('postCheckout');

        // Payment
        Route::get('payment', 'PaymentController@payment')->name('payment');
        Route::post('postPayment', 'PaymentController@postPayment')->name('postPayment');

        // My Invest
        Route::get('myinvest', 'MyInvestController@index')->name('myinvest.index');
        Route::get('myinvest/detail', 'MyInvestController@detail')->name('myinvest.detail');

        //  My Invest Report
        Route::get('myinvest/report', 'MyInvestController@report')->name('myinvest.report');
    });

/*
|--------------------------------------------------------------------------
| TERNAKMART
|--------------------------------------------------------------------------
*/
Route::namespace('Ternakmart')
    ->name('ternakmart.')
    ->prefix('ternakmart')
    ->group(function(){
        //index
        Route::get('', 'HomeController@index')->name('index');

        //produk
        Route::get('/produk','ProdukController@produk')->name('produk');
        Route::post('/checkLocation','ProdukController@check_location')->name('checkLocation');
        Route::get('/getLocation','ProdukController@get_location_session')->name('getLocation');

        //checkout
        Route::get('/checkout','CheckoutController@checkout')->name('checkout');
        Route::post('/addSessionCart','CheckoutController@add_session_cart')->name('addProduct');
        Route::post('/deleteSessionCart','CheckoutController@delete_session_cart')->name('deleteProduct');
        Route::post('/order','CheckoutController@order')->name('order');

        Route::get('/user','HomeController@user');
        //transaksi
        Route::get('/transaksi','TransaksiController@transaksi')->name('transaksi');
        Route::get('/transaksi/{id}','TransaksiController@detail')->name('transaksi-detail');
        
        //tagihan
        Route::get('/tagihan',function(){ return redirect()->route('ternakmart.transaksi');})->name('tagihan');
        Route::get('/tagihan/{id}','TagihanController@tagihan');
        Route::post('/tagihan/confirm','TagihanController@confirm')->name('confirm');        
    });

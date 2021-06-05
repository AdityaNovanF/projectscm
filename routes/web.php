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
Route::get('/', function () {
    return view('guest.index');
});

Route::get('/landing', function () {
    return view('guest.index');
});

Route::get('/keluar', function () {
    \Auth::logout();
    return view('guest.index');
    // return redirect('/login');
});

Route::group(['middleware' => ['auth', 'checkRole:admin,kper,kpem,supplier']], function () {

    Route::get('/home', 'HomeController@index')->name('home');

    //Manage data barang
    Route::get('/barang', 'Barang_controller@index');

    Route::get('/barang/add', 'Barang_controller@add');
    Route::post('/barang/add', 'Barang_controller@store');

    Route::get('/barang/{id}', 'Barang_controller@edit');
    Route::put('/barang/{id}', 'Barang_controller@update');

    Route::delete('/barang/{id}', 'Barang_controller@delete');

    //Manage data pesanan
    Route::get('/pesanan', 'Pesanan_controller@index');

    Route::get('/pesanan/add', 'Pesanan_controller@add');
    Route::post('/pesanan/add', 'Pesanan_controller@store');

    Route::get('/pesanan/{id}', 'Pesanan_controller@edit');
    Route::put('/pesanan/{id}', 'Pesanan_controller@update');

    Route::delete('/pesanan/{id}', 'Pesanan_controller@delete');

    //Verifikasi pesanan
    Route::get('/verifpesanan', 'Verifpesanan_controller@index');

    Route::get('/verifpesanan/{id}', 'Verifpesanan_controller@edit');
    Route::put('/verifpesanan/{id}', 'Verifpesanan_controller@update');

    //Manage Events
    Route::resource('/events', 'Eventcontroller');
    Route::get('/addevent', 'Eventcontroller@showform');
    Route::get('/displaydata', 'Eventcontroller@show');
    Route::get('/displaydata/{id}', 'Eventcontroller@edit');
    Route::delete('/deletedata/{id}', 'Eventcontroller@destroy');
});

Auth::routes();

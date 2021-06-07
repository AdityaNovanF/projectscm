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
Route::get('/', 'HomeController@landing');
Route::get('/landing', 'HomeController@landing');
Route::get('/rumah/detail/{id}', 'HomeController@detailRumah');

Route::get('/keluar', function () {
    \Auth::logout();
    return view('guest.index');
    // return redirect('/login');
});

Route::group(['middleware' => ['auth', 'checkRole:admin,kper,kpem,supplier']], function () {

    // Route::get('/home', 'HomeController@index')->name('home');

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

Route::group(['middleware' => ['auth', 'checkRole:kper']], function () {
    Route::get('KPerumahan/home', 'PerumahanController@home');
    // Bahan Bangunan
    Route::get('/KPerumahan/bahanBangunan', 'BahanController@data');
    Route::get('/cariBahan', 'BahanController@cari');
    // Pesanan
    Route::get('/KPerumahan/pesanan', 'PesananController@data');
    // Supplier
    Route::get('/dataSupplier', 'SupplierController@data');
    Route::get('/cariSupplier', 'SupplierController@cari');
    Route::get('/Supplier/form', 'SupplierController@form');
    Route::post('/Supplier/tambah', 'SupplierController@tambah');
    Route::get('/Supplier/edit/{id}', 'SupplierController@edit');
    Route::post('/Supplier/update/{id}', 'SupplierController@update');
    Route::delete('/Supplier/hapus/{id}', 'SupplierController@hapus');
    Route::get('/KPerumahan/detail/{id}', 'SupplierController@detail');
    Route::get('/cariBarang', 'BarangController@cari');
    // Kepala Pembangunan
    Route::get('/dataKPembangunan', 'KPembangunanController@data');
    Route::get('/cariKPembangunan', 'KPembangunanController@cari');
    Route::get('/KPembangunan/form', 'KPembangunanController@form');
    Route::post('/KPembangunan/tambah', 'KPembangunanController@tambah');
    Route::get('/KPembangunan/edit/{id}', 'KPembangunanController@edit');
    Route::post('/KPembangunan/update/{id}', 'KPembangunanController@update');
    Route::delete('/KPembangunan/hapus/{id}', 'KPembangunanController@hapus');
    // Rumah
    Route::get('/dataRumah', 'RumahController@data');
    Route::get('/cariRumah', 'RumahController@cari');
    Route::get('/Rumah/form', 'RumahController@form');
    Route::post('/Rumah/tambah', 'RumahController@tambah');
    Route::get('/Rumah/edit/{id}', 'RumahController@edit');
    Route::post('/Rumah/update/{id}', 'RumahController@update');
    Route::delete('/Rumah/hapus/{id}', 'RumahController@hapus');
});    
Auth::routes();

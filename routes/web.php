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
    return view('welcome');
});
Route::post('user/store2', 'UserController@store2')->name('user.store2');
Route::group(['middleware' => 'auth'], function () {
    //    Route::get('/link1', function ()    {
//        // Uses Auth Middleware
//    });

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes
});

//-------------- ADMIN ---------------
Route::group(['middleware'=>['auth'],['admin']],function(){
//++++++++++++++ User ++++++++++++++++
Route::get('user', 'UserController@index')->name('user.index');
Route::get('user/create', 'UserController@create')->name('user.create');
Route::post('user/store', 'UserController@store')->name('user.store');
Route::get('user/edit/{id}', 'UserController@edit')->name('user.edit');
Route::put('user/update/{id}', 'UserController@update')->name('user.update');
Route::delete('user/hapus/{id}', 'UserController@destroy')->name('user.destroy');
//++++++++++++++ Masakan ++++++++++++++++
Route::get('masakan', 'MasakanController@index')->name('masakan.index');
Route::get('masakan/create', 'MasakanController@create')->name('masakan.create');
Route::post('masakan/store', 'MasakanController@store')->name('masakan.store');
Route::get('masakan/edit/{id}', 'MasakanController@edit')->name('masakan.edit');
Route::put('masakan/update/{id}', 'MasakanController@update')->name('masakan.update');
Route::delete('masakan/hapus/{id}', 'MasakanController@destroy')->name('masakan.destroy');
//++++++++++++++ Order ++++++++++++++++
Route::get('order', 'OrderController@index')->name('order.index');
Route::get('order/create', 'OrderController@create')->name('order.create');
Route::post('order/store', 'OrderController@store')->name('order.store');
Route::get('order/edit/{id}', 'OrderController@edit')->name('order.edit');
Route::put('order/update/{id}', 'OrderController@update')->name('order.update');
Route::delete('order/hapus/{id}', 'OrderController@destroy')->name('order.destroy');
//++++++++++++++ Detail Order ++++++++++++++++
Route::get('detail_order', 'Detail_orderController@index')->name('detail_order.index');
Route::get('detail_order/create', 'Detail_orderController@create')->name('detail_order.create');
Route::post('detail_order/store', 'Detail_orderController@store')->name('detail_order.store');
Route::get('detail_order/edit/{id}', 'Detail_orderController@edit')->name('detail_order.edit');
Route::put('detail_order/update/{id}', 'Detail_orderController@update')->name('detail_order.update');
Route::delete('detail_order/hapus/{id}', 'Detail_orderController@destroy')->name('detail_order.destroy');
//++++++++++++++ Transaksi ++++++++++++++++
Route::get('/payment', 'TransaksiController@index');
Route::get('/history', 'TransaksiController@history');
Route::post('/order/bayar/{id}', 'OrderController@bayar');
//++++++++++++++ User ++++++++++++++++
Route::get('laporan', 'LaporanController@cetak')->name('laporan.index');
//++++++++++++++ Meja ++++++++++++++++
Route::get('meja', 'MejaController@index')->name('meja.index');
Route::get('meja/create', 'MejaController@create')->name('meja.create');
Route::post('meja/store', 'MejaController@store')->name('meja.store');
Route::get('meja/edit/{id}', 'MejaController@edit')->name('meja.edit');
Route::put('meja/update/{id}', 'MejaController@update')->name('meja.update');
Route::get('daftarmenu', 'DaftarmenuController@index')->name('daftarmenu.index');
Route::post('daftarmenu/order', 'DaftarmenuController@order')->name('daftarmenu.order');
// Route::post('daftarmenu/detail_order', 'DaftarmenuController@detail_order')->name('daftarmenu.detail_order');
Route::put('daftarmenu/detail_order/{id}', 'DaftarmenuController@detail_order')->name('daftarmenu.detail_order');
Route::delete('detail_order/hapus/{id}', 'DaftarmenuController@destroy')->name('detail_order.destroy');
Route::post('daftarmenu/proses_pesanan', 'DaftarmenuController@proses_pesanan')->name('daftarmenu.proses_pesanan');
Route::get('/cart','DaftarmenuController@cart');
Route::post('/daftarmenu/finish/', 'DaftarmenuController@finish');
Route::get('/daftarmenu/status/{id}', 'DaftarmenuController@order');
Route::post('/order/verify/{id}', 'OrderController@verify');
Route::get('/order/invoice/{id}', 'OrderController@invoice');
Route::get('/reports', 'ReportsController@index');
Route::get('/reports/print', 'ReportsController@cetak');



});
//-------------- waiter ---------------
Route::group(['middleware'=>['auth'],['waiter']],function(){
Route::get('user', 'UserController@index')->name('user.index');
Route::get('user/create', 'UserController@create')->name('user.create');
Route::post('user/store', 'UserController@store')->name('user.store');
Route::get('user/edit/{id}', 'UserController@edit')->name('user.edit');
Route::put('user/update/{id}', 'UserController@update')->name('user.update');
Route::delete('user/hapus/{id}', 'UserController@destroy')->name('user.destroy');
//++++++++++++++ Order ++++++++++++++++
Route::get('order', 'OrderController@index')->name('order.index');
Route::get('order/create', 'OrderController@create')->name('order.create');
Route::post('order/store', 'OrderController@store')->name('order.store');
Route::get('order/edit/{id}', 'OrderController@edit')->name('order.edit');
Route::put('order/update/{id}', 'OrderController@update')->name('order.update');
Route::delete('order/hapus/{id}', 'OrderController@destroy')->name('order.destroy');
//++++++++++++++++ laporan ++++++++++++
});

//-------------- kasir ---------------
Route::group(['middleware'=>['auth'],['kasir']],function(){
//++++++++++++++ User ++++++++++++++++
Route::get('user', 'UserController@index')->name('user.index');
Route::get('user/create', 'UserController@create')->name('user.create');
Route::post('user/store', 'UserController@store')->name('user.store');
Route::get('user/edit/{id}', 'UserController@edit')->name('user.edit');
Route::put('user/update/{id}', 'UserController@update')->name('user.update');
Route::delete('user/hapus/{id}', 'UserController@destroy')->name('user.destroy');
//++++++++++++++ Transaksi ++++++++++++++++
Route::get('transaksi', 'TransaksiController@index')->name('transaksi.index');
Route::get('transaksi/create', 'TransaksiController@create')->name('transaksi.create');
Route::post('transaksi/store', 'TransaksiController@store')->name('transaksi.store');
Route::get('transaksi/edit/{id}', 'TransaksiController@edit')->name('transaksi.edit');
Route::put('transaksi/update/{id}', 'TransaksiController@update')->name('transaksi.update');
Route::delete('transaksi/hapus/{id}', 'TransaksiController@destroy')->name('transaksi.destroy');
});
//-------------- owner ---------------
Route::group(['middleware'=>['auth'],['owner']],function(){
//+++++++++++++ Laporan +++++++++++++
});
//-------------- pelanggan ---------------
Route::group(['middleware'=>['auth'],['pelanggan']],function(){
Route::get('meja', 'MejaController@index')->name('meja.index');
Route::get('daftarmenu', 'DaftarmenuController@index')->name('daftarmenu.index');
Route::post('daftarmenu/order', 'DaftarmenuController@order')->name('daftarmenu.order');
// Route::post('daftarmenu/detail_order', 'DaftarmenuController@detail_order')->name('daftarmenu.detail_order');
Route::put('daftarmenu/detail_order/{id}', 'DaftarmenuController@detail_order')->name('daftarmenu.detail_order');
Route::delete('detail_order/hapus/{id}', 'DaftarmenuController@destroy')->name('detail_order.destroy');
Route::post('daftarmenu/proses_pesanan', 'DaftarmenuController@proses_pesanan')->name('daftarmenu.proses_pesanan');
Route::get('/cart','DaftarmenuController@cart');
Route::post('/daftarmenu/finish/', 'DaftarmenuController@finish');
Route::get('/daftarmenu/status/{id}', 'DaftarmenuController@order');
Route::delete('save/hapus/{id}', 'DaftarmenuController@destroy2')->name('save.destroy2');
});


<?php

use Illuminate\Support\Facades\Route;

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
    return view('/customer/login');
})->name('login');

//login-google
Route::get('login/google', 'GoogleController@redirectToProvider');
Route::get('login/google/callback', 'GoogleController@handleProviderCallback');
Route::get('logout', 'GoogleController@logout');



// if(Session::get('id')!=null){
// user-manual
Route::get('user-manual', 'CustomerController@user_manual')->name('user-manual');

Route::get('data-customer', 'CustomerController@display_customer')->name('data-customer');
Route::post('customer-excel-store', 'CustomerController@customer_excel_store');

Route::get('tambah-customer1', 'CustomerController@create_customer1')->name('tambah-customer1');
Route::get('tambah-customer2', 'CustomerController@create_customer2')->name('tambah-customer2');

Route::post('customer/store1', 'CustomerController@customer_store1');
Route::post('customer/store2', 'CustomerController@customer_store2');

Route::get('get_kota/{id}', 'CustomerController@get_kota');
Route::get('get_kecamatan/{id}', 'CustomerController@get_kecamatan');
Route::get('get_kelurahan/{id}', 'CustomerController@get_kelurahan');

//akses folder storage to public
Route::get('image/{filename}', 'CustomerController@display_image')->name('image.displayImage');

//Cetak Label TnJ 108
Route::get('cetak-label-TnJ', 'BarcodeController@display_barang')->name('cetak-label-TnJ');
Route::get('barcode-scanner', 'BarcodeController@barcode_scanner')->name('barcode-scanner');
Route::get('pdf-barcode/{id}', 'BarcodeController@pdf_barcode')->name('pdf-barcode');
Route::get('data-barcode/{id}', 'BarcodeController@data_barcode')->name('data-barcode');

//geo-location
Route::get('list-toko', 'GeolocationController@display_list_toko')->name('list-toko');
Route::get('input-geolocation', 'GeolocationController@input_geolocation')->name('input-geolocation');
Route::post('input-geolocation/store', 'GeolocationController@input_geolocation_store');
Route::get('titik-kunjungan', 'GeolocationController@titik_kunjungan')->name('titik-kunjungan');
Route::get('toko-barcode/{id}', 'GeolocationController@toko_barcode')->name('toko-barcode');
Route::get('data-qr-code/{id}', 'GeolocationController@data_qrcode')->name('data-qr-code');

    


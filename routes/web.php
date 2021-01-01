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

//scoreboard
Route::get('control-papan', 'ScoreboardController@control_papan')->name('control-papan');
Route::get('tampilan-papan', 'ScoreboardController@tampilan_papan')->name('tampilan-papan');

//update-name
Route::post('store-home','ScoreboardController@store_home');
Route::post('store-away','ScoreboardController@store_away');

//update-skor-home
Route::post('store-homeplus2','ScoreboardController@scorehomeplus2');
Route::post('store-homeminus2','ScoreboardController@scorehomeminus2');
Route::post('store-homeplus3','ScoreboardController@scorehomeplus3');
Route::post('store-homeminus3','ScoreboardController@scorehomeminus3');

//update-skor-away
Route::post('store-awayplus2','ScoreboardController@scoreawayplus2');
Route::post('store-awayminus2','ScoreboardController@scoreawayminus2');
Route::post('store-awayplus3','ScoreboardController@scoreawayplus3');
Route::post('store-awayminus3','ScoreboardController@scoreawayminus3');

//update-sound
Route::post('store-sound1','ScoreboardController@store_sound1');
Route::post('store-sound2','ScoreboardController@store_sound2');
Route::post('store-sound3','ScoreboardController@store_sound3');
Route::post('update-sound','ScoreboardController@update_sound');

//insert-menit-detik
Route::post('update-menit-detik','ScoreboardController@update_menit_detik');

//update-timer
Route::post('reset-menit-detik','ScoreboardController@reset_menit_detik');
Route::post('resume-menit-detik','ScoreboardController@resume_menit_detik');
Route::post('stop-menit-detik','ScoreboardController@stop_menit_detik');

//reset-skor
Route::post('reset-skor-home','ScoreboardController@resetscorehome');
Route::post('reset-skor-away','ScoreboardController@resetscoreaway');

//fouls-home
Route::post('store-homefoulsplus1','ScoreboardController@homefoulsplus1');
Route::post('store-homefoulsminus1','ScoreboardController@homefoulsminus1');

//fouls-away
Route::post('store-awayfoulsplus1','ScoreboardController@awayfoulsplus1');
Route::post('store-awayfoulsminus1','ScoreboardController@awayfoulsminus1');

//reset-fouls
Route::post('reset-fouls-home','ScoreboardController@resetfoulshome');
Route::post('reset-fouls-away','ScoreboardController@resetfoulsaway');

//update-sse-database
Route::get('update-sse','ScoreboardController@update_sse');

//period
Route::post('store-plus1period','ScoreboardController@plus1period');
Route::post('store-minus1period','ScoreboardController@minus1period');
Route::post('reset-period','ScoreboardController@resetperiod');

//get-skor-all
Route::get('get-score','ScoreboardController@get_score');




// Route::get('testpost','ScoreboardController@test_post');

Route::get('hitungmundur','ScoreboardController@test_hitung_mundur');



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






    


<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('findKlasifikasi', 'API\KlasifikasiController@search');
Route::get('findGudang', 'API\GudangController@search');
Route::get('findSatuan', 'API\SatuanController@search');
Route::get('findPelanggan', 'API\PelangganController@search');
Route::get('findMataUang', 'API\MataUangController@search');
Route::get('findSupplier', 'API\SupplierController@search');
// Route::get('getAlamat', 'API\PelangganController@show');

Route::apiResources([
    'user'=>'API\UserController',
    // 'pengguna'=>'API\PenggunaController',
    'klasifikasi'=>'API\KlasifikasiController',
    'gudang'=>'API\GudangController',
    // 'item'=>'API\ItemController',
    'matauang'=>'API\MataUangController',
    'pelanggan'=>'API\PelangganController',
    'alamat'=>'API\AlamatController',
    'supplier'=>'API\SupplierController',
    'satuan'=>'API\SatuanController',
]);
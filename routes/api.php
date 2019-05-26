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

Route::get('json-berita/{limit?}/{st?}','Backend\BeritaBackendController@json_berita');
Route::get('json-berita-paginate/{page?}','Backend\BeritaBackendController@json_berita_paginate');
Route::post('berita-view','Backend\BeritaBackendController@json_addview');


Route::get('json-slider/{limit?}/{st?}','Backend\SliderBackendController@json_slider');
Route::get('json-galeri/{limit?}/{st?}','Backend\GaleriBackendController@json_galeri');

Route::get('json-kategori/{limit?}','Backend\KategoriBackendController@json_kategori');
Route::get('json-kategori-by/{jenis?}','Backend\KategoriBackendController@json_kategori_by');
Route::get('json-sub-kategori/{limit?}','Backend\KategoriSubBackendController@json_subkategori');
Route::get('json-sub-by-kat/{idkat?}','Backend\KategoriSubBackendController@json_sub_bykat');

Route::get('json-user/{limit?}','Backend\UserBackendController@json_user');

Route::get('json-dinas/{limit?}','Backend\DinasBackendController@json_dinas');
Route::get('json-dinas-data/{limit?}','Backend\DinasBackendController@json_dinas_data');

Route::get('json-profil/{jenis?}','Backend\TentangBackendController@json_profil');
Route::get('json-kontak','Backend\KontakBackendController@json_kontak');

Route::get('json-informasi/{limit?}','Backend\InformasiBackendController@json_informasi');
Route::post('file-view','Backend\InformasiBackendController@json_addview');
Route::post('file-view-detail','Backend\InformasiBackendController@json_addview_detail');
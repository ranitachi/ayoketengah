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


Auth::routes();

Route::get('/', 'HomeController@index')->name('utama');
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['namespace' => 'Backend'], function (){
    Route::get('/admin', 'DashboardController@index')->name('backend.index')->middleware('auth');
    Route::get('/admin-berita', 'BeritaBackendController@index')->name('admin-berita.index')->middleware('auth');
    Route::get('/admin-berita/{id?}', 'BeritaBackendController@form')->name('admin-berita.form')->middleware('auth');
    Route::post('/admin-berita/{id}', 'BeritaBackendController@proses')->name('admin-berita.proses')->middleware('auth');
    Route::get('/admin-berita-hapus/{id}', 'BeritaBackendController@destroy')->name('admin-berita.destroy')->middleware('auth');
    
    //slider
    Route::get('/admin-slider', 'SliderBackendController@index')->name('admin-slider.index')->middleware('auth');
    Route::get('/admin-slider/{id}', 'SliderBackendController@form')->name('admin-slider.form')->middleware('auth');
    Route::post('/admin-slider/{id}', 'SliderBackendController@proses')->name('admin-slider.proses')->middleware('auth');
    Route::get('/admin-slider-hapus/{id}', 'SliderBackendController@destroy')->name('admin-slider.destroy')->middleware('auth');
    
    //galeri
    Route::get('/admin-galeri', 'GaleriBackendController@index')->name('admin-galeri.index')->middleware('auth');
    Route::get('/admin-galeri/{id}', 'GaleriBackendController@form')->name('admin-galeri.form')->middleware('auth');
    Route::post('/admin-galeri/{id}', 'GaleriBackendController@proses')->name('admin-galeri.proses')->middleware('auth');
    Route::get('/admin-galeri-hapus/{id}', 'GaleriBackendController@destroy')->name('admin-galeri.destroy')->middleware('auth');

    //kategori
    Route::get('/admin-kategori', 'KategoriBackendController@index')->name('admin-kategori.index')->middleware('auth');
    Route::get('/admin-kategori/{id}', 'KategoriBackendController@form')->name('admin-kategori.form')->middleware('auth');
    Route::post('/admin-kategori/{id}', 'KategoriBackendController@proses')->name('admin-kategori.proses')->middleware('auth');
    Route::get('/admin-kategori-hapus/{id}', 'KategoriBackendController@destroy')->name('admin-kategori.destroy')->middleware('auth');
    
    //subkategori
    Route::get('/admin-sub-kategori', 'KategoriSubBackendController@index')->name('admin-sub-kategori.index')->middleware('auth');
    Route::get('/admin-sub-kategori/{idkat}/{id}', 'KategoriSubBackendController@form')->name('admin-sub-kategori.form')->middleware('auth');
    Route::post('/admin-sub-kategori/{idkat}/{id}', 'KategoriSubBackendController@proses')->name('admin-sub-kategori.proses')->middleware('auth');
    Route::get('/admin-sub-kategori-hapus/{id}', 'KategoriSubBackendController@destroy')->name('admin-sub-kategori.destroy')->middleware('auth');
    Route::get('get-subkat/{katid}', 'KategoriSubBackendController@subbykat')->name('subbykat');

    //user
    Route::get('/admin-user', 'UserBackendController@index')->name('admin-user.index')->middleware('auth');
    Route::get('/admin-user/{id}', 'UserBackendController@form')->name('admin-user.form')->middleware('auth');
    Route::post('/admin-user/{id}', 'UserBackendController@proses')->name('admin-user.proses')->middleware('auth');
    Route::get('/admin-user-hapus/{id}', 'UserBackendController@destroy')->name('admin-user.destroy')->middleware('auth');
    
    //dinas
    Route::get('/admin-dinas', 'DinasBackendController@index')->name('admin-dinas.index')->middleware('auth');
    Route::get('/admin-dinas/{id}', 'DinasBackendController@form')->name('admin-dinas.form')->middleware('auth');
    Route::post('/admin-dinas/{id}', 'DinasBackendController@proses')->name('admin-dinas.proses')->middleware('auth');
    Route::get('/admin-dinas-hapus/{id}', 'DinasBackendController@destroy')->name('admin-dinas.destroy')->middleware('auth');

    //Tentang PPID
    Route::get('/tentang/{jenis?}', 'TentangBackendController@index')->middleware('auth');
    Route::get('/tentang-form/{jenis?}', 'TentangBackendController@form')->middleware('auth');
    Route::post('/tentang-proses/{jenis?}', 'TentangBackendController@proses')->middleware('auth');
    
    //Kontak
    Route::get('/admin-kontak', 'KontakBackendController@index')->name('admin-kontak')->middleware('auth');
    Route::post('/admin-kontak', 'KontakBackendController@proses')->name('admin-kontak.proses')->middleware('auth');
    Route::get('/admin-kontak-hapus/{id?}', 'KontakBackendController@destroy')->name('admin-kontak.destroy')->middleware('auth');
    
    //Informasi
    Route::get('/admin-informasi-pengajuan', 'InformasiBackendController@pengajuan')->name('admin-informasi.pengajuan')->middleware('auth');
    Route::get('/admin-informasi', 'InformasiBackendController@index')->name('admin-informasi')->middleware('auth');
    Route::get('/admin-lihat/{id}', 'InformasiBackendController@lihat')->name('admin-informasi.lihat')->middleware('auth');
    Route::get('/admin-informasi-form/{id}', 'InformasiBackendController@form')->name('admin-informasi.form')->middleware('auth');
    Route::post('/admin-informasi-proses/{id}', 'InformasiBackendController@proses')->name('admin-informasi.proses')->middleware('auth');
    Route::get('/admin-informasi-hapus/{id}', 'InformasiBackendController@destroy')->name('admin-informasi.destroy')->middleware('auth');
    
    
});

Route::get('about-us','HomeController@about_us')->name('about-us');
Route::get('articles','HomeController@articles')->name('articles');
Route::get('articles/{judul}','HomeController@articles_detail')->name('articles.detail');
Route::get('gallery','HomeController@gallery')->name('gallery');

Route::get('logout',function(){
    Auth::logout();
    return redirect('/');
});

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    //  \UniSharp\LaravelFilemanager\Lfm::routes();
 });
 Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
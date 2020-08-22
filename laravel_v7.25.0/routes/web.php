<?php

use Illuminate\Support\Facades\Auth;
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

/**
 *  Belajar Routing
 *  Route::get('/default', function () {
        return view('welcome');
    });

 *  Route::view('/new', 'welcome');
*/


Auth::routes();

Route::get('/', function () {
    return view('ekaakarjati');
});

Route::get('/home', 'HomeController@index')->name('home');


// Gallery
Route::get('/upload_gallery', 'ImageGalleryController@upload_gallery');

Route::post('/upload_gallery/proses', 'ImageGalleryController@upload_proses');

Route::get('/edit_gallery{gallery}', 'ImageGalleryController@edit_gallery');

Route::post('/update_gallery{gallery}', 'ImageGalleryController@update_gallery');

Route::get('/delete_gallery{gallery}', 'ImageGalleryController@delete_gallery');


// Mitra Kerja
Route::get('/upload_mitra_kerja', 'MitraKerjaController@upload_mitra_kerja');

Route::post('/upload_mitra_kerja/proses', 'MitraKerjaController@upload_proses');

Route::get('/edit_mitra_kerja{mitra_kerja}', 'MitraKerjaController@edit_mitra_kerja');

Route::post('/update_mitra_kerja{mitra_kerja}', 'MitraKerjaController@update_mitra_kerja');

Route::get('/delete_mitra_kerja{mitra_kerja}', 'MitraKerjaController@delete_mitra_kerja');


// Testimoni
Route::get('/upload_testimoni', 'TestimoniController@upload_testimoni');

Route::post('/upload_testimoni/proses', 'TestimoniController@upload_proses');

Route::get('/edit_testimoni{testimoni}', 'TestimoniController@edit_testimoni');

Route::post('/update_testimoni{testimoni}', 'TestimoniController@update_testimoni');

Route::get('/delete_testimoni{testimoni}', 'TestimoniController@delete_testimoni');
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


Route::get('/', 'PertanyaanController@index');
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/pertanyaan/{id}/edit','PertanyaanController@modify');
Route::get('/pertanyaan/create','PertanyaanController@create');
Route::get('/pertanyaan/{id?}','PertanyaanController@index');
Route::post('/pertanyaan','PertanyaanController@store');
Route::get('/jawaban/{pertanyaan_id}','JawabanController@index');
Route::post('/jawaban/{pertanyaan_id}','JawabanController@create');
Route::put('/pertanyaan/{id}','PertanyaanController@onModify');
Route::post('/pertanyaan/komentar','PertanyaanController@komentar');
Route::post('/pertanyaan/komentarjawab','PertanyaanController@komentarJawab');
Route::get('/keluar',function(){
   Auth::logout();
   return redirect('/') ;
});

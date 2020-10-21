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

Route::get('/home', function () {

    return view('welcome');
});

Route::get('/', 'App\Http\Controllers\BookController@getBooks')->name('home');
Route::post('/search', 'App\Http\Controllers\BookController@searchBooks');
Route::get('/book/{id}/{search}', 'App\Http\Controllers\BookController@getBook')->name('book');
Route::get('/search', 'App\Http\Controllers\BookController@searchBooks');

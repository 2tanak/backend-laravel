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

;
Route::resource('/articles','Admin\ArticlesController');
Route::any('/show',['uses' => 'Admin\ArticlesController@articlesadd'])->name('show');
Route::get('/',['uses' => 'Admin\ArticlesController@index'])->name('home');

Route::get('/home',['uses' => 'Admin\ArticlesController@index'])->name('home');







Auth::routes();
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
//Route::resource('/home','Admin\ArticlesController');


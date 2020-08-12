<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::get('/home',['uses' => 'Admin\ArticlesController@index'])->name('home');

Route::post('/one/{article}',['uses' => 'Admin\ArticlesController@one'])->name('one');
Route::post('/update/{article}',['uses' => 'Admin\ArticlesController@update'])->name('update');

Route::post('/store',['uses' => 'Admin\ArticlesController@store'])->name('store');

Route::post('/destroy/{article}',['uses' => 'Admin\ArticlesController@destroy'])->name('destroy');


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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('index',['uses'=>"Lianxi2Controller@index"]);
Route::any('index','Admin\Lianxi1Controller@index');
Route::post('add','Admin\Lianxi1Controller@add');
Route::post('save','Admin\Lianxi1Controller@save');
Route::any('hao','Admin\Lianxi2Controller@hao');
Route::get('show','Admin\Lianxi1Controller@show');
Route::get('del','Admin\Lianxi1Controller@del');
Route::get('up','Admin\Lianxi1Controller@up');

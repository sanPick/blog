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

<<<<<<< HEAD

Route::get('/',function(){
    return view('borrow.show');
});

Route::get('/',function(){
    return view('refund.show');
});

Route::get('/',function(){
    return view('deal.show');
});

Route::get('/',function(){
    return view('tradelog.show');
});

Route::get('/',function(){
    return view('img.add');
});

Route::get('/',function(){
    return view('img.show');
});

Route::get('/',function(){
    return view('index.index');
});

Route::get('/',function(){
    return view('product.show');
});

Route::get('/', function () {
    return view('welcome');
});

// Route::get('demo/demo', function () {
    
// });
// Route::get('demo/demo','DemoController@demo');
Route::any('borrowShow','Admin\BorrowController@show');
Route::any('bstatus','Admin\BorrowController@bstatus');
Route::any('refundShow','Admin\RefundController@show');
Route::any('dealShow','Admin\DealController@show');
Route::any('tradelogShow','Admin\TradelogController@show');
Route::any('imgAdd','Admin\ImgController@add');
Route::any('imgShow','Admin\ImgController@show');
Route::any('imgDel','Admin\ImgController@del');



Route::any('indexIndex','Home\IndexController@index');
Route::any('productShow','Home\ProductController@show');
=======
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
>>>>>>> parent of 8854738... 刘祎凡

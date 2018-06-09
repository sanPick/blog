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

=======
>>>>>>> origin/liuyifan


Route::get('/', function () {
    return view('welcome');
});

Route::get('exam', function () {
    return view('exam');
});

Route::get("user/{id}",function($id){

    return $id;
});
Route::get("exam/show",'ExamController@show');
Route::any("exam/add","EXamController@add");
Route::any("exam/add_do","EXamController@add_do");
Route::any("exam/del","EXamController@del");
Route::any("indexIndex","Admin\IndexController@index");
Route::any("roleIndex","Admin\RoleController@index");
Route::any("roleAdd","Admin\RoleController@add");
Route::any("roleDo","Admin\RoleController@roleDo");
Route::any("userIndex","Admin\UserController@index");
Route::any("userAdd","Admin\UserController@add");
Route::any("userDo","Admin\UserController@userDo");
Route::any("adminIndex","Admin\AdminController@index");
Route::any("adminAdd","Admin\AdminController@add");
Route::any("adminDo","Admin\AdminController@adminDo");
Route::any("nodeIndex","Admin\NodeController@index");
Route::any("nodeAdd","Admin\NodeController@add");
Route::any("nodeDo","Admin\NodeController@adminDo");
Route::any("redpacketIndex","Admin\RedpacketController@index");
Route::any("redpacketAdd","Admin\RedpacketController@add");
Route::any("redpacketDo","Admin\RedpacketController@redpacketDo");
Route::any("redpacketdel","Admin\RedpacketController@redpacketdel");
Route::any("borrowtypeIndex","Admin\BorrowtypeController@index");
Route::any("borrowtypeAdd","Admin\BorrowtypeController@add");
Route::any("borrowtypeDo","Admin\BorrowtypeController@BorrowtypeDo");
Route::any("borrowtypedel","Admin\BorrowtypeController@Borrowtypedel");






<<<<<<< HEAD
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
>>>>>>> origin/liuyifan

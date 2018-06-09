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
Route::any("nodeDo","Admin\NodeController@nodeDo");
Route::any("setAdmin","Admin\RoleController@setAdmin");
Route::any("addAdmin","Admin\RoleController@addAdmin");
Route::any("setNode","Admin\RoleController@setNode");
Route::any("getNodesTree","Admin\RoleController@getNodesTree");
Route::any("addNode","Admin\RoleController@addNode");

Route::any("refundIndex","Admin\RefundController@index");
Route::any("refundAdd","Admin\RefundController@add");
Route::any("refundDo","Admin\RefundController@refundDo");

Route::any("userInfoIndex","Admin\UserInfoController@index");
Route::any("userInfoAdd","Admin\UserInfoController@add");
Route::any("userInfoDo","Admin\UserInfoController@refundDo");
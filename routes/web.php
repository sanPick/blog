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
Route::any("nodeDo","Admin\NodeController@adminDo");
Route::any("memberIndex","Admin\MemberController@index");
Route::any("memberAdd","Admin\MemberController@add");
Route::any("memberDo","Admin\MemberController@memberDo");
Route::any("memberDel","Admin\MemberController@memberDel");
Route::any("update","Admin\MemberController@update");
Route::any("productCatIndex","Admin\ProductCatController@index");
Route::any("productCatAdd","Admin\ProductCatController@add");
Route::any("productCatDo","Admin\ProductCatController@productCatDo");
Route::any("productCatDel","Admin\ProductCatController@productCatDel");
Route::any("productCatupdate","Admin\ProductCatController@productCatupdate");

Route::any("productIndex","Admin\ProductController@index");
Route::any("productAdd","Admin\ProductController@add");
Route::any("productDo","Admin\ProductController@productDo");
//Route::any("productDel","Admin\ProductController@productCatDel");
//Route::any("productupdate","Admin\ProductController@productCatupdate");





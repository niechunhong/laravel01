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
    echo date('Y-m-d H:i:s');
});
//加载后台首页
Route::resource("/admin", "Admin\AdminController");
Route::resource("/adminusers", "Admin\UserController");//后台管理员

//用模型做会员模块
Route::resource("/adminuserss", "Admin\UserssController");
Route::get("/adminuserssaddress/{id}", "Admin\UserssController@address");
//自定义函数
Route::get('pay',"Admin\PayController@pay");
//自定义类
Route::get('send',"Admin\PayController@send");
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

Route::get("/","TasksController@index");

//ログインしないとタスクコントローラー使用不可
Route::group(["middleware" => ["auth"]],function(){
Route::resource("tasks","TasksController");
});

//アカウント登録機能
Route::get("signup","Auth\RegisterController@showRegistrationForm")->name("signup.get");
Route::post("signup","Auth\RegisterController@register")->name("signup.post");

//ログイン機能
Route::get("login","Auth\LoginController@showLoginForm")->name("login");
Route::post("Login","Auth\LoginController@Login")->name("login.post");
Route::get("logout","Auth\LoginController@logout")->name("logout.get");

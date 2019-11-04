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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'AdminController@index')->name('home');
Route::post('/admin/up/{id}', 'AdminController@up')->name('admin.up');
Route::post('/admin/down/{id}', 'AdminController@down')->name('admin.down');
Route::post('/admin/del/{id}', 'AdminController@del')->name('admin.del');
Route::get('/admin/add', 'AdminController@new')->name('admin.add');
Route::post('/admin/add', 'AdminController@new')->name('admin.add');
Route::get('/home/add', 'AdminController@add')->name('home.add');

Route::get('/auth/{skey}/{nick}/{server}/{password}/{ip}', 'GameAuthController@auth');


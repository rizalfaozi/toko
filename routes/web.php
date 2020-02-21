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

Route::get('/', 'FrontendController@index');
Route::get('about', 'FrontendController@index');
Route::get('info', 'FrontendController@index');
Route::get('contact', 'FrontendController@index');
Route::get('detail/{id}', 'FrontendController@detail');
Route::get('order/{id}', 'FrontendController@order');
Route::get('detberita/{id}', 'FrontendController@detberita');
Route::post('order/send', 'FrontendController@send');
Route::get('konfirmasi', 'FrontendController@konfirmasi');
Route::post('search', 'FrontendController@search');
Route::get('subkategori/{id}', 'ProductController@subkategori');
Route::get('subkategoriselect/{produkid}/{id}', 'ProductController@subkategoriselect');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('admins', 'AdminsController');
Route::resource('users', 'UsersController');


Route::resource('sliders', 'SliderController');
Route::get('password', 'HomeController@password');
Route::post('update/user', 'HomeController@updateuser');
Route::post('update/password', 'HomeController@updatepassword');

Route::resource('brands', 'BrandsController');


Route::get('cari/report', 'FrontendController@searchreport');

Route::get('search/reports/{thn}', 'FrontendController@report');




Route::resource('product', 'ProductController');
Route::get('product/publish/{id}', 'ProductController@publish');
Route::get('product/unpublish/{id}', 'ProductController@unpublish');


Route::resource('reports', 'ReportController');


Route::resource('testimonis', 'TestimoniController');

Route::resource('stocks', 'StockController');

Route::resource('mixes', 'MixController');
Route::get('mixes/product/{id}', 'MixController@product');


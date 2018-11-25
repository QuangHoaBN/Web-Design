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
Route::get('index',[
	'as'=>'trangchu',
	'uses'=>'PageController@getIndex'
]);
Route::get('loai-san-pham/{ty}',[
	'as'=>'loaisanpham',
	'uses'=>'PageController@getLoaisp'
]);
Route::get('chi-tiet-san-pham/{id}',[
	'as'=>'chitietsanpham',
	'uses'=>'PageController@getProductDetail'
]);
Route::get('lien-he',[
	'as'=>'lienhe',
	'uses'=>'PageController@getContact'
]);
Route::get('gioi-thieu',[
	'as'=>'gioithieu',
	'uses'=>'PageController@getIntroduction'
]);
Route::get('add-to-cart/{id}',[
	'as'=> 'themgiohang',
	'uses'=>'PageController@getAddtoCart'
]);
Route::get('dang-nhap',[
	'as' => 'login',
	'uses'=> 'PageController@getLogin'
]);
Route::post('dang-nhap',[
	'as' => 'login',
	'uses'=> 'PageController@postLogin'
]);
Route::get('dang-ky',[
	'as' => 'sigup',
	'uses'=> 'PageController@getSigup'
]);
Route::post('dang-ky',[
	'as' => 'sigup',
	'uses'=> 'PageController@postSigup'
]);
Route::get('dang-xuat',[
	'as'=>'logout',
	'uses'=>'PageController@getLogout'
]);

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

Auth::routes();

Route::get('/home', 'HomeController@index', ['middleware' => 'auth'])->name('home');
Route::get('/admin', 'AdminController@index', ['middleware' => 'auth'])->name('admin');

Route::resource('/admin/campaign-type', 'CampaignTypeController', ['middleware' => 'auth']);
Route::resource('/campaigns', 'CampaignController', ['middleware' => 'auth']);

Route::get('/view/{id?}', 'HomeController@show', ['middleware' => 'auth'])->name('view_campaign');
Route::post('/pledge/{id?}', 'HomeController@pledge', ['middleware' => 'auth'])->name('pledge');
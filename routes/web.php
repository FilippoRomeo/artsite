<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/profile','userdataController');

//view registered user image

Route::get('/images', 'ImageUploadController@getImages')->name('images');

//image upload

Route::post('/upload', 'ImageUploadController@postUpload')->name('uploadfile');

//view single image

Route::get('/images/{id}', 'ImageUploadController@getImage')->name('image');

Route::get('/home', 'HomeController@index')->name('home');

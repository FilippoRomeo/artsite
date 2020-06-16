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

Auth::routes();

Route::get('/', 'ImageUploadController@getImages')->name('images');

//view single image

Route::get('/images/{id}', 'ImageUploadController@getImage')->name('image');

//view user images

Route::get('/images', 'ImageUploadController@getMyImages')->name('images');

//crud profile

Route::resource('/profile', 'userdataController');

Route::resource('/profile', 'userdataController')->parameters([
    'users' => 'id'
]);

//post upload

Route::post('/upload', 'ImageUploadController@postUpload')->name('uploadfile');


//form image upload

Route::get('/home', 'HomeController@index')->name('home');

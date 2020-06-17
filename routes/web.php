<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', 'ImageUploadController@getImages')->name('images');

//view single image

Route::get('/images/{id}', 'ImageUploadController@getImage')->name('image');

//crud profile

Route::resource('/profile', 'userdataController');

//post upload

Route::post('/upload', 'ImageUploadController@postUpload')->name('uploadfile');



Route::get('/upload', 'ImageUploadController@formUpload');
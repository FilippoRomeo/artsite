<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', 'ImageUploadController@welcomePage')->name('images');

//view single image

Route::get('/images/{id}', 'ImageUploadController@getImage')->name('image');

//delete image

Route::delete('/images/{id}', 'ImageUploadController@deleteImage');

//crud profile

Route::resource('/profile', 'userdataController');

//post upload

Route::post('/upload', 'ImageUploadController@uploadImage')->name('uploadfile');

Route::get('/upload', 'ImageUploadController@formUpload');
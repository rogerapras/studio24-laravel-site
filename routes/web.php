<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Main page Route
Route::get('/', 'PageController@index')->name('main');

// Page Controller Routes
Route::prefix('pages')->group(function () {
    Route::get('{url?}', 'PageController@index');
    Route::get('/edit/{page}', 'PageController@edit');
    Route::post('/edit/{page}', 'PageController@update');
});

// Article Controller Routes
Route::prefix('articles')->group(function () {
    Route::get('/', 'ArticleController@index')->name('articles');
    Route::post('/', 'ArticleController@store');
    Route::post('edit/{article}', 'ArticleController@update');
    Route::get('create', 'ArticleController@create');
    Route::get('edit/{article}', 'ArticleController@edit');
    Route::delete('{article}', 'ArticleController@destroy');
    Route::get('{article}', 'ArticleController@show');
    Route::post('{article}/comments', 'CommentController@store');
});

// Service Controller Route
Route::prefix('services')->group(function(){
    Route::get('/', 'ServiceController@index')->name('services');
    Route::post('/', 'ServiceController@store');
    Route::post('edit/{service}', 'ServiceController@update');
    Route::get('create', 'ServiceController@create');
    Route::get('edit/{service}', 'ServiceController@edit');
    Route::delete('{service}', 'ServiceController@destroy');
    Route::get('{service}', 'ServiceController@show');
});

// Review Controller Route
Route::get('/reviews', 'ReviewController@index')->name('review');
Route::post('/reviews', 'ReviewController@store');

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Social Routes
Route::get('/login/{driver}', 'Auth\SocialController@redirectToProvider');
Route::get('/login/{driver}/callback', 'Auth\SocialController@handleProviderCallback');

// Filemanager Routes
Route::group(['middleware' => 'auth'], function () {
    Route::get('/laravel-filemanager', '\Unisharp\Laravelfilemanager\controllers\LfmController@show');
    Route::post('/laravel-filemanager/upload', '\Unisharp\Laravelfilemanager\controllers\UploadController@upload');
});

// Symlink from public/storage
Route::get('/public/article_previews/{filename}', 'ArticleController@displayPreviewImage');

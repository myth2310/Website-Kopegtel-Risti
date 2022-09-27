<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\memberController;
use App\Http\Controllers\activityController;
use App\Http\Controllers\productController;
use App\Http\Controllers\documentController;
use App\Http\Controllers\messageController;
use App\Http\Controllers\bannerController;
use App\Http\Controllers\authController;
use App\Http\Controllers\enduserController;

// END USER
$router->group([
    'prefix'    => 'Kopegtel-Risti',
], function ($router) {
    Route::get('/', '\App\Http\Controllers\enduserController@homepage');
    Route::get('/aboutus', '\App\Http\Controllers\enduserController@aboutus');
    Route::get('/product', '\App\Http\Controllers\enduserController@product');
    Route::get('/activity', '\App\Http\Controllers\enduserController@activity');
    Route::get('/activity-detail/{id}', '\App\Http\Controllers\enduserController@activityDetail');
    Route::get('/contact', '\App\Http\Controllers\enduserController@contact');
    Route::get('/create', 'App\Http\Controllers\enduserController@create');
    Route::post('/send-message', '\App\Http\Controllers\enduserController@store');
    Route::get('/download/{id}', '\App\Http\Controllers\enduserController@download');
    Route::get('/show/{id}', '\App\Http\Controllers\enduserController@show')->name('activity.show');
});

// ADMIN
//--- Authentication ---
Route::post('/logout', '\App\Http\Controllers\authController@logout')->middleware('auth');

$router->group([
    'prefix'    => 'admin',
    'middleware'=> 'guest'
], function ($router) {
    Route::get('/', '\App\Http\Controllers\authController@index')->name('login');
    Route::post('/login', '\App\Http\Controllers\authController@login');
});

//--- Dashboard ---
Route::get('/dashboard', '\App\Http\Controllers\dashboardController@dashboard')->middleware('auth');

//--- Member ---
$router->group([
    'prefix'    => 'member',
    'middleware'=> 'auth'
], function ($router) {
    Route::get('/', '\App\Http\Controllers\memberController@index')->name('member');
    Route::get('/create', 'App\Http\Controllers\memberController@create')->name('create');
    Route::post('/store', '\App\Http\Controllers\memberController@store')->name('store');
    Route::get('/edit/{id}', '\App\Http\Controllers\memberController@edit')->name('edit');
    Route::put('/update/{id}', '\App\Http\Controllers\memberController@update')->name('update');
    Route::delete('/delete/{id}', '\App\Http\Controllers\memberController@destroy')->name('destroy');
    Route::get('/download', '\App\Http\Controllers\memberController@download')->name('download');
});

//--- Activity ---
$router->group([
    'prefix'    => 'activity',
    'middleware'=> 'auth'
], function ($router) {
    Route::get('/', '\App\Http\Controllers\activityController@index')->name('activity');
    Route::get('/create', 'App\Http\Controllers\activityController@create')->name('create');
    Route::post('/store', '\App\Http\Controllers\activityController@store')->name('store');
    Route::get('/edit/{id}', '\App\Http\Controllers\activityController@edit')->name('edit');
    Route::put('/update/{id}', '\App\Http\Controllers\activityController@update')->name('update');
    Route::delete('/delete/{id}', '\App\Http\Controllers\activityController@destroy')->name('destroy');
});

//--- Product ---
$router->group([
    'prefix'    => 'product',
    'middleware'=> 'auth'
], function ($router) {
    Route::get('/', '\App\Http\Controllers\productController@index')->name('product');
    Route::get('/create', 'App\Http\Controllers\productController@create')->name('create');
    Route::post('/store', '\App\Http\Controllers\productController@store')->name('store');
    Route::get('/edit/{id}', '\App\Http\Controllers\productController@edit')->name('edit');
    Route::put('/update/{id}', '\App\Http\Controllers\productController@update')->name('update');
    Route::delete('/delete/{id}', '\App\Http\Controllers\productController@destroy')->name('destroy');
});

//--- Document ---
$router->group([
    'prefix'    => 'document',
    'middleware'=> 'auth'
], function ($router) {
    Route::get('/', '\App\Http\Controllers\documentController@index')->name('document');
    Route::get('/create', 'App\Http\Controllers\documentController@create')->name('create');
    Route::post('/store', '\App\Http\Controllers\documentController@store')->name('store');
    Route::get('/edit/{id}', '\App\Http\Controllers\documentController@edit')->name('edit');
    Route::put('/update/{id}', '\App\Http\Controllers\documentController@update')->name('update');
    Route::delete('/delete/{id}', '\App\Http\Controllers\documentController@destroy')->name('destroy');
});

//--- Message ---
$router->group([
    'prefix'    => 'message',
    'middleware'=> 'auth'
], function ($router) {
    Route::get('/', '\App\Http\Controllers\messageController@index')->name('message');
    Route::post('/store', '\App\Http\Controllers\messageController@store')->name('store');
    Route::delete('/delete/{id}', '\App\Http\Controllers\messageController@destroy')->name('destroy');
});

//--- Banner ---
$router->group([
    'prefix'    => 'banner',
    'middleware'=> 'auth'
], function ($router) {
    Route::get('/', '\App\Http\Controllers\bannerController@index')->name('banner');
    Route::get('/create', 'App\Http\Controllers\bannerController@create')->name('create');
    Route::post('/store', '\App\Http\Controllers\bannerController@store')->name('store');
    Route::get('/edit/{id}', '\App\Http\Controllers\bannerController@edit')->name('edit');
    Route::put('/update/{id}', '\App\Http\Controllers\bannerController@update')->name('update');
    Route::delete('/delete/{id}', '\App\Http\Controllers\bannerController@destroy')->name('destroy');
});
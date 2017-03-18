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
url()
Route::get('/', function () {
    //return view('FAQ/faq');
    return view('adminka');
//    echo 1;
});
Route::get('/adminka', function () {
    echo 1;
//    return view('adminka');
});


Route::get('/home', 'HomeController@index');

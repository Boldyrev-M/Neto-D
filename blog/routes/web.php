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
Route::get('/','QAController@showAll');
/*Route::get('/', function () {
    $categ = DB::table('category')->get();
    $questions = DB::table('questions')->get();
//    echo "<pre>".print_r($categ,true)."</pre>";
//    echo "<pre>".print_r($questions,true)."</pre>";
//    die;
//echo 0;
    return view('FAQ/faq',['categories'=>$categ],['faq'=>$questions]);

});*/
Route::get('/adminka', function () {
    //echo 1;
    return view('adminka');
});
Route::get('auth/login', 'Auth\AuthController@getLogin');

Auth::routes();

Route::get('/home', 'HomeController@index');

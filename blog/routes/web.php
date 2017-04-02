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
Route::get('/','QAController@showPublished');

//Route::get('/adminka', function () {
//    return view('adminka');
//});
Route::get('/questions/list',['middleware'=>'auth','uses'=>'QAController@showAll']);
Route::get('/questions/noanswerlist',['middleware'=>'auth','uses'=>'QAController@showAllNoAnswer']);
Route::get('/questions/change/{id}',['middleware'=>'auth','uses'=>'QAController@change']);
Route::get('/question/delete/{id}',['middleware'=>'auth','uses'=>'QuestionsController@delete']);


//Route::get('auth/login', 'Auth\AuthController@getLogin');

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::post('updateCatName',['middleware'=>'auth','uses'=>'CategoriesController@updateCatName','as'=>'updateCatName']); //http://stackoverflow.com/questions/36598151/action-coursecontrollerpublish-not-defined-error-while-that-is-defined
Route::resource('Categories','CategoriesController');

Route::post('question/add',['uses'=>'QAController@addQuestion']);
Route::post('updateQuestion',['middleware'=>'auth','uses'=>'QuestionsController@updateQuestion']);

Route::get('/category/delete/{id}',['middleware'=>'auth','uses'=>'CategoriesController@delete']);
Route::get('/category/edit/{id}',['middleware'=>'auth','uses'=>'CategoriesController@edit']);

Route::get('/users/delete/{id}',['middleware'=>'auth','uses'=>'\App\User@remove']);
Route::post('/users/create',['middleware'=>'auth','uses'=>'UsersController@store']);
Route::get('/users/change/{id}',['middleware'=>'auth','uses'=>'UsersController@change']);
Route::post('updateUser',['middleware'=>'auth','uses'=>'UsersController@updateUser']);

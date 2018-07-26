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

Route::redirect('/', 'question', 302);

Auth::routes();
Route::resource('question', 'QuestionController', ['only' => [
    'index', 'create', 'store'
]]);

Route::group(['middleware' => 'auth'], function () {
    Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
       Route::resource('question', 'Admin\QuestionController', ['only' => ['edit', 'update', 'destroy']]);
       Route::resource('user', 'Admin\UserController', ['except' => ['show']]);
       Route::get('/home', 'Admin\HomeController@index')->name('home');
       Route::resource('topic', 'Admin\TopicController', ['except' => ['edit', 'update']]);
    });
});
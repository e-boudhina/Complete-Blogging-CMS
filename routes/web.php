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

Route::group(['prefix'=>'admin' ,'middleware'=>'auth'], function (){
    Route::get('/home', 'HomeController@index')->name('home');
    //Always put the resource after your custom link because defining a resource overrides the other url, the only resource link will be taken under account
    Route::get('/post/trashed', 'PostsController@trashed')->name('post.trashed');
    Route::get('/post/restore/{post}', 'PostsController@restore')->name('post.restore');

    Route::resource('/tag', 'TagsController');
    Route::resource('/post', 'PostsController');


    Route::resource('/category', 'CategoriesController');



});



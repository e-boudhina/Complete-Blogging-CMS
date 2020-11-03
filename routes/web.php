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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/', 'FrontEndController@index');
Route::get('/post/{slug}', 'FrontEndController@singlePost')->name('post.single');
Route::get('/category/{category}', 'FrontEndController@category')->name('category.single');

Route::get('/tag/{tag}', 'FrontEndController@tag')->name('tag.single');
Route::get('/search', 'FrontEndController@search')->name('search');



Auth::routes();

Route::group(['prefix'=>'admin' ,'middleware'=>'auth'], function (){
    Route::get('/home', 'HomeController@index')->name('home');
    //Always put the resource after your custom link because defining a resource overrides the other url, the only resource link will be taken under account
    Route::get('/post/trashed', 'PostsController@trashed')->name('post.trashed');
    Route::get('/post/restore/{post}', 'PostsController@restore')->name('post.restore');

    // We injecting middleware admin in the construct method in users controller that way all the method will be accessed only by an admin
    Route::get('/user/makeAdmin/{user}', 'UsersController@admin')->name('user.admin');
    Route::get('/user/makeDefault/{user}', 'UsersController@revoke')->name('user.revoke');



    Route::resource('/user', 'UsersController');

    Route::resource('/profile', 'ProfilesController');

    Route::get('/settings', 'SettingsController@index')->name('settings.index');
    Route::post('/settings/update', 'SettingsController@update')->name('settings.update');

    Route::resource('/tag', 'TagsController');

    Route::resource('/post', 'PostsController');


    Route::resource('/category', 'CategoriesController');



});



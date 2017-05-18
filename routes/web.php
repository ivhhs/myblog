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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'PostsController@getPage')->name('home');
// AuthController





// PostsController

Route::get('post', 'PostsController@getPage');
Route::get('post/show/{id}','PostsController@getShow')->name('getPostShow');
Route::get('post/user/{id}', 'PostsController@getUserPost')->name('getUserPost');
Route::get('post/category/{id}', 'PostsController@getCategoryPost')->name('getCategoryPost');


Route::group(['middleware' => 'auth'], function () {
	Route::get('post/create',  'PostsController@getCreate')->name('getPostCreate');
	Route::post('post/create', 'PostsController@postCreate')->name('postPostCreate');

	Route::get('post/mine','PostsController@getMine')->name('getPostMine');
	Route::get('post/update/{id}', 'PostsController@getUpdate')->name('getPostUpdate');
	Route::post('post/update', 'PostsController@postUpdate')->name('postPostUpdate');
	Route::get('post/delete/{id}', 'PostsController@getDelete')->name('getPostDelete');

	Route::post('post/upload','PostsController@uploadPostImage')->name('uploadPostImage');
	Route::post('post/comment','PostsController@addComment')->name('addComment');

});

// CategoriesController

Route::get('category','CategoriesController@getAllCategory')->name('category');

Route::group(['middleware' => 'auth'], function () {
	Route::get('category/create','CategoriesController@getCreate')->name('getCategoryCreate');
	Route::post('category/create', 'CategoriesController@postCreate')->name('postCategoryCreate');

});




// UsersController
Route::get('user','UsersController@getAllUser')->name('user');
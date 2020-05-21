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

Auth::routes(['verify' => false, 'reset' => false]);

Route::get('/', 'PostController@index');
Route::get('search', 'PostController@search');
Route::get('posts/{post}', 'PostController@show')->name('posts.show');

Route::post('posts/{post}/comment', 'PostController@comment')->name('post.comment');
Route::get('categories/{category}', 'CategoryController@index')->name('category.post');

// Authenticated User Routes
Route::get('dashboard', 'UserController@dashboard')->name('dashboard');
Route::get('user/profile', 'UserController@profile')->name('profile');
Route::get('user/posts', 'UserController@posts')->name('user.posts');

Route::get('user/posts/create', 'PostController@create')->name('user.posts.create');
Route::post('user/posts/create', 'PostController@store')->name('user.posts.store');

Route::get('user/posts/{post}/edit', 'PostController@edit')->name('user.posts.edit');
Route::patch('user/posts/{post}', 'PostController@update')->name('user.posts.update');

Route::delete('user/posts/{post}', 'PostController@destroy')->name('user.posts.destroy');

Route::get('user/categories', 'UserController@categories')->name('user.categories');

Route::get('user/categories/create', 'CategoryController@create')->name('user.categories.create');
Route::post('user/categories/create', 'CategoryController@store')->name('user.categories.store');

Route::get('user/categories/{category}/edit', 'CategoryController@edit')->name('user.categories.edit');
Route::patch('user/categories/{category}', 'CategoryController@update')->name('user.categories.update');

Route::delete('user/categories/{category}', 'CategoryController@destroy')->name('user.categories.destroy');

Route::get('user/comments', 'UserController@comments')->name('user.comments');
Route::delete('user/comments/{comment}', 'CommentController@destroy')->name('user.comments.destroy');


<?php

use App\routes;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
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
//route post
Route::get('/', 'postController@show');
Route::get('/post_topic', 'postController@create')->middleware('auth');
Route::post('/post_topic', 'postController@store')->middleware('auth');
Route::get('/edit_post/{id}', 'postController@edit')->middleware('auth');
Route::put('/edit_post/{id}', 'postController@update')->middleware('auth');
Route::delete('admin/home', 'postController@destroy')->name('admin.home')->middleware('auth');
//route category
Route::get('/category/{id}', 'categoryController@show');

//users
Route::get('/admin/users', 'AdminController@fetch_users')->middleware('auth');
Route::delete('/admin/users', 'AdminController@destroy')->middleware('auth');

//route readmore
Route::get('/discussion/{id}', 'discussionController@show')->name('discussion');
Route::post('/discussion/{id}', 'discussionController@store')->name('discussion');
//profile
Route::get('/profile/{id}', 'profileController@index');
Route::get('/edit_profile', 'profileController@edit')->middleware('auth');
Route::put('/edit_profile', 'profileController@update')->middleware('auth');
//route login
Auth::routes();
Route::get('/home', 'postController@show')->middleware('auth')->name('home');
//Admin route
Route::get('/admin/home', 'AdminController@adminHome')->name('admin.home')->middleware('auth');
Route::get('/admin/cats', 'categoryController@index')->name('admin.cats')->middleware('auth');
Route::delete('/admin/cats', 'categoryController@destroy')->name('admin.cats')->middleware('auth');
Route::get('/admin/add_cats', 'categoryController@create')->middleware('auth');
Route::post('/admin/add_cats', 'categoryController@store')->middleware('auth');
Route::get('/admin/comments', 'discussionController@index')->middleware('auth');
Route::delete('/admin/comments', 'discussionController@destroy')->middleware('auth');

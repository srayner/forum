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

Auth::routes();
Route::get('/', 'WelcomeController@index')->name('welcome');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/posts/{slug}', 'PostsController@index')->name('posts');
Route::get('/posts/{slug}/create', 'PostsController@create')->name('posts.create');
Route::post('/posts/{slug}', 'PostsController@store')->name('posts.store');
Route::delete('/posts/{post}', 'PostsController@destroy')->name('posts.destroy');

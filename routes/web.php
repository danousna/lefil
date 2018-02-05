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

Route::get('/', 'PagesController@getIndex');
Route::get('about', 'PagesController@getAbout');
Route::get('contact', 'PagesController@getContact');

// Article
Route::get('{year}/{month}/{day}/{slug}', ['as' => 'pages.article', 'uses' => 'PagesController@getArticle'])->where('year', '[\d]+')->where('month', '[\d]+')->where('day', '[\d]+')->where('slug', '[\w\pL\d\-\_]+');

// Category
Route::get('category/{category}', ['as' => 'pages.category', 'uses' => 'PagesController@getCategory'])->where('category', '[\d]+');

// User
Route::get('user/{username}', ['as' => 'pages.user', 'uses' => 'PagesController@getUser'])->where('username', '[\w\pL\d\-\_]+');

Auth::routes();

// Users
Route::resource('users', 'UserController');

// Roles
Route::resource('roles', 'RoleController');

// Permissions
Route::resource('permissions', 'PermissionController');

// Account
Route::resource('account', 'AccountController');

// Articles
Route::resource('articles', 'ArticleController');

// Categories
Route::resource('categories', 'CategoryController');


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

/* 
    Public facing pages
*/

Route::get('/', 'PagesController@getIndex');
Route::get('about', 'PagesController@getAbout');

// Contact
Route::get('contact', 'PagesController@getContact');
Route::post('contact', 'PagesController@postContact');

// Article
Route::get('{year}/{month}/{day}/{slug}', ['as' => 'pages.article', 'uses' => 'PagesController@getArticle'])->where('year', '[\d]+')->where('month', '[\d]+')->where('day', '[\d]+')->where('slug', '[\w\pL\d\-\_]+');

// Category
Route::get('rubriques', 'PagesController@getCategories')->name('pages.categories');
Route::get('rubriques/{category}', ['as' => 'pages.category', 'uses' => 'PagesController@getCategory'])->where('category', '[\d]+');

// Issue
Route::get('numéros','PagesController@getIssues')->name('pages.issues');
Route::get('numéros/{number}','PagesController@getIssue')->name('pages.issue');

// Bops
Route::get('bops', 'PagesController@getBops')->name('pages.bops');
Route::post('bops', 'PagesController@postBops')->name('pages.bops');
Route::put('bops/{id}', 'PagesController@likeBops')->name('pages.likeBops')->middleware('auth');
Route::put('bops/{id}/unlike', 'PagesController@unlikeBops')->name('pages.unlikeBops')->middleware('auth');

// Spotted
Route::get('spotted', 'PagesController@getSpotted')->name('pages.spotted');
Route::post('spotted', 'PagesController@postSpotted')->name('pages.spotted');
Route::put('spotted/{id}', 'PagesController@likeSpotted')->name('pages.likeSpotted')->middleware('auth');
Route::put('spotted/{id}/unlike', 'PagesController@unlikeSpotted')->name('pages.unlikeSpotted')->middleware('auth');

// User
Route::get('user/{username}', ['as' => 'pages.user', 'uses' => 'PagesController@getUser'])->where('username', '[\w\pL\d\-\_]+');

// Archive
Route::get('archive', 'PagesController@getArchive');

// Help
Route::get('help', 'HelpController@getIndex')->name('help');
Route::get('help/markdown', 'HelpController@getMarkdown')->name('help.markdown');


/*
    Auth facing pages
*/

// Default Auth Routes
// Auth::routes();

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes
Route::get('register/cas', 'CasController@showLoginForm')->name('register.cas');
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes
Route::get('password/reset', ['as' => 'password.request', 'uses' => 'Auth\ForgotPasswordController@showLinkRequestForm']);
Route::post('password/email', ['as' => 'password.email', 'uses' => 'Auth\ForgotPasswordController@sendResetLinkEmail']);
Route::get('password/reset/{token}', ['as' => 'password.reset', 'uses' => 'Auth\ResetPasswordController@showResetForm']);
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

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
Route::post('articles/{id}/publish', 'ArticleController@publishRequest')->name('articles.publish');

// Publish tool
Route::get('publish', 'PublishController@index')->name('publish.index');
Route::get('publish/{id}', 'PublishController@publish')->name('publish.article');
Route::get('publish/{id}/refuse', 'PublishController@refuse')->name('publish.refuse');

// Categories
Route::resource('categories', 'CategoryController');

// Issues
Route::resource('issues', 'IssueController');
Route::get('issues/{id}/publish', 'IssueController@publish')->name('issues.publish');

// Comments
Route::get('comments', 'CommentController@index')->name('comments.index');
Route::put('comments/{id}', 'CommentController@update')->name('comments.update');
Route::delete('comments/{id}', 'CommentController@destroy')->name('comments.destroy');
Route::post('articles/{id}/comment/{reply_comment_id}', 'CommentController@store')->name('comments.store');

// Bops
Route::resource('bops_manager', 'BopsController');

// Spotted
Route::resource('spotted_manager', 'SpottedController');

// Search
Route::post('search', 'SearchController@results')->name('search.results');



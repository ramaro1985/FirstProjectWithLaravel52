<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['middleware' => ['web']], function () {
});

Route::get('/', [
    'uses' => 'FrontendController@index',
    'as' => 'index'
]);


Route::get('/loguin/{header_id}', [
    'uses' => 'FrontendController@getLoguin',
    'as' => 'frontend.loguin'
]);

Route::post('/signup', [
    'uses' => 'UserController@postSignUp',
    'as' => 'signup'
]);

Route::post('/signin', [
    'uses' => 'UserController@postSignIn',
    'as' => 'signin'

]);

Route::get('/dashboard', [
    'uses' => 'PostController@getDashboard',
    'as' => 'dashboard',
    'middleware' => 'auth'
]);

Route::post('/createpost', [
    'uses' => 'PostController@postCreate',
    'as' => 'post.create',
    'middleware' => 'auth'

]);

Route::get('/deletepost/{post_id}', [
    'uses' => 'PostController@getDeletePost',
    'as' => 'post.delete',
    'middleware' => 'auth'

]);

Route::post('/editpost', [
    'uses' => 'PostController@postEditPost',
    'as' => 'post.edit',
    'middleware' => 'auth'

]);

Route::get('/logout', [
    'uses' => 'UserController@getLogout',
    'as' => 'logout'
]);
Route::get('/account', [
    'uses' => 'UserController@getAccount',
    'as' => 'account.get',
    'middleware' => 'auth'
]);

Route::get('/usserimage/{filename}', [
    'uses' => 'UserController@getUserImage',
    'as' => 'account.name',
    'middleware' => 'auth'
]);

Route::post('/editAccount', [
    'uses' => 'UserController@postEditAccount',
    'as' => 'account.save',
    'middleware' => 'auth'
]);
Route::post('/like', [
    'uses' => 'PostController@postLikePost',
    'as' => 'like'
]);

Route::post('/send', [
    'as' => 'send',
    'uses' => 'MailController@send'
]);

Route::get('/contact', [
    'as' => 'contact',
    'uses' => 'MailController@index'
]);
Route::post('/postComment', [
    'as' => 'post.comment',
    'uses' => 'PostController@postComment'
]);

Route::post('/ContactUs', [
    'as' => 'post.contactus',
    'uses' => 'FrontendController@postContactUs'
]);

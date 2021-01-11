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




Route::get('/deneme', 'HomeController@get_deneme');

Route::get('/form', 'HomeController@get_form');

Route::get('/', 'HomeController@get_girisform');

Route::get('/fmaster', 'HomeController@get_fmaster');

Route::get('/üyeler', 'HomeController@get_üyeler');

Route::post('/üyeler', 'HomeController@post_üyeler');

Route::post('/login', 'HomeController@post_login');

Route::post('/signup', 'HomeController@post_signup');

Route::get('/logout', 'HomeController@logout');

Route::get('/home', 'HomeController@home');


//profil
Route::get('/profil', 'HomeController@profil');
Route::post('/profil', 'HomeController@profil');
Route::get('/otherprofile', 'HomeController@otherProfile');

Route::post('/changePassword', 'HomeController@post_changePassword');

Route::post('/profileSettings', 'HomeController@post_profileSettings');


//post
Route::get('/postLike/{id}', 'HomeController@post_like');
Route::get('/postUnlike/{id}', 'HomeController@post_unlike');
Route::post('/comment', 'HomeController@post_comment');
Route::get('/comment', 'HomeController@get_comment');

Route::get('/posts', 'HomeController@createPost');
Route::post('/posts', 'HomeController@createPost');


//company
Route::get('/company', 'CompanyController@createCompany');
Route::post('/company', 'CompanyController@createCompany');

Route::get('/showCompany', 'CompanyController@show');
Route::post('/showCompany', 'CompanyController@show');

Route::get('/denemeCompany', 'CompanyController@show');

Route::get('/follow/{id}', 'HomeController@follow');
Route::get('/unfollow/{id}', 'HomeController@unfollow');

Route::get('/join/{id}', 'HomeController@join');


Route::post('/changeFoto}', 'HomeController@changeFoto');


Route::post('/comComment', 'HomeController@comComment');

//search
Route::resource('/searchs','SearchController');
Route::get('/search-followers','SearchController@searchFollowers');

Route::get('/search',[
    'uses' => 'SearchController@getResults',
    'as' => 'search.results',
]);

Route::get('/message', 'MessageController@messaging');



Route::post('ajaxRequest', 'MessageController@ajaxRequestPost');
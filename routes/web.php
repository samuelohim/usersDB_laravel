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

// list all users


// show the form to create a user

// process the form to create user: POST route

// show form to edit a user


// process the edit form
// delete a user

/*
Route::get('/users', 'UserController@functionName');
Route::get('/users/create', 'UserController@create');
*/


// Let's use build-in Laravel staff:
Route::resource('users', 'UserController');
Route::resource('users-create', 'UserController');



							 


// Route::resource('users/$id', 'UserController/show');


// Route::resource('users/$id/edit', 'UserController/edit');
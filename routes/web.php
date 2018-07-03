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

/**
 * Root view
 */ 
Route::get('/', function () {
    return view('welcome'); // changed from 'welcome' to 'phonebook' to 'welcome'
});

/**
 * Phonebook route
 */ 
Route::get('/phonebook/{name}', function() {
        return redirect('/');
    }
)->where('name', '[A-Za-z0-9_-]+');

/**
 * Phonebook database route
 */
Route::resource('phonebook', 'PhonebookController');

/**
 * getData route; Calls PhonebookController's getData() method.
 */
Route::post('getData', 'PhonebookController@getData');
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
/*
 * Website pages
 */
Route::get('/', 'HomeController@index');

Route::post('contacts/create', 'HomeController@contactsCreate');

/*
 * Admin pages
 */
Route::get('/admin', 'Admin\AdminController@index');
/*
 * Checkout connect Databases
 */
Route::get('/checkDB', function () {
    dd(DB::connection()->getDatabaseName());
});

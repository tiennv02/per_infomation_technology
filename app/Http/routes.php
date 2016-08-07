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
Route::group(['middleware' => ['web']], function () {
    Route::get('/', 'HomeController@index');

    Route::post('contacts/create', 'HomeController@contactsCreate');

    /*
     * Admin pages
     */
    Route::get('/auth/login', 'Admin\Auth\AuthController@getLogin');
    Route::post('/auth/login', 'Admin\Auth\AuthController@postLogin');
    Route::get('/auth/logout', 'Admin\Auth\AuthController@getLogout');
    Route::get('/auth/resetPassword', 'Admin\Auth\AuthController@getResetPassword');
    Route::post('/auth/resetPassword', 'Admin\Auth\AuthController@postResetPassword');
    Route::get('/auth/register', 'Admin\Auth\AuthController@getRegister');
    Route::post('/auth/register', 'Admin\Auth\AuthController@postRegister');
    Route::get('/admin', 'Admin\AdminController@index');
    /*
     * Contacts Management
     */
    Route::get('admin/moduls/contacts', 'Admin\Moduls\Contacts\ContactsManagementController@index');
    Route::get('admin/moduls/contacts/searchContacts', 'Admin\Moduls\Contacts\ContactsManagementController@searchContacts');
    Route::get('admin/moduls/contacts/getLstContacts', 'Admin\Moduls\Contacts\ContactsManagementController@getLstContacts');
    Route::get('admin/moduls/contacts/get/{id}', 'Admin\Moduls\Contacts\ContactsManagementController@get');
    Route::put('admin/moduls/contacts/update/{id?}', 'Admin\Moduls\Contacts\ContactsManagementController@update');
    Route::delete('admin/moduls/contacts/delete/{id?}', 'Admin\Moduls\Contacts\ContactsManagementController@delete');
    /*
     * Project Info
     */
    Route::get('admin/moduls/projectInfo', 'Admin\Moduls\ProjectInfo\ProjectInfoController@getIndex');
    //view
    Route::get('admin/moduls/projectInfo/getView/{projectInfoId}', 'Admin\Moduls\ProjectInfo\ProjectInfoController@getView');
    //create
    Route::get('admin/moduls/projectInfo/create', 'Admin\Moduls\ProjectInfo\ProjectInfoController@getCreate');
    Route::post('admin/moduls/projectInfo/create', 'Admin\Moduls\ProjectInfo\ProjectInfoController@postCreate');
    //edit
    Route::get('admin/moduls/projectInfo/update/{projectInfoId}', ['as' => 'projectInfo.getUpdate', 'uses' => 'Admin\Moduls\ProjectInfo\ProjectInfoController@getUpdate']);
    Route::post('admin/moduls/projectInfo/update', 'Admin\Moduls\ProjectInfo\ProjectInfoController@postUpdate');
    //delete
    Route::delete('admin/moduls/projectInfo/delete', ['as' => 'projectInfo.delete', 'uses' => 'Admin\Moduls\ProjectInfo\ProjectInfoController@postDelete']);

});
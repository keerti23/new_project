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

Route::group(["namespace" => 'Admin', "prefix" => "admin"], function() {
    Route::get('', ['uses'          => 'AdminController@login', 'as' => 'admin.login']);
    Route::post('', ['uses'         => 'AdminController@loginCheck', 'as' => 'admin.logincheck']);
    Route::get('logout', ['uses'    => 'AdminController@logout', 'as' => 'admin.logout']);
});


Route::group(["namespace" => 'Admin','middleware'=>'authcheck', "prefix" => "admin"], function() {

    Route::get('changepasswordform',    ['uses' => 'AdminDashboardController@changePasswordView', 'as' => 'change.password.view']);
    Route::post('changepasswordform',    ['uses' => 'AdminDashboardController@changePassword', 'as' => 'admin.change.password']);


    Route::get('dashboard',             ['uses' => 'AdminDashboardController@dashboard', 'as' => 'admin.dashboard']);
    
    Route::get('settings/general/view',             ['uses'=>   'AdminDashboardController@generalSettings','as'   =>'admin.general.settings']);
    Route::get('settings/profile/view',             ['uses'=>   'AdminDashboardController@profileSettings','as'   =>'admin.profile.settings']);
    Route::post('settings/general',             ['uses'=>'AdminDashboardController@updateGeneralSettings','as'=>'admin.update.general.settings']);
    Route::post('settings/profile',             ['uses'=>'AdminDashboardController@updateProfileSettings','as'=>'admin.update.profile.settings']);


});




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

/** This group is used to Localize Routes to the right language **/

Route::group(['prefix' => LaravelLocalization::setLocale()], function()
    {
        Route::get('/', 'PagesController@index');

				Route::get('project', 'PagesController@viewProjects');

				Route::get('create-project', 'PagesController@createProject');

				Route::controllers([
					'auth' => 'Auth\AuthController',
					'password' => 'Auth\PasswordController',
				]);

				/** ADD ADDITIONAL ROUTES INSIDE HERE (INSIDE OF THIS GROUP) **/

    });

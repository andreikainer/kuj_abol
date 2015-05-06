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

use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localizationRedirect', 'localeSessionRedirect', 'localize' ]
    ],
    function()
    {

        Route::get('/', 'ProjectsController@show');

//        Route::get(LaravelLocalization::transRoute('routes./'), 'PagesController@index');

        Route::get(LaravelLocalization::transRoute('routes.project'), 'PagesController@viewProjects');

        Route::get(LaravelLocalization::transRoute('routes.create-project'), 'ProjectsController@createProject');

        Route::post(LaravelLocalization::transRoute('routes.create-project/store'), 'ProjectsController@store');

        Route::get(LaravelLocalization::transRoute('routes.get-locale'), 'AjaxController@getLocale');

        Route::get(LaravelLocalization::transRoute('routes.how-it-works'), 'PagesController@howItWorks');

        Route::get(LaravelLocalization::transRoute('routes.sponsors'), 'PagesController@sponsors');

        Route::get(LaravelLocalization::transRoute('routes.contact/{address?}'), 'ContactFormController@getContactForm');
        Route::post(LaravelLocalization::transRoute('routes.contact/{address?}'), 'ContactFormController@postContactForm');

        Route::controllers([

          'auth' => 'Auth\AuthController',
          'password' => 'Auth\PasswordController',
        ]);

        /** ADD ADDITIONAL ROUTES INSIDE HERE (INSIDE OF THIS GROUP) **/

        //Route::get(LaravelLocalization::transRoute('routes.<key>'), '<Controller>@<Method>');
    });

/** OTHER PAGES THAT SHOULD NOT BE LOCALIZED for example just German pages**/

// Route::get('test', '<Controller>@<Method>');

Route::post('temp-document', 'AjaxController@tempDocument');

Route::post('search-results', 'HeaderController@index');

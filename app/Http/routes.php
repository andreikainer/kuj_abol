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
    /*-- Landing Page --*/
        Route::get('/',['as' => 'home', 'uses' => 'ProjectsController@index']);

    /*-- Landing Page --*/
        Route::get(LaravelLocalization::transRoute('routes.abol'),  'PagesController@abol');

        Route::get(LaravelLocalization::transRoute('routes.project').'/{slug}',  'ProjectsController@show');

        Route::get(LaravelLocalization::transRoute('routes.current-projects'), 'ProjectsController@showMoreProjects');
        Route::get(LaravelLocalization::transRoute('routes.successful-projects'), 'ProjectsController@showMoreSuccProjects');

        Route::get(LaravelLocalization::transRoute('routes.create-project'), 'ProjectsController@createProject');

        Route::post(LaravelLocalization::transRoute('routes.create-project/store'), 'ProjectsController@store');

        Route::get(LaravelLocalization::transRoute('routes.get-locale'), 'AjaxController@getLocale');

    /*-- HowItWorks Page --*/
        Route::get(LaravelLocalization::transRoute('routes.how-it-works'), 'PagesController@howItWorks');

    /*-- Sponsors Page --*/
        Route::get(LaravelLocalization::transRoute('routes.sponsors'), 'PagesController@sponsors');

    /*-- Contact Page --*/
        Route::get(LaravelLocalization::transRoute('routes.contact'), 'ContactFormController@getContactForm');
        Route::post(LaravelLocalization::transRoute('routes.contact'), 'ContactFormController@postContactForm');


        Route::get(LaravelLocalization::transRoute('routes.create-project/success'), 'ProjectsController@success');
        Route::post(LaravelLocalization::transRoute('routes.create-project/save'), 'ProjectsController@save');
        Route::patch(LaravelLocalization::transRoute('routes.create-project/save'), 'ProjectsController@save');
        Route::patch(LaravelLocalization::transRoute('routes.create-project/update').'/{slug}', 'ProjectsController@update');

        Route::get(LaravelLocalization::transRoute('routes.create-project/edit').'/{slug}', 'ProjectsController@edit');
        Route::delete(LaravelLocalization::transRoute('routes.create-project/delete').'/{slug}', 'ProjectsController@delete');

        Route::post(LaravelLocalization::transRoute('routes.create-project/start'), 'ProjectsController@start');

        Route::post(LaravelLocalization::transRoute('routes.temp-document'), 'AjaxController@tempDocument');

//        Route::controllers([
//
//            LaravelLocalization::transRoute('routes.account')   => 'Auth\AuthController',
//            LaravelLocalization::transRoute('routes.password')  => 'Auth\PasswordController',
//        ]);
        /*-- Registration --*/
        Route::get(LaravelLocalization::transRoute('routes.account/register'), 'Auth\AuthController@getRegister');

        Route::post(LaravelLocalization::transRoute('routes.account/register'), 'Auth\AuthController@postRegister');

        Route::get(LaravelLocalization::transRoute('routes.account/verify'), 'Auth\AuthController@getVerify');

        Route::post(LaravelLocalization::transRoute('routes.search-results'), 'SearchController@show');

        Route::get(LaravelLocalization::transRoute('routes.account/verify').'/{conf_code}', 'Auth\AuthController@getVerify');

    /*-- LogIn Page --*/
        Route::get(LaravelLocalization::transRoute('routes.account/login'), 'Auth\AuthController@getLogin');
        Route::post(LaravelLocalization::transRoute('routes.account/login'), 'Auth\AuthController@postLogin');

    /*-- LogOut Page --*/
        Route::get(LaravelLocalization::transRoute('routes.logout'), 'Auth\AuthController@getLogout');


    /*-- Password reset Page --*/
        Route::get(LaravelLocalization::transRoute('routes.account/reset'), 'Auth\PasswordController@getEmail');
        Route::post(LaravelLocalization::transRoute('routes.password/email'), 'Auth\PasswordController@postEmail');
        Route::get(LaravelLocalization::transRoute('routes.password/reset').'/{token}', 'Auth\PasswordController@getReset');
        Route::post(LaravelLocalization::transRoute('routes.password/reset').'/{token}', 'Auth\PasswordController@postReset');

    /*-- Userpanel Page --*/
        Route::get(LaravelLocalization::transRoute('routes.account').'/{username}', 'UserpanelController@show');
        Route::post(LaravelLocalization::transRoute('routes.account').'/{username}', 'UserpanelController@update');
        Route::get(LaravelLocalization::transRoute('routes.account/delete').'/{username}', 'UserpanelController@delete');

        Route::get(LaravelLocalization::transRoute('routes.favourite/add').'/{id}', 'UserpanelController@addFavourite');
        Route::get(LaravelLocalization::transRoute('routes.favourite/remove').'/{id}', 'UserpanelController@removeFavourite');
        Route::get(LaravelLocalization::transRoute('routes.toggle').'/{id}', 'UserpanelController@edit');

        Route::get(LaravelLocalization::transRoute('routes.admin'), 'AdminController@index');
        Route::get(LaravelLocalization::transRoute('routes.admin/edit-project').'/{slug}', 'AdminController@getEditProject');
        Route::patch(LaravelLocalization::transRoute('routes.admin/edit-project').'/{slug}', 'AdminController@patchEditProject');
        Route::get(LaravelLocalization::transRoute('routes.admin/approve-project').'/{slug}', 'AdminController@getApproveProject');


        /** ADD ADDITIONAL ROUTES INSIDE HERE (INSIDE OF THIS GROUP) **/

        //Route::get(LaravelLocalization::transRoute('routes.<key>'), '<Controller>@<Method>');
    });

/** OTHER PAGES THAT SHOULD NOT BE LOCALIZED for example just German pages**/

// Route::get('test', '<Controller>@<Method>');


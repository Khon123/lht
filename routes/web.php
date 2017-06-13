<?php

use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;

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

// Route::get('/', function () {
//     return view('welcome');
// });

//Route article
Route::group(['prefix' => '/admin/menu'], function () {
    Route::get('/', 'backend\ArticleController@index');
    Route::get('/{id?}', 'backend\ArticleController@get');
    Route::post('/{id?}', 'backend\ArticleController@update');
});
//Route Home
Route::group(['prefix' => '/admin/home'], function(){
    Route::get('/', 'backend\HomeController@view');
    Route::get('/{id?}', 'backend\HomeController@get');
    Route::post('/{id?}', 'backend\HomeController@update');
});

//Route About
Route::group(['prefix' => '/admin/about'], function(){
    Route::get('/', 'backend\AboutController@view');
    Route::get('/{id?}', 'backend\AboutController@get');
    Route::post('/{id?}', 'backend\AboutController@update');
});
//Route slider
Route::group(['prefix' => '/admin/slide'], function () {
    Route::get('/', 'backend\SliderController@view');
    Route::get('/{slide_id?}', 'backend\SliderController@get');
    Route::post('/', 'backend\SliderController@store');
    Route::post('/{slide_id?}', 'backend\SliderController@update');
    Route::delete('/{slide_id?}', 'backend\SliderController@destroy'); 
});

//Route company 
Route::group(['prefix' => '/admin/company'], function () {
    Route::get('/', 'backend\CompanyController@view');
    Route::get('/{id?}', 'backend\CompanyController@get');
    Route::post('/', 'backend\CompanyController@store');
    Route::post('/{id?}', 'backend\CompanyController@update');
    Route::delete('/{id?}', 'backend\CompanyController@destroy'); 
});
//Route sub company
Route::group(['prefix' => '/admin/subcompany'], function(){
    Route::get('/', 'backend\SubCompanyController@view');
    Route::get('/{id?}', 'backend\SubCompanyController@get');
    Route::post('/{id?}', 'backend\SubCompanyController@update');
});

// Route team
Route::group(['prefix' => '/admin/team'], function () {
    Route::get('/', 'backend\EmployeeController@view');
    Route::get('/{employee_id?}', 'backend\EmployeeController@get');
    Route::post('/', 'backend\EmployeeController@store');
    Route::post('/{employee_id?}', 'backend\EmployeeController@update');
    Route::delete('/{employee_id?}', 'backend\EmployeeController@destroy'); 
});

//Route Event
Route::group(['prefix' => '/admin/event'], function(){
    Route::get('/', 'backend\EventController@view');
    Route::get('/{event_id?}', 'backend\EventController@edit');
    Route::post('/', 'backend\EventController@store');
    Route::post('/{event_id?}', 'backend\EventController@update');
    Route::delete('/{event_id?}', 'backend\EventController@destroy');
});

// Route Trading
Route::group(['prefix' => '/admin/trading'], function(){
    Route::get('/', 'backend\TradingController@view');
    Route::get('/{id?}', 'backend\TradingController@get');
    Route::post('/{id?}', 'backend\TradingController@update');
});
// Route career
Route::group(['prefix' => '/admin/career'], function(){
    Route::get('/', 'backend\CareerController@view');   
    Route::get('/{career_id?}', 'backend\CareerController@edit');
    Route::post('/', 'backend\CareerController@store');
    Route::post('/{career_id?}', 'backend\CareerController@update');
    Route::delete('/{career_id?}', 'backend\CareerController@destroy');
});

// Route user
Route::group(['prefix' => '/admin/user'], function(){
    Route::get('/', 'backend\UserController@view');   
    Route::get('/{id?}', 'backend\UserController@edit');
    Route::post('/{id?}', 'backend\UserController@update');
});
Route::post('/admin/change-password', 'backend\ChangePasswordController@changePassword');


// ========================================================================

        // Route FrontEnd

// Route Home
Route::get('/', 'frontend\HomeController@getIndex');

// Route About

Route::get('/about', 'frontend\AboutController@getIndex');

// Route Company
Route::group(['prefix' => '/group-company'], function(){
    Route::get('/', 'frontend\GroupCompanyController@getIndex');
    // Route Sub Company
    Route::get('/sub-company/{id?}', 'frontend\GroupCompanyController@getSubCompany');
});

// Route Team

Route::get('/team', 'frontend\TeamController@getIndex');
Route::get('/team/{id?}', 'frontend\TeamController@showTeam');

// Route Event

Route::get('/event', 'frontend\EventFrontendController@getIndex');
Route::get('/event/{id?}', 'frontend\EventFrontendController@showEvent');
// Route Trading

Route::get('/trading', 'frontend\TradingController@getIndex');

// Route Career

Route::get('/career', 'frontend\CareerFrontendController@getIndex');
Route::get('/career/{id?}', 'frontend\CareerFrontendController@showCareer');

// Route Contact Us

Route::get('/contact', 'frontend\ContactController@getIndex');
Route::post('/contact', 'frontend\ContactController@sendEmail');

        





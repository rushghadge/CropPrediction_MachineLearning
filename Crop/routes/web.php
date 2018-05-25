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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('admin', 'Admin\AdminController@index');
Route::resource('admin/roles', 'Admin\RolesController');
Route::resource('admin/permissions', 'Admin\PermissionsController');
Route::resource('admin/users', 'Admin\UsersController');
Route::get('admin/generator', ['uses' => '\Appzcoder\LaravelAdmin\Controllers\ProcessController@getGenerator']);
Route::post('admin/generator', ['uses' => '\Appzcoder\LaravelAdmin\Controllers\ProcessController@postGenerator']);
Route::resource('debug/debugs', 'Debug\\DebugsController');
Route::resource('profile/profiles', 'Profile\\ProfilesController');
Route::resource('cropprediction/croppredictions', 'CroppredictionsController');

//Route::post('crop','CropController@index');
Route::post('crop', 'CroppredictionsController@store');




// Check role in route middleware
Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['auth', 'roles'], 'roles' => 'admin'], function () {
   Route::get('/', ['uses' => 'AdminController@index']);
});

Route::get('temp', 'Weather\WeatherController@index');
Route::get('cropinfo/data', 'PieController@index');
Route::get('cropinfoPYield/data', 'TestController@index');
Route::get('waterresource/front', function () {
    return view('waterresource.front');

});
Route::get('/front', function () {
    return view('waterresource.front');
});
Route::get('governmentscheme/front', function () {
    return view('governmentscheme.data');
});
//Route::resource('frontendCropprediction/cropprediction', 'Cropperdiction\\CroppredictionController');
//Route::get('temp', 'Weather\WeatherController@index');

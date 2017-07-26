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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/access_request', function(){
  return view('auth.access_request');
});

Route::post('/access_request', 'LA\RegistrationsController@access_request');
Route::get('/email_verification/{token}', 'LA\RegistrationsController@email_verification');


/* ================== Homepage + Admin Routes ================== */

require __DIR__.'/admin_routes.php';

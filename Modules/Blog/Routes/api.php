<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/blog', function (Request $request) {
//    return $request->user();
//});

/** login, logout */
Route::group(['middleware' => 'api'], function ($router) {
    Route::post('login', '\App\Http\Controllers\ApiAuthController@login');
    Route::post('logout', '\App\Http\Controllers\ApiAuthController@logout');

});
//'middleware' => 'api',
/** BLOG */
Route::group([ 'namespace'=>'Api\Customer', 'prefix'=>'blog'], function ($router) {

    Route::group(['prefix'=>'posts'], function () {
        Route::get('/', 'PostsController@index');
        Route::post('/', 'PostsController@store');
        Route::get('/{id}', 'PostsController@show');
        Route::put('/{id}', 'PostsController@update');
        Route::delete('/{id}', 'PostsController@destroy');
    });

    Route::group(['prefix'=>'users'], function() {
        Route::get('/', 'UsersController@index');
        Route::post('/', 'UsersController@store');
        Route::get('/{id}', 'UsersController@show');
        Route::put('/{id}', 'UsersController@update');
        Route::delete('/{id}', 'UsersController@destroy');
    });
});

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
Route::get('/register_admin', 'Admin\AdminController@register');
Route::post('/register_admin', 'Admin\AdminController@storeRegister');

Route::group(['prefix' => 'api'], function () {
    Route::get('/api_user', 'Api\ApiController@getApiUser');
    Route::get('/api_count_dataset', 'Api\ApiController@getApiCountDataset');
    Route::get('/api_game', 'Api\ApiController@getApiGame');
    Route::get('/api_item', 'Api\ApiController@getApiItem');
    Route::get('/api_dataset/{id}', 'Api\ApiController@getDataset');
    
});

Route::group(['prefix' => 'api_admin'], function () {
    Route::get('/api_user', 'Api\ApiAdminController@getApiUsers');
    Route::get('/api_museum_code', 'Api\ApiAdminController@getApiMuseum');
    Route::get('/api_game', 'Api\ApiAdminController@getApiGames');
    Route::get('/api_data_game/{id}', 'Api\ApiAdminController@getDataGame');
    Route::get('/api_data_user/{id}', 'Api\ApiAdminController@getDataUser');
});

//Route for normal user
Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', 'Authorities\AuthoritiesController@index');
    Route::get('/create_dataset', 'Authorities\AuthoritiesController@showFormCreateDataset');
    Route::post('/create_dataset', 'Authorities\AuthoritiesController@storeFormCreatDataset');
    Route::get('/delete_dataset', 'Authorities\AuthoritiesController@showFromDeleteDataset');
    Route::post('/delete_dataset', 'Authorities\AuthoritiesController@destroyFormDeleteDataset');
    Route::post('/search_dataset', 'Authorities\AuthoritiesController@storeFormSearchDataset');
    Route::get('/create_game', 'Authorities\AuthoritiesController@showFormCreateGame');
    Route::post('/create_game', 'Authorities\AuthoritiesController@storeFormCreateGame');
    Route::get('/show_dataset', 'Authorities\AuthoritiesController@showDataset');


});
//Route for admin
Route::group(['prefix' => 'admin'], function () {
    Route::group(['middleware' => ['admin']], function () {
        Route::get('/dashboard', 'Admin\AdminController@index');
        Route::get('/manage_members', 'Admin\AdminController@showManageMembers');
        Route::post('/manage_members', 'Admin\AdminController@storeManageMembers');
        Route::get('/manage_games', 'Admin\AdminController@showManageGames');
        Route::post('/manage_games', 'Admin\AdminController@storeManageGames');
        Route::post('/edit_manage_game', 'Admin\AdminController@editManageGames');
        Route::post('/delete_manage_game', 'Admin\AdminController@destroyManageGames');
        Route::post('/edit_manage_user', 'Admin\AdminController@editManageUsers');
        Route::post('/delete_manage_user', 'Admin\AdminController@destroyManageUsers');
    });
});

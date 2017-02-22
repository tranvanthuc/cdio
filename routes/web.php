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

Route::get('/', ['as' =>
'getIndex', function(){
	return view('index');
}]);

Route::get('login', ['as' => 'getLogin', 'uses' => 'LoginController@getLogin']);
Route::post('login', ['as' => 'postLogin', 'uses' => 'LoginController@postLogin']);
Route::get('logout', ['as' => 'getLogout', 'uses' => 'LoginController@getLogout']);

Route::get('register', ['as' => 'getRegister', 'uses' => 'RegisterController@getRegister']);
Route::post('register', ['as' => 'postRegister', 'uses' => 'RegisterController@postRegister']);

Route::group(['middleware' => 'auth'], function(){
	Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function(){
		Route::get('/dashboard', ['as' => 'getDashboard', function(){
			return view('admin.dashboard');
		}]);

		Route::group(['prefix' => 'user'], function(){
			Route::get('add', ['as' => 'getAddUser', 'uses' => 'UserController@getAddUser']);

			Route::post('add', ['as' => 'postAddUser', 'uses' => 'UserController@postAddUser']);

			Route::get('list', ['as' => 'getListUser', 'uses' => 'UserController@getListUser']);

			Route::get('lock/{id}',['as' => 'getLockUser' , 'uses' => 'UserController@getLockUser']);
			Route::get('delete/{id}',['as' => 'getDelUser' , 'uses' => 'UserController@getDelUser']);

		}); //user
		
		Route::group(['prefix' => 'news'], function(){
			Route::get('add', ['as' => 'getAddNews', 'uses' => 'NewsController@getAddNews']);

			Route::post('add', ['as' => 'postAddNews', 'uses' => 'NewsController@postAddNews']);
			Route::get('edit/{id}', ['as' => 'getEditNews', 'uses' => 'NewsController@getEditNews']);

			Route::get('lock/{id}',['as' => 'getLockNews' , 'uses' => 'NewsController@getLockNews']);

			Route::get('list', ['as' => 'getListNews', 'uses' => 'NewsController@getListNews']);

			Route::get('delete/{id}',['as' => 'getDelNews' , 'uses' => 'NewsController@getDelNews']);

		}); //news
		
		Route::get('report', ['as' => 'getReport', 'uses' => 'ReportController@getReport']);
	}); // admin
}); //midleware

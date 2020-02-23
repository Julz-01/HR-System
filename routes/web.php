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
    return view('auth/login');
});
Auth::routes();

//ADMIN ROUTES
Route::group(['namespace' => 'Admin'],function(){
//ADMIN Login
Route::get('admin-login', 'Auth\LoginController@showLoginForm')->name('admin.login');
Route::post('admin-login', 'Auth\LoginController@login');
//Admin home // time logs
Route::get('admin/home','AdminController@direct')->name('admin.home');
Route::post('admin/time-in', 'AdminController@timein');
Route::post('admin/time-out/{id}', 'AdminController@timeout');
//ANNOUNCEMENTS
Route::get('admin/announce', 'AnnounceController@announce');
//announcement Update
Route::put('admin/update/announce', 'AnnounceController@up_announce');
//employee database view
Route::get('admin/employee-list', 'AccountController@employee_list');
//admin list
Route::get('admin-list', 'AccountController@admin_list');
//add user
Route::get('admin/add-user', 'AccountController@add_user');
//delete User
Route::get('/destroy_user/{id}', 'AccountController@destroy');
//update User
Route::put('/update/{id}', 'AccountController@update');
//delete admins
Route::get('/destroy_admin/{id}', 'AccountController@destroy_admin');
//update admins
Route::put('/update_admin/{id}', 'AccountController@update_admin');
//add new user
Route::post('/add-user', 'AccountController@register_user');
//user timesheet view
Route::get('/user/timesheet', 'TimesheetController@timesheet');
//admin timesheet view
Route::get('/admin/timesheet', 'TimesheetController@admin_timesheet');
//request view
Route::get('/admin/request', 'RequestController@get_request');
//accept request
Route::put('/admin/request/accept/{id}', 'RequestController@accept_request');
//decline request 
Route::put('/admin/request/decline/{id}', 'RequestController@decline_request');
//filter
Route::post('/user/timesheet', 'TimesheetController@timesheet');
Route::post('/admin/timesheet', 'TimesheetController@timesheet');

//truncate method
Route::get('/truncate', 'TimesheetController@truncate');
//truncate admin
Route::get('/truncate_admin', 'TimesheetController@truncate_admin');

});


//USER ROUTES

Route::group(['namespace' => 'User'],function(){
//Home
Route::get('/home', 'UserController@index')->name('home');
//time logs
Route::post('/time-in', 'UserController@timein');
Route::post('/time-out/{id}', 'UserController@timeout');
//personal profile view
Route::get('/profile','UserController@profile');
//request view
Route::get('/request', 'UserController@request');
//request send
Route::post('/send_request', 'UserController@send_request');
	});

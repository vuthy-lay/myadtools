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
    return view('home');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

    //Change Password
Route::get('/change_password', 'ChangepassController@index')->name('Changepass');
Route::post('/change_password', 'ChangepassController@update');

    //Overral Info
Route::get('/overralinfo', 'Overral_InfoController@index')->name('overralinfo');

    //Reports
Route::get('/reports', 'ReportsController@indexe')->name('reports');

    //Letter In
Route::get('/letterin', 'Letter_InController@index')->name('letterin');
Route::get('/letterin_create', 'Letter_InController@create')->name('letterin_create');
Route::post('/letterin_create', 'Letter_InController@store');
Route::get('/letterin_edit/{seq}', 'Letter_InController@edit')->name('letterin_edit');
Route::get('/letterin_show/{seq}', 'Letter_InController@show')->name('letterin_show');
Route::post('/letterin_remove', 'Letter_InController@remove')->name('letterin_remove');

    //Letter In
Route::get('/letterout', 'Letter_OutController@index')->name('letterout');
Route::get('/letterout_create', 'Letter_OutController@create')->name('letterout_create');
Route::post('/letterout_create', 'Letter_OutController@store');
Route::get('/letterout_edit/{seq}', 'Letter_OutController@edit')->name('letterout_edit');
Route::get('/letterout_show/{seq}', 'Letter_OutController@show')->name('letterout_show');
Route::post('/letterout_remove', 'Letter_OutController@remove')->name('letterout_remove');

    //Udtm
Route::get('/udtm', 'Udtm_LovController@index')->name('udtm');
Route::get('/udtm_create', 'Udtm_LovController@create')->name('udtm_create');
Route::post('/udtm_create', 'Udtm_LovController@store');
Route::get('/udtm_edit/{seq}', 'Udtm_LovController@edit')->name('udtm_edit');
Route::patch('/udtm_update/{seq}', 'Udtm_LovController@update');
Route::post('/udtm_remove', 'Udtm_LovController@remove')->name('udtm_remove');

//staff
Route::get('/staffinfo', 'TblStaffController@index')->name('staffinfo');
Route::get('/staffcreate', 'TblStaffController@create')->name('staffcreate');
Route::post('/staffcreate', 'TblStaffController@store');
Route::get('/staffedit/{seq}', 'TblStaffController@edit')->name('staffedit');
Route::get('/staffshow/{seq}', 'TblStaffController@show')->name('staffshow');
Route::patch('/staffupdate/{seq}', 'TblStaffController@update');
Route::post('/staffremove', 'TblStaffController@remove')->name('staffremove');
Route::post('/remove_file', 'TblStaffController@staffremove_file')->name('remove_file');

    //ajax_function
Route::get('/selectedoption','AjaxController@selected_option');
Route::post('/updatepersonalinfo','AjaxController@update_personalinfo');
Route::post('/updatefamily','AjaxController@update_family');
Route::post('/updateaddress','AjaxController@update_address');
Route::post('/updatelanguage','AjaxController@update_language');
Route::post('/updategeneralknowledge','AjaxController@update_generalknowledge');
Route::post('/updateworkhistory','AjaxController@update_workhistory');
Route::post('/updatemedal','AjaxController@update_medal');
Route::post('/updatewarning','AjaxController@update_warning');

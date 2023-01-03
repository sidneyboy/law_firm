<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/category', 'HomeController@category')->name('category');
Route::post('/category_process', 'HomeController@category_process')->name('category_process');
Route::post('/category_edit_process', 'HomeController@category_edit_process')->name('category_edit_process');

Route::get('/nature_of_case', 'HomeController@nature_of_case')->name('nature_of_case');
Route::post('/nature_of_case_process', 'HomeController@nature_of_case_process')->name('nature_of_case_process');
Route::post('/nature_of_case_edit_process', 'HomeController@nature_of_case_edit_process')->name('nature_of_case_edit_process');

Route::get('/case', 'HomeController@case')->name('case');
Route::post('/cases_process', 'HomeController@cases_process')->name('cases_process');

Route::get('/list_of_cases', 'HomeController@list_of_cases')->name('list_of_cases');
Route::post('/case_client_name_update', 'HomeController@case_client_name_update')->name('case_client_name_update');
Route::post('/case_client_title_update', 'HomeController@case_client_title_update')->name('case_client_title_update');
Route::post('/case_category_update', 'HomeController@case_category_update')->name('case_category_update');
Route::post('/case_nature_of_case_update', 'HomeController@case_nature_of_case_update')->name('case_nature_of_case_update');
Route::post('/case_description_update', 'HomeController@case_description_update')->name('case_description_update');
Route::post('/case_remarks_update', 'HomeController@case_remarks_update')->name('case_remarks_update');
Route::post('/case_verdict_update', 'HomeController@case_verdict_update')->name('case_verdict_update');

Route::get('/case_details/{id}', 'HomeController@case_details')->name('case_details');
Route::post('/case_details_process', 'HomeController@case_details_process')->name('case_details_process');

Route::get('/show_image/{id}', 'HomeController@show_image')->name('show_image');
Route::get('/show_file/{id}', 'HomeController@show_file')->name('show_file');

Route::get('/search_client', 'HomeController@search_client')->name('search_client');






Route::get('/profile', 'ProfileController@index')->name('profile');
Route::put('/profile', 'ProfileController@update')->name('profile.update');

Route::get('/about', function () {
    return view('about');
})->name('about');

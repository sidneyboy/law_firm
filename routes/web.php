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


Route::get('/profile', 'ProfileController@index')->name('profile');
Route::put('/profile', 'ProfileController@update')->name('profile.update');

Route::get('/about', function () {
    return view('about');
})->name('about');

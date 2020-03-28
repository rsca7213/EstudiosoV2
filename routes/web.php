<?php

use Illuminate\Support\Facades\Route;
use Symfony\Component\Console\Input\Input;

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

//Courses: Add
Route::get('/courses/add', 'CoursesController@create')->name('addCourse');
Route::post('/courses/add/store', 'CoursesController@store');

//Courses: View, Delete
Route::get('/courses/view', 'CoursesController@index')->name('viewCourses');
Route::delete('/courses/view/delete', 'CoursesController@delete');

//Evaluations: View
Route::get('/evaluations/modify/{c_id}', 'EvaluationsController@index');
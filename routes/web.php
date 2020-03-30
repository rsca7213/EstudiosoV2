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

//User: Read/Update/Delete
Route::get('/profile', 'ProfilesController@index')->name('editProfile');
Route::patch('/profile/update', 'ProfilesController@update');
Route::post('/profile/delete', 'ProfilesController@delete');

//Courses: Add
Route::get('/courses/add', 'CoursesController@create')->name('addCourse');
Route::post('/courses/add/store', 'CoursesController@store');

//Courses: View, Delete
Route::get('/courses/view', 'CoursesController@index')->name('viewCourses');
Route::delete('/courses/view/delete', 'CoursesController@delete');

//Evaluations: View/Create/Edit/Delete
Route::get('/evaluations/modify/{c_id}', 'EvaluationsController@index')->name('viewEvaluations');
Route::post('/evaluations/modify/{c_id}/store', 'EvaluationsController@store');
Route::patch('/evaluations/modify/{c_id}/update/{ev_id}', 'EvaluationsController@update');
Route::delete('/evaluations/modify/{c_id}/delete/{ev_id}', 'EvaluationsController@delete');

//Grades: View/Create/Edit/Delete
Route::get('/grades/{c_id}', 'GradesController@index')->name('viewGrades');
Route::post('/grades/{c_id}/store/{ev_id}', 'GradesController@store');
Route::patch('/grades/{c_id}/update/{ev_id}', 'GradesController@update');
Route::delete('/grades/{C_id}/delete/{ev_id}', 'GradesController@delete');
Route::get('/grades/{c_id}/info', 'GradesController@info');
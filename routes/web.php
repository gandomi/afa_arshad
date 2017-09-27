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
    return redirect('login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/students', 'HomeController@students')->name('students');
Route::get('/print/afamodarres', 'HomeController@print_afamodarres')->name('print.afamodarres');
Route::get('/print/others', 'HomeController@print_afamodarres')->name('print.others');
Route::post('/new/student', 'HomeController@new_student')->name('new.student');

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
    return view('home');
});

Route::post('/search','App\Http\Controllers\SearchController@search')->name('search');

Route::post('/exam_start','App\Http\Controllers\ExamController@start')->name('exam_start');

Route::post('/option_selected','App\Http\Controllers\OptionController@selected')->name('option_selected');

Route::post('/exam_finish','App\Http\Controllers\ExamController@finish')->name('exam_finish');

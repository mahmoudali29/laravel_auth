<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\SpeakerController;



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

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/','App\Http\Controllers\HomeController@index')->name('Home');
Route::get('/index','App\Http\Controllers\HomeController@index');
Route::get('/about-us','App\Http\Controllers\HomeController@AboutUs')->name('aboutus');
Route::get('/contact-us','App\Http\Controllers\HomeController@ContactUs')->name('contactus');
Route::post('/frontendregister','App\Http\Controllers\HomeController@Register');

Route::get('/admin','App\Http\Controllers\AdminController@Dashboard');
Route::get('/admin/dashboard','App\Http\Controllers\AdminController@Dashboard');
//================== Course Moduel ==========================//
Route::resource('admin/courses', CourseController::class)->middleware('auth');
Route::resource('admin/sliders', SliderController::class)->middleware('auth');

Route::resource('admin/events', EventController::class)->middleware('auth');

Route::resource('admin/speakers', SpeakerController::class)->middleware('auth');



Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

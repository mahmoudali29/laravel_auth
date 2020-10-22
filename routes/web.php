<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\SpeakerController;
use App\Http\Controllers\EventSpeakerController;




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

Route::get('/events','App\Http\Controllers\HomeController@Events')->name('events');
Route::get('/event_details/{event_id}','App\Http\Controllers\HomeController@EventDetails')->name('event_details');




Route::post('/frontendregister','App\Http\Controllers\HomeController@Register');

Route::get('/admin','App\Http\Controllers\AdminController@Dashboard');
Route::get('/admin/dashboard','App\Http\Controllers\AdminController@Dashboard');
//================== Course Moduel ==========================//
Route::resource('admin/courses', CourseController::class)->middleware('auth');
Route::resource('admin/sliders', SliderController::class)->middleware('auth');

Route::resource('admin/events', EventController::class)->middleware('auth');

Route::get('/admin/eventspeakers/{event_id}','App\Http\Controllers\EventController@EventSpeakers')->middleware('auth');

Route::post('/admin/eventspeakers','App\Http\Controllers\EventController@StoreEventSpeakers')->middleware('auth');

Route::delete('/admin/eventspeakers/{speaker_id}/{event_id}','App\Http\Controllers\EventController@DestroyEventSpeakers')->middleware('auth');

Route::get('/admin/eventphotos/{event_id}','App\Http\Controllers\EventController@EventPhotos')->middleware('auth');

Route::post('/admin/eventphotos/{event_id}','App\Http\Controllers\EventController@StoreEventPhotos')->middleware('auth');

Route::delete('/admin/eventphotos/{photo_id}','App\Http\Controllers\EventController@DestroyEventPhotos')->middleware('auth');

 

Route::resource('admin/speakers', SpeakerController::class)->middleware('auth');


Route::get('/admin/speakerevents/{speaker_id}','App\Http\Controllers\SpeakerController@SpeakerEvents')->middleware('auth');;

Route::post('/admin/speakerevents','App\Http\Controllers\SpeakerController@StoreSpeakerEvents')->middleware('auth');

Route::delete('/admin/speakerevents/{speaker_id}/{event_id}','App\Http\Controllers\SpeakerController@DestroySpeakerEvents')->middleware('auth');



// Route::resource('admin/eventspeakers', EventSpeakerController::class)->middleware('auth');



Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

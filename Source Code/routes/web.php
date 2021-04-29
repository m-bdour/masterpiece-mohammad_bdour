<?php

use Illuminate\Support\Facades\Auth;
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

// public
Route::group([], function () {

    //View
    Route::get('/', 'viewController@index');
    Route::get('/home', 'viewController@index')->name('home');
    Route::get('/jobs', 'viewController@jobs')->name('jobs');
    Route::get('/jobs/{id}', 'viewController@job')->name('job');
    Route::get('/Companies', 'viewController@Companies')->name('Companies');

    Route::post('/report', 'ReportController@store')->name('report');
    Route::post('/contact', 'ContactController@store')->name('contact');

    Route::get('/contact', function () {
        return view('public.contact');
    });

    Route::fallback(function () {
        return view("public.404");
    });

    Auth::routes();
});

// user
Route::group([], function () {

    //View
    Route::get('/profile', 'viewController@myProfile')->name('profile');
    Route::get('/trainees', 'viewController@trainees')->name('trainees');
    Route::get('/profile/{id}', 'viewController@profile')->name('profile');
    Route::get('/applications', 'viewController@CompanyApplications')->name('CompanyApplications');

    //Applications
    Route::post('/apply', 'ApplicationController@store')->name('apply');
    Route::get('/application/delete/{id}', 'ApplicationController@destroy');
    Route::PATCH('/application/{id}/update', 'ApplicationController@update');

    //Jobs
    Route::post('/position', 'PositionController@store');
    Route::PATCH('/position/{id}/update', 'PositionController@update');
    Route::get('/position/delete/{id}', 'PositionController@destroy');

    //Update profile
    Route::PATCH('/user/{id}/update', 'UserController@update');

    //Download
    Route::get('/download', 'DownloadController@cv')->name('download');
});

// admin
Route::prefix('/admin')->group(function () {

    //dashboard
    Route::get('/dashboard', 'viewController@AdminDashboard');

    //Majors
    Route::get('/major/delete/{id}', 'MajorController@destroy');
    Route::PATCH('/major/{id}/update', 'MajorController@update');
    Route::get('/majors', 'viewController@majors');
    Route::resource('/major', 'MajorController');

    //Users
    Route::get('/users', 'viewController@users');
    Route::PATCH('/user/{id}/update', 'UserController@update');
    Route::post('/user/delete', 'UserController@destroy');
    Route::resource('/user', 'UserController');

    //Positions
    Route::get('/position/delete/{id}', 'PositionController@destroy');
    Route::PATCH('/position/{id}/update', 'PositionController@update');
    Route::get('/positions', 'viewController@positions');
    Route::resource('/position', 'PositionController');


    //Testimonials
    Route::get('/Testimonial/delete/{id}', 'TestimonialsController@destroy');
    Route::PATCH('/Testimonial/{id}/update', 'TestimonialsController@update');
    Route::get('/Testimonials', 'viewController@testimonials');
    Route::resource('/Testimonial', 'TestimonialsController');

    //Applications
    Route::get('/application/delete/{id}', 'ApplicationController@destroy');
    Route::PATCH('/application/{id}/update', 'ApplicationController@update');
    Route::get('/applications', 'viewController@applications');
    Route::resource('/application', 'ApplicationController');

    //Reports
    Route::get('/reports', 'ReportController@index');
    Route::get('/reports/delete/{id}', 'ReportController@destroy');

    //Contacts
    Route::get('/contacts', 'ContactController@index');
    Route::get('/contacts/delete/{id}', 'ContactController@destroy');
});

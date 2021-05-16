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
    Route::get('/majors', 'viewController@PublicMajors')->name('majors');
    Route::get('/articles', 'viewController@publicArticles')->name('articles');
    Route::get('/compare_majors', 'viewController@compare_majors')->name('compare_majors');
    Route::get('/compare_majors/{id}', 'viewController@compare_major')->name('compare_major');
    Route::get('/articles/{id}', 'viewController@Article')->name('articles');
    Route::get('/majors/{id}', 'viewController@PublicMajor')->name('major');
    Route::get('/success_story/{id}', 'viewController@success_story')->name('sstory');
    Route::get('/article/{id}', 'viewController@publicArticle')->name('article');
    Route::get('/Companies', 'viewController@Companies')->name('Companies');

    Route::post('/report', 'ReportController@store')->name('report');
    Route::post('/contact', 'ContactController@store')->name('contact');
    Route::get('/contact', 'ContactController@index2');



    Route::fallback(function () {
        return view("public.404");
    });

    Auth::routes();
});

// user
Route::group([], function () {

    //View
    Route::get('/profile', 'viewController@myProfile')->name('profile');
    Route::get('/profile/{id}', 'viewController@profile')->name('profile');
    Route::get('/applications', 'viewController@CompanyApplications')->name('CompanyApplications');

    //Update profile
    Route::PATCH('/user/{id}/update', 'UserController@update');
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
    Route::post('/user/delete/{id}', 'UserController@destroy');
    Route::resource('/user', 'UserController');

    //manage
    Route::PATCH('/manage/{id}/update', 'manageController@update');
    Route::get('/manage/{id}/edit', 'manageController@edit');

    //articles
    Route::get('/articles', 'viewController@articles');
    Route::PATCH('/article/{id}/update', 'articleController@update');
    Route::get('/article/delete/{id}', 'articleController@destroy');
    Route::resource('/article', 'articleController');

    //uni_lives
    Route::get('/uni_lives', 'viewController@uni_lives');
    Route::PATCH('/uni_live/{id}/update', 'uni_liveController@update');
    Route::get('/uni_live/delete/{id}', 'uni_liveController@destroy');
    Route::resource('/uni_live', 'uni_liveController');

    //sstories
    Route::get('/success_stories', 'viewController@sstories');
    Route::PATCH('/success_story/{id}/update', 'sstoryController@update');
    Route::get('/success_story/delete/{id}', 'sstoryController@destroy');
    Route::resource('/success_story', 'sstoryController');

    //vs_majors
    Route::get('/majors_vs_majors', 'viewController@vs_majors');
    Route::PATCH('/major_vs_major/{id}/update', 'vs_majorController@update');
    Route::get('/major_vs_major/delete/{id}', 'vs_majorController@destroy');
    Route::resource('/major_vs_major', 'vs_majorController');

    //colleges
    Route::get('/colleges', 'viewController@colleges');
    Route::PATCH('/college/{id}/update', 'collegeController@update');
    Route::get('/college/delete/{id}', 'collegeController@destroy');
    Route::resource('/college', 'collegeController');

    //Testimonials
    Route::get('/Testimonial/delete/{id}', 'TestimonialsController@destroy');
    Route::PATCH('/Testimonial/{id}/update', 'TestimonialsController@update');
    Route::get('/Testimonials', 'viewController@testimonials');
    Route::resource('/Testimonial', 'TestimonialsController');

    //Reports
    Route::get('/reports', 'ReportController@index');
    Route::get('/reports/delete/{id}', 'ReportController@destroy');

    //Contacts
    Route::get('/contacts', 'ContactController@index');
    Route::get('/contacts/delete/{id}', 'ContactController@destroy');
});

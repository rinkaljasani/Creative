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

// Authentication route
Auth::routes();


// Home controller
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/about', 'HomeController@about')->name('about');
Route::get('/freelancer', 'HomeController@freelancer')->name('freelancer');
Route::get('/services', 'HomeController@services')->name('services');
Route::get('/contact', 'HomeController@contact')->name('contact');
Route::get('/skillexpert/{id}','HomeController@skillExpert');



// Skill controller
Route::resource('skill', 'SkillsController');


//hire freelancer controller
Route::resource('hire', 'HireController');


//join as freelancer controller
Route::resource('freelancer_job', 'FreelancerjobsController');


//Project allocation for create compitition controller
Route::resource('competition', 'CompetitionController');
Route::get('/competitionDetail/{id}','CompetitionController@competitionDetail');


//participate in competition
Route::get('/participate/{id}','CompetitionController@participate');


// user and freelancer profile edit 

Route::get('/freelancer_profile/{id}','ProfileController@index');
Route::get('/freelancer_profile_edit/{id}','ProfileController@edit')->name('profile.edit');
Route::put('/freelancer_profile_update','ProfileController@update')->name('profile.update');







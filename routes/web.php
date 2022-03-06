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


Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->middleware('verified');

Route::resource('proftfolioCategories', 'ProftfolioCategoryController');
Route::resource('testimonials', 'TestimonialController');
Route::resource('teamTypes', 'TeamTypeController');
Route::resource('teamMembers', 'TeamMemberController');
Route::resource('sliders', 'SliderController');

//  contact page 
Route::get('/contact-page', 'Webcontroller@createContactForm')->name('contact_page');
Route::post('/update-contact-page', 'Webcontroller@storeContactForm')->name('update_contact_info');

//  homestyles  
Route::get('/home-styles', "Webcontroller@showHomeStyle")->name('home_style_page');
Route::post('/home-styles/{id}', "Webcontroller@updateHomeStyle")->name('update_home_style');

//   app setting
Route::get('Settings', "Webcontroller@showSettingPage")->name('setting_page');
Route::post('update-Settings', "Webcontroller@updateSettingPage")->name('update_setting_page');

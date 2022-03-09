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

Route::get('/', 'SiteController@index');
Route::get('/About', 'SiteController@about');
Route::get('/protfolio-detail/{id}', 'SiteController@protfolioShow');
Route::get('/Protfolio', 'SiteController@protfolio'); 
// Route::get('/Prot/{id}', 'SiteController@protfolioShow');
Route::get('/ContactUs', 'SiteController@contactUs'); 
Route::get('/Service', 'SiteController@service'); 


Auth::routes(['verify' => true]);

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function() {
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


    Route::get('about-us', "Webcontroller@aboutUs")->name('about_page');
    Route::post('update-about-us', "Webcontroller@aboutUsUpdate")->name('update_about_page');
    
    Route::resource('protfolioItems', 'ProtfolioItemController');
    Route::group(['prefix' => 'protfolio', 'as' => 'protfolio.'], function() {
        Route::post('save-bg-info', "ProtfolioController@updateBackgroundInfo")->name('Savepbginfo');
        Route::group(['prefix' => 'images', 'as' => 'images.'], function() {
            Route::get('{id}', 'ProtfolioController@getProtfolioImages')->name('create');
            Route::post('saveImgage', "ProtfolioController@saveImages")->name('store');
            Route::delete('deleteImg/{id}', "ProtfolioController@deleteImages")->name('delete');
        });
        Route::group(['prefix' => '{protfolio_id}'], function() {
            Route::resource('protfolioFaqs', 'ProtfolioFaqController');
        });
    });

    Route::group(['prefix'=> 'service', 'as'=> 'service.'], function() {
        Route::get('/', 'ServiceController@index')->name('index');
        Route::post('/update-background', "ServiceController@updateServiceBackground")->name('update.background');

        Route::post('/store-what-we-do', "ServiceController@storeWhatWeDo")->name('store.what-we-do');
        Route::get('/service-list/{id}/edit', "ServiceController@editServiceList")->name('edit.service-list');
        Route::patch('/update-what-we-do/{id}', "ServiceController@updateWhatWeDo")->name('update.what-we-do');
        Route::get('/delete-what-we-do/{id}', "ServiceController@destroyWhatWeDo")->name('delete.what-we-do');

        Route::post('/store-service-list', "ServiceController@storeServiceList")->name('store.service-list');
        Route::get('delete-service-list/{id}', "ServiceController@destroyServiceList")->name('delete.service-list');

        Route::post('/store-client', "ServiceController@storeClientInfo")->name('store.client');
        Route::get('edit-client/{id}', "ServiceController@editClientInfo")->name('edit.client');
        Route::patch('update-client/{id}', "ServiceController@updateClientInfo")->name('update.client');
        Route::get('action-publish/{id}/{status}', "ServiceController@updateClientStatus");
        Route::get('delete-client/{id}', "ServiceController@destroyClientInfo")->name('delete.client');
    });
    
});








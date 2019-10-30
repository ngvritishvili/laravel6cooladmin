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

use App\Attribute;
use App\Content;


Route::get('/', function () {
    $attributes = Attribute::first();
    $locale = app()->getLocale();
    return redirect('home/en')->with($locale,$attributes);
});
Route::get('/home', function (){
    $attributes = Attribute::first();
    $locale = app()->getLocale();
    return redirect('home/en')->with($locale,$attributes);
});
Route::get('/admin', function () {
    $attributes = Attribute::first();
    $locale = app()->getLocale();
    return redirect('admin/en')->with($locale,$attributes);
});


Auth::routes();


Route::get('/home/{locale}', 'HomeController@index')->name('home');
Route::get('/catalog/{locale}', 'HomeController@catalog')->name('catalog');
Route::get('/about/{locale}', 'HomeController@about')->name('about');
Route::get('/contact/{locale}', 'HomeController@contact')->name('contact');


Route::get('createTranslate', 'HomeController@createTranslate')->name('createTranslate');


Route::post('destroyAll', 'adminControllers\ContactController@destroyAll')->name('destroyAll');




Route::middleware('auth')->prefix('admin/{locale}')->group(function () {


    Route::get('/', 'adminControllers\AdminController@index')->name('dashboard');

    Route::resource('category', 'adminControllers\CategoryController');
    Route::resource('sub-category', 'adminControllers\SubCategoryController');
    Route::resource('product', 'adminControllers\ProductController');
    Route::resource('attribute', 'adminControllers\AttributeController');
    Route::resource('contact','adminControllers\ContactController');
    Route::resource('image','adminControllers\ImageController');
    Route::resource('about','adminControllers\AboutController');
    Route::resource('info', 'adminControllers\InfoController');
    Route::resource('slide', 'adminControllers\SlideController');
    Route::resource('partner', 'adminControllers\PartnerController');

});


Route::get('/content/{locale}', 'HomeController@content')->name('content');
Route::post('/search/{locale}', 'HomeController@search')->name('search');

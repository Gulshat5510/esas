<?php

use Illuminate\Support\Facades\Route;

Route::prefix('sample')->group(function () {
    Route::get('home', function () {
        return view('sample.home');
    });

    Route::get('projects', function () {
        return view('sample.projects');
    });

    Route::get('projects/show', function () {
        return view('sample.project-show');
    });

    Route::get('about', function () {
        return view('sample.about');
    });

    Route::get('contact', function () {
        return view('sample.contact');
    });
});

Route::namespace('Web')
    ->prefix(LaravelLocalization::setLocale())
    ->middleware(['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'])
    ->group(function () {
        Route::get('/', 'WebController@index')->name('index');

        Route::get('projects', 'ProjectController@index')->name('projects');
        Route::get('projects/{project}/show', 'ProjectController@show')->name('projects.show');

        Route::get('about', 'WebController@about')->name('about');

        Route::get('contact', 'ContactController@index')->name('contact.index');
        Route::post('contact', 'ContactController@store')->name('contact.store');
    });


// login
Route::prefix('panel')->group(function () {
    Route::get('login', 'Auth\LoginController@showLoginForm');
    Route::post('login', 'Auth\LoginController@login')->name('login');
    Route::post('logout', 'Auth\LoginController@logout')->name('logout');
});

// panel
Route::namespace('Panel')->prefix('panel')->name('panel.')->middleware('auth')->group(function () {
    Route::get('/', 'PanelController@index')->name('index');

    // user password & profile edit
    Route::get('profile', 'PanelController@profileEdit')->name('profile.edit');
    Route::patch('profile/{user}', 'PanelController@profileUpdate')->name('profile.update');
    Route::get('profile/password', 'PanelController@passwordEdit')->name('password.edit');
    Route::patch('password/{user}', 'PanelController@passwordUpdate')->name('password.update');

    // categories
    Route::resource('categories', 'CategoryController')->except('show');

    // projects & project images
    Route::resource('projects', 'ProjectController');
    Route::get('projects/{project}/images', 'ImageController@create')->name('projects.images.create');
    Route::post('projects/{project}/images', 'ImageController@store')->name('projects.images.store');
    Route::get('projects/{project}/order', 'ImageController@order')->name('projects.images.order');
    Route::patch('images/order', 'ImageController@orderUpdate')->name('images.order');
    Route::delete('images/{image}', 'ImageController@destroy')->name('images.destroy');
    Route::patch('images/{image}/type', 'ImageController@type')->name('images.type');

    // contacts
    Route::get('contacts', 'ContactController@index')->name('contact.index');
    Route::get('contacts/{contact}/show', 'ContactController@show')->name('contact.show');
    Route::delete('contacts/{contact}', 'ContactController@destroy')->name('contact.destroy');

    // about
    Route::resource('about', 'AboutController')->except('show');
});
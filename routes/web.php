<?php

Route::get('/', function () {
    return view('index');
});


Route::post('registration', 'Api@registrationPost')->name('registration');
Route::get('user-details', 'Api@userDetailsGet')->name('user_details');
Route::post('create', 'Api@createPost')->name('create');
Route::post('update', 'Api@updatePost')->name('update');
Route::get('list', 'Api@listGet')->name('list');
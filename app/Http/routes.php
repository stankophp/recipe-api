<?php

//Route::get('/', function () {
//    return redirect('/blog');
//});
//
//Route::get('blog', 'BlogController@index');
//Route::get('blog/{slug}', 'BlogController@showPost');
//
//// API ROUTES ==================================
//Route::group(array('prefix' => 'api'), function() {
//
//    // since we will be using this just for CRUD, we won't need create and edit
//    // Angular will handle both of those forms
//    // this ensures that a user can't access api/create or api/edit when there's nothing there
//    Route::resource('comments', 'CommentsController',
//        array('only' => array('index', 'store', 'destroy')));
//
//});
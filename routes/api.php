<?php

use Illuminate\Http\Request;

Route::get('getstudents', 'StudentsController@getStudents'); 
Route::post('addstudents', 'StudentsController@addStudents'); 
Route::patch('updatestudents', 'StudentsController@updateStudents'); 
Route::post('registerStudents', 'StudentsController@registerStudents'); 
Route::post('signInSudents', 'StudentsController@signInStudents');
Route::post('registerValidate', 'StudentsController@registerValidate');
Route::post('loginValidate', 'StudentsController@loginValidate'); 
Route::post('logout', 'StudentsController@logout');
Route::get('getProducts', 'ProductsController@getProducts'); 
Route::post('addProducts', 'ProductsController@addProducts'); 
Route::post('deleteProducts', 'ProductsController@deleteProducts');
Route::post('passwordrecovery','StudentsController@passwordrecovery');
Route::get('getTravelling', 'TravellingController@getTravelling');
Route::post('addBook', 'TravellingController@addBook');
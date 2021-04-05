<?php

use Illuminate\Http\Request;

Route::get('getstudents', 'StudentsController@getStudents'); 
Route::post('addstudents', 'StudentsController@addStudents'); 
Route::patch('updatestudents', 'StudentsController@updateStudents'); 
Route::post('registerStudents', 'StudentsController@registerStudents'); 
Route::post('signInSudents', 'StudentsController@signInStudents'); 



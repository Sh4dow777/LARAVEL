<?php

use Illuminate\Http\Request;

Route::get('getstudents', 'StudentsController@getStudents'); 
Route::post('addstudents', 'StudentsController@addStudents'); 
Route::patch('updatestudents', 'StudentsController@updateStudents'); 

//Route::middleware('auth:api')->get('/students', function (Request $request) {
    //return $request->students();
//});

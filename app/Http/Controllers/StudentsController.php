<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;

class StudentsController extends Controller
{
    public function getStudents()
    {
    	$student=Students::get();
    	return response()->json($student);
    }
    public function addStudents(Request $req)
    {
    	$student = new  Student();

    	$student->name=$req->name;
    	$student->surname=$req->surname;
    	$student->patronymic=$req->patronymic;
    	$student->age=$req->age;

    	$s=$student->save();

    	if($s)
    		return "Nothing is true, everything is permitted";
    	   return"Si vis pacem, para bellum";
    } 
    public function updateStudents(Request $req)
    {
    	$student=student::where("id", $req->id)->first();
    	
    	$student->name = $req->name;
    	$student->surname = $req->surname;
    	$student->patronymic = $req->patronymic;
    	$student->age = $req->age;

    	$student->save();

    	return response()->json($student);
    }


}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;

class StudentsController extends Controller
{
    public function getStudents()
    {
    	$student=student::get();
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

    public function registerStudents(Request $req)
    {
    	$label = false;
    	$res ="";
    	if($req->name == null)
    	{
    		$label = true;
    		$res .='Не заполнено поле name';
    	}
    	if($req->surname == null)
    	{
    		$label = true;
    		$res .='Не заполнено поле surname';
    	}
    	if($req->patronymic == null)
    	{
    		$label = true;
    		$res .='Не заполнено поле patronymic';
    	}
    	if($req->age == null)
    	{
    		$label = true;
    		$res .='Не заполнено поле age';
    	}
    	if($req->date_of_birth == null)
    	{
    		$label = true;
    		$res .='Не заполнено поле date_of_birth';
    	}
    	if($req->phone_number == null)
    	{
    		$label = true;
    		$res .='Не заполнено поле phone_number';
    	}
    	if($req->password == null)
    	{
    		$label = true;
    		$res .='Не заполнено поле password';
    	}
    	if($label ==false)
    	{
    		$student = new Student();
    		$student -> create($req->all());
    		$res = 'Пользователь успешно зарегестрирован';
    	}

    		return response()->json($res);
    }

    	public function signInStudents(Request $req)
    	{
    		$student= Student::where('phone_number', $req->phone_number)->first();
    		
    		if($student)
    		{
    			if($req->password == $student->password)
    			{
    				return response()->json('Пользователь успешно авторизован');
    			}
    			else
    			{
    				return response()->json('Введен неверный пароль');
    			}
    		}
    		else
    		{
    				return response()->json('Введен неверный логин');
    		}
    	}
    }


	

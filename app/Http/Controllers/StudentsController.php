<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
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

    		if(!$student)
    			return response()->json('Введен неверный логин');
    		
 			if($req->password != $student->password)
				return response()->json('Введен неверный пароль');
			
			return response()->json('Пользователь успешно авторизован');
    	}

    	public function registerValidate(Request $req)
	{
		$validator = Validator::make($req->all(), [
		'name' => 'required',
		'surname' => 'required',
		'patronymic' => 'required',
		'age' => 'required',
		'date_of_birth' => 'required',
		'phone_number' => 'required',
		'password' => 'required',
		]);

		if ($validator->fails())
			return response()->json($validator->errors());

		$user = Student::create($req->all());
		return response()->json('Регистрация прошла успешно');
	}
		public function loginValidate(Request $req) 
    {
        $validator = Validator::make($req->all(), [
            'phone_number' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

    	if($student = Student::where('phone_number', $req->phone_number)->first())
    	{
    		if ($req->password == $student->password)
    		{
    			$student->api_token=str_random(50);
    			$student->save();
    			return response()->json('Авторизацияпрошла успешно, api_token:'. $student->api_token);
    		}
    	}
    			return response()->json('Логин или пароль введены неверно, api_token:'. $student->api_token);
    		}

		public function logout(Request $req)
    	{
        	$student = Student::where("api_token",$req->api_token)->first();

        	if($student)
	        {
	            $student->api_token = null;
	            $student->save();
	            return response()->json('Разлогирование прошло успешно');
	        }
    	}
    		
}
				

	

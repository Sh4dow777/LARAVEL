<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str; 
use App\Travelling;
use App\Student;
use App\Tickets;


class TravellingController extends Controller
{
  public function getTravelling()
  {
	return response()->json(Travelling::get()); 
  } 
 
	public function addBook(Request $req) 
	{ 
		$student = Student::where("api_token", $req->header("api_token"))->first();
 	if(!$student) return resрonse()->json("Пользователь не авторизован");
  		$validator = Validator::make($req->all(),
		[ 'from_id' => 'required',
  	  	'from_data' => 'required|date',
  	  	'back_id' => 'nullable',
  	  	'back_data' => 'nullable|date', ]);
   	if ($validator->fails()) return response()->json($validator->errors());
    	$code = Str::random(5);
    	$booking = 
    	[ "user_id" => $student->id,
    	 "code" => $code,
    	 'from_id' => $req->from_id,
    	 'from_data' => $req->from_data,
    	 'back_id' => $req->back_id,
    	 'back_data' => $req->back_data,];
     	Travelling::create($booking); return response()->json("Код бронирования: ".$code);
    }
}
 



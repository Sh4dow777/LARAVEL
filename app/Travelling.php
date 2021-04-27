<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Travelling extends Model
{
	public $table="booking";
    public $timestamps=false;
    protected $fillable=
    [
    	'from_id', 'from_data', 'back_id', 'back_data', 'code', 'user_id'
    ];
}

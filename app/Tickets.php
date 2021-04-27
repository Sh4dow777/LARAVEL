<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tickets extends Model
{
	public $table="tickets";
    public $timestamps=false;
    protected $fillable=
    [
    	'from', 'to', 'price'
    ];
}

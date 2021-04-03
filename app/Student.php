<?php

namespace App;

use Illuminate\Database\Eloquent\Model; 


class Student extends Model
{
    public $timestamps=false;
    protected $fillable=
    [
    	'name', 'surname', 'patronymic', 'age'
    ];
}

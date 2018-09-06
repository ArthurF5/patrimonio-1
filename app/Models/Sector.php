<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    protected $fillable =[
    	'name',
    	'description',
    ];

    public function getNameAttribute($value) 
    {
    	return mb_strtoupper($value);
    }
}

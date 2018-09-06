<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Responsible extends Model
{
    protected $fillable = [
    	'name',
    	'siape',
    	'role_id',
    ];

    public function role()
    {
    	return $this->belongsTo('App\Role');
    }
}

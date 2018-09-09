<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Responsavel extends Model
{
	protected $table = 'responsaveis';

    protected $fillable = [
    	'nome',
    	'siape',
    	'cargo_id',
    ];

    public function cargo()
    {
    	return $this->belongsTo('App\Models\Cargo', 'cargo_id');
    }
}

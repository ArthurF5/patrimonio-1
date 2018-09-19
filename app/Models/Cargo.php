<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
	protected $table = 'cargos';

    protected $fillable =[
    	'nome',
    	'descricao',
    ];

    public function responsaveis()
    {
        return $this->hasMany('App\Models\Responsavel');
    }

    public function setNomeAttribute($value) 
    {
        $this->attributes['nome'] = mb_strtoupper($value);
    }

    public static function getOrderedCargos() {
    	return self::orderBy('nome', 'asc')->get();
    }
}

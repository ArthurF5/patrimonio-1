<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setor extends Model
{
	protected $table = 'setores';

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
}

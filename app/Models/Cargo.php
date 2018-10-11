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

    /**
     * Setando o atributo nome para uppercase
     * @param string $value
     * @return null
     */
    public function setNomeAttribute($value) 
    {
        $this->attributes['nome'] = mb_strtoupper($value);
    }
}

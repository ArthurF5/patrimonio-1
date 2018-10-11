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

    /**
     * Optém todos os materiais ligados ao setor
     * @return App\Models\Material
     */
    public function materiais()
    {
        return $this->hasMany('App\Models\Material');
    }


    /**
     * Obtém todos os servidores ligados aquele setor
     * @return App\Models\Responsavel
     */
    public function servidores()
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

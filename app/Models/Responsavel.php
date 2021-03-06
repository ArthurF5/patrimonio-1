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
        'setor_id',
    ];

    //


    public function cargo()
    {
        return $this->belongsTo('App\Models\Cargo', 'cargo_id');
    }

    public function setor()
    {
        return $this->belongsTo('App\Models\Setor', 'setor_id');
    }

    public function materiais()
    {
        return $this->hasMany('App\Models\Material');
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

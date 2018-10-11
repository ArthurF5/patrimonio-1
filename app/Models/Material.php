<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
	protected $table = 'materiais';

    protected $fillable = [
        'nome',
        'tombamento',
        'descricao',
        'responsavel_id',
        'setor_id',
    ];

    /**
     * Obtém o responsável pelo material
     * @return App\Models\Responsavel
     */
    public function responsavel()
    {
        return $this->belongsTo('App\Models\Responsavel', 'responsavel_id');
    }

    /**
     * Obtém o setor que o material pertence
     * @return App\Models\Setor
     */
    public function setor()
    {
        return $this->belongsTo('App\Models\Setor', 'setor_id');
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

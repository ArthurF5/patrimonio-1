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

    public function setor()
    {
        return $this->belongsTo('App\Models\Setor', 'setor_id');
    }

    public function responsavel()
    {
        return $this->belongsTo('App\Models\Responsavel', 'responsavel_id');
    }


}

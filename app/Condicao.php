<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Condicao extends Model
{
    protected $table = "condicaos";

    protected $fillable = [
        'id_instituicao',
        'id_ano_lectivo',
        'ano_inicio',
        'ano_fim',
        'estado',
    ];

    public function instituicao()
    {
        return $this->belongsTo(Instituicao::class, 'id_instituicao', 'id');
    }

    public function ano_lectivo()
    {
        return $this->belongsTo(AnoLectivo::class, 'id_ano_lectivo', 'id');
    }
}
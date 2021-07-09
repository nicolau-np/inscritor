<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Estudante extends Model
{
    protected $table = "estudantes";

    protected $fillable = [
        'id_pessoa',
        'id_instituicao',
        'id_curso',
        'id_classe',
        'id_turno',
        'id_ano_lectivo',
    ];

    public function pessoa(){
        return $this->belongsTo(Pessoa::class, 'id_pessoa', 'id');
    }

    public function instituicao(){
        return $this->belongsTo(Instituicao::class, 'id_instituicao', 'id');
    }

    public function curso(){
        return $this->belongsTo(Curso::class, 'id_curso', 'id');
    }

    public function classe(){
        return $this->belongsTo(Classe::class, 'id_classe', 'id');
    }

    public function turno(){
        return $this->belongsTo(Turno::class, 'id_turno', 'id');
    }

    public function ano_lectivo(){
        return $this->belongsTo(AnoLectivo::class, 'id_ano_lectivo', 'id');
    }
}
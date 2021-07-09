<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnoLectivo extends Model
{
    protected $table = "ano_lectivos";

    protected $fillable = [
        'ano_lectivo',
        'estado',
    ];

    public function estudante(){
        return $this->hasMany(Estudante::class, 'id_ano_lectivo', 'id');
    }

    public function condicao(){
        return $this->hasMany(Condicao::class, 'id_ano_lectivo', 'id');
    }
}
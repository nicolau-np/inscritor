<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoInstituicao extends Model
{
    protected $table = "tipo_instituicaos";

    protected $fillable = [
        'tipo',
        'estado',
    ];

    public function instituicao(){
        return $this->hasMany(Instituicao::class, 'id_tipo_instituicao', 'id');
    }
}
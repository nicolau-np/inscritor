<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NivelInstituicao extends Model
{
    protected $table = "nivel_instituicaos";

    protected $fillable = [
        'nivel',
        'estado',
    ];

    public function instituicao(){
        return $this->hasMany(Instituicao::class, 'id_nivel_instituicao', 'id');
    }
}

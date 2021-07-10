<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instituicao extends Model
{
    protected $table = "instituicaos";

    protected $fillable = [
       'id_tipo_instituicao',
        'id_nivel_instituicao',
        'nome',
        'bairro',
        'estado',
    ];

    public function usuario(){
        return $this->hasMany(User::class, 'id_instituicao', 'id');
    }

    public function estudante(){
        return $this->hasMany(Estudante::class, 'id_instituicao', 'id');
    }

    public function nivel_instituicao(){
        return $this->belongsTo(NivelInstituicao::class, 'id_nivel_instituicao', 'id');
    }

    public function tipo_instituicao(){
        return $this->belongsTo(TipoInstituicao::class, 'id_tipo_instituicao', 'id');
    }

    public function condicao(){
        return $this->hasMany(Condicao::class, 'id_instituicao', 'id');
    }
}
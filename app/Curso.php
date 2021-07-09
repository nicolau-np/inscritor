<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $table = "cursos";

    protected $fillable = [
        'curso',
        'estado',
    ];

    public function estudante(){
        return $this->hasMany(Estudante::class, 'id_curso', 'id');
    }

}

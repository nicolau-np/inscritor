<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Turno extends Model
{
    protected $table = "turnos";

    protected $fillable = [
        'turno',
        'estado',
    ];

    public function estudante(){
        return $this->hasMany(Estudante::class, 'id_turno', 'id');
    }
}
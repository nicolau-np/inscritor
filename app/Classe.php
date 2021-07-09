<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    protected $table = "classes";

    protected $fillable = [
        'classe',
        'estado',
    ];

    public function estudante(){
        return $this->hasMany(Estudante::class, 'id_classe', 'id');
    }
}

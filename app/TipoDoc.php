<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoDoc extends Model
{
    protected $table = "tipo_docs";

    protected $fillable = [
        'tipo',
        'estado',
    ];

    public function documento(){
        return $this->hasMany(Doc::class, 'id_tipo_doc', 'id');
    }
}
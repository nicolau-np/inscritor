<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doc extends Model
{
    protected $table = "docs";

    protected $fillable = [
        'id_tipo_doc',
        'id_estudante',
        'estado',
    ];

    public function tipo_doc(){
        return $this->belongsTo(TipoDoc::class, 'id_tipo_doc', 'id');
    }
}
<?php

use Illuminate\Database\Seeder;

class TipoDocsSeeder extends Seeder
{

    static $tipo_docs = [
        [
            'tipo'=>"Certificado",
            'estado'=>"on",
        ],
        [
            'tipo'=>"Declaração",
            'estado'=>"on",
        ],
        [
            'tipo'=>"Lista",
            'estado'=>"on",
        ]
    ];

    public function run()
    {
        //
    }
}
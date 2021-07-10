<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
        foreach(Self::$tipo_docs as $tipo_doc){
            DB::table('tipo_docs')->insert(
                $tipo_doc
            );
        }
    }
}
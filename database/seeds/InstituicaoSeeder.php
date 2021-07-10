<?php

use Illuminate\Database\Seeder;

class InstituicaoSeeder extends Seeder
{
    static $instituicaos = [
        [

            'id_tipo_instituicao' =>1,
            'id_nivel_instituicao' =>1,
            'nome'=>"Master",
            'bairro'=>"master",
            'estado' =>"on",
        ],
        [

            'id_tipo_instituicao' =>2,
            'id_nivel_instituicao' =>2,
            'nome'=>"Liceu Welwitchia Mirabilis",
            'bairro'=>"Eucalíptos",
            'estado' =>"on",
        ]
    ];

    public function run()
    {

    }
}
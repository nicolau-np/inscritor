<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NivelInstituicaoSeeder extends Seeder
{
    static $nivel_instituicaos = [
        [
            'nivel'=>"Ensino Secundário do 2 º Cículo"
        ]
    ];

    public function run()
    {
        foreach(Self::$nivel_instituicaos as $nivel_instituicao){
            DB::table('nivel_instituicaos')->insert(
                $nivel_instituicao
            );
        }
    }
}
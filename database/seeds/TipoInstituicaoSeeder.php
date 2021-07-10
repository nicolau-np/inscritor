<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoInstituicaoSeeder extends Seeder
{
    static $tipo_instituicaos = [
        [
            'tipo'=>"Master",
            'estado'=>"on",
        ],
        [
            'tipo'=>"Puniv",
            'estado'=>"on",
        ],
    ];

    public function run()
    {
        foreach(Self::$tipo_instituicaos as $tipo_instituicao){
            DB::table('tipo_instituicaos')->insert(
                $tipo_instituicao
            );
        }
    }
}
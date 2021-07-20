<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PessoaSeeder extends Seeder
{
    static $pessoas = [
        [
            'nome' => "Nicolau Ngala Pungue",
            'bi' => "005581463NE046",
            'telefone' => 946216795,
            'genero' => "M",
            'data_nascimento' => "1996-08-29",
        ],[
            'nome' => "Arminda Dores",
            'bi' => "003441180HA051",
            'telefone' => 932590721,
            'genero' => "F",
            'data_nascimento' => "1998-12-12",
        ],[
            'nome' => "Major Baltazar",
            'bi' => "1034411771HA052",
            'telefone' => 922391721,
            'genero' => "M",
            'data_nascimento' => "1986-08-04",
        ],
    ];

    public function run()
    {
        foreach (Self::$pessoas as $pessoa) {
            DB::table('pessoas')->insert(
                $pessoa
            );
        }
    }
}
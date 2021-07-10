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
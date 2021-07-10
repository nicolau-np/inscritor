<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CursoSeeder extends Seeder
{
    static $cursos = [
        [
            'curso' => "Ciências Físicas e Biologica",
            'estado' => "on",
        ],
        [
            'curso' => "Educação Plástica",
            'estado' => "on",
        ],
    ];

    public function run()
    {
        foreach (Self::$cursos as $curso) {
            DB::table('cursos')->insert(
                $curso
            );
        }
    }
}
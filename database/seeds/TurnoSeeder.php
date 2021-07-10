<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TurnoSeeder extends Seeder
{
    static $turnos = [
        [
            'turno' => "Manha",
            'estado' => "on",
        ], [
            'turno' => "Tarde",
            'estado' => "on",
        ], [
            'turno' => "Noite",
            'estado' => "on",
        ],
    ];
    public function run()
    {
        foreach (Self::$turnos as $turno) {
            DB::table('turnos')->insert(
                $turno
            );
        }
    }
}
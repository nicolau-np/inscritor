<?php

use Illuminate\Database\Seeder;

class TurnoSeeder extends Seeder
{
    static $turnos = [
        [
            'turno' => "Manha",
            'estado' => "on",
        ],[
            'turno' => "Tarde",
            'estado' => "on",
        ],[
            'turno' => "Noite",
            'estado' => "on",
        ],
    ];
    public function run()
    {
        //
    }
}
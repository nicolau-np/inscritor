<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClasseSeeder extends Seeder
{
    static $classes = [
        [
            'classe'=>"10ª",
            'estado'=>"on",
        ],[
            'classe'=>"11ª",
            'estado'=>"on",
        ],[
            'classe'=>"12ª",
            'estado'=>"on",
        ],[
            'classe'=>"13ª",
            'estado'=>"on",
        ]
    ];

    public function run()
    {
        foreach(Self::$classes as $classe){
            DB::table('classes')->insert(
                $classe
            );
        }
    }
}
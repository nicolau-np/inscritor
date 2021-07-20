<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{

    public function run()
    {
        DB::table('usuarios')->insert(
            array(

                array(
                    'id_pessoa' => 1,
                    'id_instituicao' => 1,
                    'email' => "nic340@gmail.com",
                    'password' => Hash::make("olamundo2015"),
                    'nivel_acesso' => "master",
                    'estado' => "on",
                ),
                array(
                    'id_pessoa' => 2,
                    'id_instituicao' => 2,
                    'email' => "armindadores@gmail.com",
                    'password' => Hash::make("babaca"),
                    'nivel_acesso' => "admin",
                    'estado' => "on",
                ),
                array(
                    'id_pessoa' => 2,
                    'id_instituicao' => 2,
                    'email' => "major@gmail.com",
                    'password' => Hash::make("olaola1"),
                    'nivel_acesso' => "user",
                    'estado' => "on",
                ),

            )

        );
    }
}
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
                    'palavra_passe' => Hash::make("olamundo2015"),
                    'nivel_acesso' => "master",
                    'estado' => "on",
                ),
                array(
                    'id_pessoa' => 2,
                    'id_instituicao' => 2,
                    'email' => "armindadoresd@gmail.com",
                    'palavra_passe' => Hash::make("babaca"),
                    'nivel_acesso' => "admin",
                    'estado' => "on",
                ),

            )

        );
    }
}
<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            TipoInstituicaoSeeder::class,
            NivelInstituicaoSeeder::class,
            InstituicaoSeeder::class,
            PessoaSeeder::class,
            UsuarioSeeder::class,
            CursoSeeder::class,
            ClasseSeeder::class,
            TurnoSeeder::class,
            AnoLectivoSeeder::class,
            TipoDocsSeeder::class,
        ]);
    }
}
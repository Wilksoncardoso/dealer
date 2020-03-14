<?php

use App\nivel_acesso;
use Illuminate\Database\Seeder;

class NivelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        nivel_acesso::create([
            'nivel_acesso'      => 'Administrador'

        ]);

        nivel_acesso::create([
            'nivel_acesso'      => 'Usuario'
        ]);
    }
}

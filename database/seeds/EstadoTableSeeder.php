<?php

use App\estado;
use Illuminate\Database\Seeder;

class EstadoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        estado::create([
            'tipo'      => 'Publicar'

        ]);

        estado::create([
            'tipo'      => 'Apenas Salvar'

        ]);
    }
}

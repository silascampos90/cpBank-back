<?php

use Illuminate\Database\Seeder;
use App\Models\Agencia;

class AgenciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!Agencia::count()) {
            Agencia::create([
                'codigo' => '0001',
                'endereco' => 'Alameda dos Anjos, n°35'
            ]);
        }
    }
}

<?php

use Illuminate\Database\Seeder;
use App\model\Agencia;

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
                'numero' => '0001',
                'endereco' => 'Alameda dos Anjos, n35'
            ]);
        }
    }
}

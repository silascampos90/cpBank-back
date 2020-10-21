<?php

use App\Models\Transacoes;
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
            AgenciaSeeder::class,
            TipoTransacaoSeeder::class,
            ContaSeeder::class,
            TransacoesSeeder::class

        ]);
    }
}

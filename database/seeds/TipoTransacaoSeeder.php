<?php

use Illuminate\Database\Seeder;
use App\Models\TipoTransacao;

class TipoTransacaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(!TipoTransacao::count()){

            TipoTransacao::create([
                'descricao' => 'Depósito'
            ]);

            TipoTransacao::create([
                'descricao' => 'Saque'
            ]);

            TipoTransacao::create([
                'descricao' => 'Transferência'
            ]);
        }
    }
}

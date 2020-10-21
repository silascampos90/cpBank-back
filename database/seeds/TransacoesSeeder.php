<?php

use Illuminate\Database\Seeder;
use App\Models\Transacoes;
use App\Models\TipoTransacao;
use App\Models\Conta;

class TransacoesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $id_transacao = TipoTransacao::where('descricao', 'Depósito')->first()->id;
            
        if(!Transacoes::count()){

            Transacoes::create([
                'valor' => 1000,
                'tipo_transacao_id' => $id_transacao,
                'conta_id' => Conta::where('numero','0234')->first()->id
            ]);

            Transacoes::create([
                'valor' => 1000,
                'tipo_transacao_id' => $id_transacao,
                'conta_id' => Conta::where('numero','0894')->first()->id
            ]);
        }
    }
}

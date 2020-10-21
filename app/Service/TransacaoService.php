<?php

namespace App\Services;
use App\Models\Conta;
use App\Models\TipoTransacao;
use App\Models\Transacoes;
use Auth;

class TransacaoService {
    
    public function deposito($conta, $valor)
    {
        
        $tipoTransacao = TipoTransacao::where('descricao','Depósito')->first()->id;
        $transacao = Transacoes::create([
            'valor'     => $valor,
            'tipo_transacao_id' => $tipoTransacao,            
            'conta_id'  => $conta
        ]);

        return $transacao;
    }

    public function saque($valor)
    {
        $tipoTransacao = TipoTransacao::where('descricao','Saque')->first()->id;
        $transacao = Transacoes::create([
            'valor'     => -$valor,
            'tipo_movimento_id' => $tipoTransacao,
            'conta_id'  =>  Auth::guard()->user()->conta->id
            
        ]);
        return $transacao;
    }

    public function saldo ()
    {
        return Transacoes::sum('valor'); 
    }

    public function extrato () {
        return Transacoes::get();
    }
}
<?php

namespace App\Services;
use App\Models\Conta;
use App\Models\TipoTransacao;
use App\Models\Transacoes;
use Auth;
use DB;

class TransacaoService {
    
    public function deposito($conta, $valor)
    {
        
        $tipoTransacao = TipoTransacao::where('descricao','Depósito')->first()->id;
        $deposito = Transacoes::create([
            'valor'     => $valor,
            'tipo_transacao_id' => $tipoTransacao,            
            'conta_id'  => $conta
        ]);

        return $deposito;
    }

    public function saque($valor)
    {
        $tipoTransacao = TipoTransacao::where('descricao','Saque')->first()->id;

        
        $saque = Transacoes::create([
            'valor'     => '-'.$valor,
            'tipo_transacao_id' => $tipoTransacao,
            'conta_id'  =>  Auth::guard()->user()->conta->id
            
        ]);

        return $saque;
    }

    public function saldo ()
    {        
        // $tempo = Transacoes::select('numero', DB::raw('sum(valor) as valor'))->where('transacoes.conta_id',Auth::guard()->user()->conta->id )
        //                      ->join('contas','transacoes.conta_id','contas.id')                   
        //                      ->groupBy('numero')->get();
                             
        return Transacoes::where('conta_id',Auth::guard()->user()->conta->id )->sum('valor');
    }

    public function extrato () {
        return Transacoes::where('conta_id',Auth::guard()->user()->conta->id )->get();
    }
}
<?php

namespace App\Repositories\Eloquent;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Http\Resources\SaldoResource;
use App\Http\Resources\SaqueResource;
use App\Http\Resources\DepositoResource;

use App\Models\Transacoes;
use App\Models\Conta;

use App\Http\Requests\SaqueRequest;
use App\Http\Requests\TransferenciaRequest;
use App\Http\Resources\TransferenciaResource;
use App\Services\TransacaoService;

use App\Http\Utilits\Utilits;
use Illuminate\Support\Facades\Validator;
use App\Repositories\Eloquent\AbstractRepository;
use App\Repositories\Contracts\TransacaoInterface;



class TransacaoRepository extends AbstractRepository implements TransacaoInterface
{

    protected $transacao;

    public function __construct()
    {
        $this->transacao = new Transacoes();
    }

    public function extrato()
    {
        return (new TransacaoService)->extrato();
    }

    public function saldo()
    {
        $saldo = (new TransacaoService)->saldo();
        $transacao = new Transacoes();
        $transacao->valor = $saldo;
        return new SaldoResource($transacao);
    }

    public function deposito(Request $request)

    {
        
        $deposito = Conta::join('agencias', 'agencias.id', 'contas.agencia_id')
            ->join('users', 'users.id', 'contas.users_id')
            ->where('contas.numero',  $request->conta)
            ->where('agencias.codigo', $request->agencia)
            ->select('contas.*')
            ->first();

        if (!$deposito) {
            return response()->json([
                'errors' => [
                    'generic' => [
                        'Conta Não Encontrada'
                    ]
                ]
            ], Response::HTTP_NOT_ACCEPTABLE);
        }

        // if (!$request->filled('token')) {
        //     $deposito->token = true;
        //     return $deposito;
        // }

        $valor_atualizado = Utilits::convertValor($request->valor);

       

        $transacao = (new TransacaoService)->deposito($deposito->id, $valor_atualizado);
            
        return new DepositoResource($transacao);
    }

    public function saque(Request $request)
    {

        
        $validator = Validator::make(
            $request->all(),
            (new SaqueRequest)->rules(),
            (new SaqueRequest)->messages()
        );

        
        if ($validator->fails()) {
            return response()->json(
                ['errors' => $validator->messages()],
                Response::HTTP_NOT_ACCEPTABLE
            );
            
        }

        
        
        $valor_atualizado = Utilits::convertValor($request->valor);

        $transacao = (new TransacaoService)->saque($valor_atualizado);

        return new SaqueResource($transacao);
    }


    public function transferencia(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            (new TransferenciaRequest)->rules(),
            (new TransferenciaRequest)->messages()
        );

        if ($validator->fails()) {
            return response()->json(
                ['errors' => $validator->messages()],
                Response::HTTP_NOT_ACCEPTABLE
            );
            
        }

        $agencia_origem = Auth::guard()->user()->conta->id;

        $transacao = (new TransacaoService)->transferencia($request);

        return new TransferenciaResource($transacao);
    }
}

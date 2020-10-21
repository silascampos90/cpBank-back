<?php

namespace App\Repositories\Eloquent;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Http\Resources\TrasacaoCollection;
use App\Http\Resources\TrasacaoResource;
use App\Http\Resources\SaldoResource;
use App\Http\Resources\ContaResource;

use App\Models\Transacoes;
use App\Models\Conta;
use App\User;

use App\Http\Requests\SaqueRequest;
use App\Http\Requests\DepositoRequest;
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
            
        return $transacao;
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

        return new TransacaoService($transacao);
    }
}

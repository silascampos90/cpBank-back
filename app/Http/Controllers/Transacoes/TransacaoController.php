<?php

namespace App\Http\Controllers\Transacoes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Repositories\Contracts\TransacaoInterface;

use App\Http\Resources\SaldoResource;
use App\Http\Resources\TrasacaoCollection;
use App\Http\Resources\TrasacaoResource;

use App\Http\Requests\DepositoRequest;

use App\Models\Conta;


class TransacaoController extends Controller
{
    protected $repository;
    
    public function __construct()
    {
        $this->repository = app(TransacaoInterface::class);
    }

    public function index()
    {
        return new TrasacaoCollection(
            $this->repository->extrato()
        );
    }

    public function saldo()
    {
        return new SaldoResource(
            $this->repository->saldo()
        );
    }

    public function deposito(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            (new DepositoRequest)->rules(),
            (new DepositoRequest)->messages()
        );

        if ($validator->fails()) {
            return response()->json(
                ['errors' => $validator->messages()],
                Response::HTTP_NOT_ACCEPTABLE
            );
        }
        $conta = Conta::join('agencias', 'agencias.id', 'contas.agencia_id')
            ->join('users', 'users.id', 'contas.user_id')
            ->where('contas.numero',  $request->conta)
            ->where('agencias.numero', $request->agencia)
            ->where('users.documento', $request->documento)
            ->select('contas.*')
            ->first();
                
        if (!$conta) {
            return response()->json([
                'errors' => [
                    'generic' => [
                        'Não existe nenhuma conta cadastrada para os dados informados'
                    ]
                ]
            ], Response::HTTP_NOT_ACCEPTABLE);
        }

        if (!$request->filled('token')) {  
            $conta->token = true;    
            return $conta;
        } 

        return new TrasacaoResource(
            $this->repository->deposito($request)
        );
    }

    public function saque(TransacaoInterface $repository)
    {   
        return $repository->saque($request);
    }
}

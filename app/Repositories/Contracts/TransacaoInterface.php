<?php

namespace App\Repository\Contracts;
use Illuminate\Http\Request;

interface MovimentoRepositoryInterface {
    


    public function saldo();    




    public function deposito(Request $request);




    public function saque(Request $request);




    public function extrato();



}
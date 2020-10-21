<?php

namespace App\Repositories\Contracts;

use Illuminate\Http\Request;

interface TransacaoInterface {
    


    public function saldo();    




    public function deposito(Request $request);




    public function saque(Request $request);




    public function extrato();



}
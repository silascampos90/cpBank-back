<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Utilits\Utilits;
use App\Http\Resources\ContaResource;

class SaldoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
      
        return [
            'valor' => $this->valor,
            'conta' => $this->numero,
            'saldo' => Utilits::moedaBrasil($this->valor),
            'dataHora' => date('d/m/Y H:i'),
        ];
    }
}

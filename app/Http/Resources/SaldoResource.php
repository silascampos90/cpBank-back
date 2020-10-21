<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Utilits\Utilits;

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
            'saldo' => Utilits::moedaBrasil($this->valor),
            'dataHora' => date('d/m/Y H:i'),
        ];
    }
}

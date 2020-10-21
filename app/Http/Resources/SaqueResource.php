<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Utilits\Utilits;

class SaqueResource extends JsonResource
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
            'conta' => $this->conta_id,
            'Tipo'  => $this->tipo_transacao_id,
            'saque' => Utilits::moedaBrasil($this->valor),
            'dataHora' => date('d/m/Y H:i'),
        ];
    }
}

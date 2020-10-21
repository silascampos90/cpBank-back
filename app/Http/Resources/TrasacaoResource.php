<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Utilits\Utilits;

class TrasacaoResource extends JsonResource
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
            'id'    => $this->id,
            'valor' => $this->valor,
            'saldo'   => Utilits::moedaBrasil($this->valor),
            'tipoTrasacao' => $this->tipoTrasacao,
            'conta' => new ContaResource($this->conta),
            'usuario'   => new UsuarioResource($this->conta->usuario),
            'dataHora' => $this->created_at->format('d/m/Y H:i')
        ];
    }
}

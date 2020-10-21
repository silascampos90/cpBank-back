<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Http\Resources\TrasacaoResource;

use App\Http\Utilits\Utilits;

class TrasacaoCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

        
        return [
            'data' => $this->collection,
            'meta' => [
                'saldoTotal' => Utilits::moedaBrasil($this->collection->sum('valor'))
            ]
        ];
        

        
         
        // return [
        //     'id'    => $this->id,
        //     'valor' => $this->valor,
        //     'saldo'   => Utilits::moedaBrasil($this->valor),
        //     'tipoTrasacao' => $this->tipoTrasacao,
        //     'conta' => new ContaResource($this->conta),
        //     'usuario'   => new UsuarioResource($this->conta->usuario),
        //     'dataHora' => $this->created_at->format('d/m/Y H:i')
        // ];
    }
}

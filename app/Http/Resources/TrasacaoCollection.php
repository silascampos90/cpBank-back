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
        // $collect = $this->collection->map(function ($transacao) {
        //     return new TrasacaoResource($transacao);
        // });

        
        // return [
        //     'data' => $collect,
        //     'meta' => [
        //         'saldo' => Utilits::moedaBrasil($collect->sum('valor')),
        //         'registros' => $collect->count()
        //     ]
        // ];

         return [
            'data' => $this->collection,
            'links' => [
                'self' => 'link-value',
            ],
        ];
    }
}

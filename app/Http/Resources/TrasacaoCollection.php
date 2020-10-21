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
        $collection = $this->collection->map(function ($_movimento) {
            return new TrasacaoResource($_movimento);
        });

        return [
            'data' => $collection,
            'meta' => [
                'saldo' => Utilits::moedaBrasil($collection->sum('valor')),
                'registros' => $collection->count()
            ]
        ];
    }
}

<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Utilits\Utilits;

class LoginResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $cpf = Utilits::mask('###.###.###-##', $this->cpf);

        return [
            'token' => $this->token,
            'nome'  => $this->nome,
            'cpf'   => $cpf,            
            'agencia' => $this->conta->agencia->codigo,
            'conta'   => $this->conta->numero
        ];
    }
}

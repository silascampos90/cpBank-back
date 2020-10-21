<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transacoes extends Model
{
    protected $filable = ['valor','tipo_transacao_id','conta_id'];

    public function conta()
    {
        return $this->belongsTo('App\Models\Conta');
    }

    public function tipoTrasacao()
    {
        return $this->belongsTo('App\Models\TipoTransacao');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Conta extends Model
{
    protected $fillable = ['numero', 'agencia_id', 'usuario_id'];


    public function Usuario(){

        return $this->belongsTo('App\User','usuario_id','id');
    }

    public function Agencia() {

        return $this->belongsTo('App\Models\Agencia','agencia_id','id');

    }

    public function Transacoes(){

        return $this->HasMany('App\Models\Transacoes');
    }

}

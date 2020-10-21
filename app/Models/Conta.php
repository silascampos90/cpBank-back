<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Conta extends Model
{
    protected $fillable = ['numero', 'agencia_id', 'usuario_id'];


    public function usuario(){

        return $this->belongsTo('App\User','usuario_id','id');
    }

    public function agencia() {

        return $this->belongsTo('App\Models\Agencia','agencia_id','id');

    }

    public function transacoes(){

        return $this->HasMany('App\Models\Transacoes');
    }

}

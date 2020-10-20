<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Conta extends Model
{
    protected $fillable = ['numero', 'agencia_id', 'usuario_id'];


    public function Usuario(){

        return $this->belongsTo('App\User','usuario_id','id');
    }

    public function Agencia() {

        return $this->belongsTo('App\model\Agencia','agencia_id','id');

    }

    public function Transacoes(){

        return $this->HasMany('App\model\Transacoes');
    }


}

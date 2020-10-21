<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoTransacao extends Model
{
    protected $table = 'tipo_transacoes';
    protected $fillable = ['descricao'];
}

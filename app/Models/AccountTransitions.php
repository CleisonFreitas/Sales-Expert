<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountTransitions extends Model
{
    use HasFactory;

    protected $table= 'account_transitions';

    protected $fillable = [
        'id',
        'operador',
        'lancamento',
        'caixa_id',
        'conta_id',
        'form_pagamento_id',
        'valor',
        'observacao'
    ];

    public $timestamps = true;
}

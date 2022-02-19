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

    public function account()
    {
        return $this->belongsToMany(Account::class,'conta_id');
    }

    public function livrocaixa()
    {
        return $this->belongsTo(AccountBook::class, 'livro_caixa_id');
    }

    public $timestamps = true;
}

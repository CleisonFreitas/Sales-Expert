<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;
    protected $table = 'accounts';
    protected $fillable = [
        'id',
        'categoria',
        'status',
        'descricao',
        'tipo',
        'uso',
        'pertence',
        'operador_id',
        'operador_nome'
    ];
    public $timestamps = true;
}

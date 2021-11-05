<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountBook extends Model
{
    use HasFactory;

    protected $table = "account_books";
    protected $fillable = [
        'hora_aber',
        'caixa_id',
        'data_aber',
        'data_fech',
        'referencia',
        'lote'
    ];
    public $timestamps = true;
}

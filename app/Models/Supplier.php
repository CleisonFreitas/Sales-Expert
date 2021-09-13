<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;
    protected $table = 'suppliers';
    protected $fillable = [
       'dt_cad',
       'id',
       'status',
       'nome',
       'cnpj',
       'cep',
       'logradouro',
       'numero',
       'cidade',
       'estado',
       'bairro',
       'email',
       'ct_num',
       'whatsapp',
       'facebook',
       'instagram',
       'prod_desc',
       'serv_desc',
    ];

    public $timestamps = 'true';
}

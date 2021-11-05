<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $table = 'company';
    public $timestamps = true;
    protected $fillable = [
        'id',
        'ceo_nome',
        'ceo_sobrenome',
        'empr_nome',
        'cep',
        'endereco',
        'cidade',
        'uf',
        'bairro',
        'email',
        'num_c1',
        'num_c2',
        'facebook',
        'instagram',
        'whatsapp'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    use HasFactory;
    protected $table = 'employers';
    protected $fillable = [
    'id',
    'p_nome',
    'status',
    'dt_cad',
    'dt_nasc',
    'cpf',
    'rg',
    'genero',
    'cep',
    'logradouro',
    'numero',
    'cidade',
    'bairro',
    'estado',
    'bairro',
    'email',
    'ct_num',
    'ct_whats',
    'facebook',
    'instagram',
    ];
    public $timestamps = true;
}

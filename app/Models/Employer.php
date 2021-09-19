<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Employer extends Model
{
    use HasFactory;

    public function getAgeAttribute(){
        return Carbon::parse($this->attributes['dt_nasc'])->age;
    }
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

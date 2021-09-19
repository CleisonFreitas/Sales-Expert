<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Customer extends Model
{
    use HasFactory;
    
    public function getAgeAttribute(){
        return Carbon::parse($this->attributes['nascimento'])->age;
    }
    protected $table = 'customers';
    protected $fillable = [
        'nome',
        'apelido',
        'status',
        'cadastro',
        'nascimento',
        'cpf',
        'rg',
        'genero',
        'cep',
        'logradouro',
        'numero',
        'cidade',
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

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

    public static function aniversariantes(){
        $dataAtual = Carbon::now();

        $aniversariantes =
        ['aniversariantes' => Customer::whereMonth('nascimento', $dataAtual->month)
        ->whereDay('nascimento', $dataAtual->day)
        ->orderByRaw('day(nascimento) asc')->get()];

        return $aniversariantes;
    }

    public static function contanivers(){
        $dataAtual = Carbon::now();

        $contanivers =
        ['aniversariantes' => Customer::whereMonth('nascimento', $dataAtual->month)
        ->whereDay('nascimento', $dataAtual->day)
        ->orderByRaw('day(nascimento) asc')
        ->count()
        ];

        foreach($contanivers as $aniver){
            if($aniver){
                $contagem = $aniver;
            }else{
                $contagem = 0;
            }

        }

        return $contagem;
    }


    protected $table = 'customers';
    protected $fillable = [
        'nome',
        'apelido',
        'status',
        'resp_id',
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

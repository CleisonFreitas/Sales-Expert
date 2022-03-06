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

    public function accountransition()
    {
        return $this->hasMany(AccountTransitions::class,'conta_id');
    }

    public function ContaDescricao()
    {
        return $this->hasManyThrough(AccountBook::class,AccountTransitions::class,'conta_id','livro_caixa_id','id','id');
    }
    public $timestamps = true;
}

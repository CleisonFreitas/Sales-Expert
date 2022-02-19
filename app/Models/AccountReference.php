<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountReference extends Model
{
    use HasFactory;
    protected $table = 'account_references';
    protected $fillable = [
        'id',
        'descricao'
    ];
    public $timestamps = true;

    public function CaixaReferencia()
    {
        return $this->hasMany(AccountBook::class,'caixa_id');
    }
}

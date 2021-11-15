<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Service extends Model
{
    use HasFactory;

    public function getValorAttribute($valor)
{
        return $this->attributes['valor'] = sprintf('R$ %s', number_format($valor, 2));

}
    protected $table = 'services';
    protected $fillable = [
        'id',
        'descricao',
        'dt_geracao',
        'status',
        'valor',
        'observacao',
        'operador_id',
        'operador',
    ];
    public $timestamps = true;
}

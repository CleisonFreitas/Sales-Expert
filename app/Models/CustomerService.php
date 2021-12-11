<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerService extends Model
{
    use HasFactory;

    public function getValorAttribute($valor){
        return $this->attributes['valor'] = sprintf("%s",number_format($valor,2,',','.'));
    }

    protected $table = 'customer_services';
    protected $fillable = [
        'ordem',
        'descricao',
        'cadastro',
        'status',
        'data_agend',
        'hora_agend',
        'resp_id',
        'cust_id',
        'observacao',
        'valor',
    ];
    public $timestamps = true;

}

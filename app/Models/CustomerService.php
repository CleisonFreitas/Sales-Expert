<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CustomerService extends Model
{
    use HasFactory;

    public function getValorAttribute($valor){
        return $this->attributes['valor'] = sprintf("%s",number_format($valor,2,',','.'));
    }

    public static function getService(){
        $service = DB::table('customer_services')
        ->join('customers','customers.id','=','customer_services.cust_id')
        ->join('employers','employers.id','=','customer_services.resp_id')
        ->select('customer_services.*','employers.nome as e_nome','customers.nome as c_nome')
        ->get();

        return $service;
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

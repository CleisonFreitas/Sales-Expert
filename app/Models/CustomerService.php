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
        'service_id',
    ];
    protected $cast = [
        'service_id' => 'array',
    ];


    public $timestamps = true;

    public function Service() 
    {
        return $this->belongsTo(Service::class,'service_id');
    }

    public function payments()
    {
        return $this->hasMany(Payments::class,'customer_services_id');
    }
    
    public function customer()
    {
        return $this->belongsTo(Customer::class,'cust_id');
    }

    static function paymentCustomer(string $dt_inicial,string $dt_final,string $cep,string $service_id)
    {
        $report = Self::Select('*')
        ->join('payments','payments.customer_services_id','=','customer_services.ordem')
        ->join('customers','customer_services.cust_id','=','customers.id')
        ->whereBetween('payments.created_at', [$dt_inicial, $dt_final])
        ->where([
            ['customers.cep','like', $cep],
            ['customer_services.service_id','like','%'.$service_id.'%']
        ])
        ->get();

        return $report;
    }

}

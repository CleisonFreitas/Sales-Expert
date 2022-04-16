<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    use HasFactory;

    protected $table = "payments";

    protected $fillable = [
        'customer_id',
        'customer_services_id',
        'caix_ref',
        'form_paga_id',
        'valor',
        'cortesia',
    ];

    public $timestamps = true;

    public function customerservices()
    {
        return $this->belongsTo(CustomerService::class,'customer_services_id','ordem');
    }
}

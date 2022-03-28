<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reschedule extends Model
{
    use HasFactory;

    protected $table = 'reschedules';

    protected $fillable = [
        'cliente_id',
        'cliente_ordem',
        'data',
        'hora',
        'motivo'
    ];

    public $timestamps = true;
}

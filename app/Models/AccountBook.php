<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AccountBook extends Model
{
    use HasFactory;

    protected $table = "account_books";
    protected $fillable = [
        'hora_aber',
        'caixa_id',
        'data_aber',
        'data_fech',
        'referencia',
    ];
    public static function selectcaix()
    {
        $select_account = DB::table('account_books')
        ->join('account_references','account_books.caixa_id','=','account_references.id')
        ->select('account_books.*','account_references.descricao')
        ->where('data_fech',null)
        ->get();

        return $select_account;
    }
    public $timestamps = true;


}

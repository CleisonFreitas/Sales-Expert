<?php

namespace App\Http\Controllers;

use App\Models\AccountBook;
use App\Models\AccountReference;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\OpenBookRequest;

class AccountBookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $route;

    public function index()
    {
        try{

            $account_reference = AccountReference::all();
            $account_book = AccountBook::all();
            $select_account = AccountBook::selectcaix();
            $caixa = 'A';

        }catch(\Exception $e){
            return response()->json('Dados não encontrados!');
        }

        return view('operation.open_account_book',compact('account_book','account_reference','select_account','caixa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OpenBookRequest $request)
    {
        try{
            $account_book = AccountBook::create($request->all());
        }catch(\Exception $e){
            return redirect()->back()->with([toast()->error($e->getMessage())]);
        }

            return redirect()->back()->with([toast()->success("Caixa aberto com sucesso!")]);
    }

    public function show($id)
    {
        try{
            $account = AccountBook::findOrfail($id);
            $account_reference = AccountReference::all();
            $select_account = AccountBook::selectcaix();
            $caixa = 'F';

        }catch(\Exception $e){

            return redirect()->route('dashboard')->with([toast()->info($e->getMessage())]);
        }

        return view("operation.close_account_book", compact('select_account','account_reference','account','caixa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AccountBook  $accountBook
     * @return \Illuminate\Http\Response
     */
    public function close(Request $request,$id)
    {
        $account_book = AccountBook::find($id);
        $account_book->data_fech = $request->input('data_fech');
        switch($account_book->data_fech){
            case(null);
                return redirect()->back()->with([toast()->error("Data de fechamento é obrigatório!")]);
            break;
            case($account_book->data_fech < $account_book->data_aber);
                return redirect()->back()->with([toast()->error("Data de fechamento não pode ser menor do que a data de abertura!")]);
            break;
        }
        $account_book->update();
        if($account_book == true){
            return redirect()->route("account.book")->with([toast()->info("Caixa fechado com sucesso!")]);
        }
        return redirect()->back()->with([toast()->error("Erro ao tentar fechar caixa!")]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AccountBook  $accountBook
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AccountBook $accountBook)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AccountBook  $accountBook
     * @return \Illuminate\Http\Response
     */
    public function destroy(AccountBook $accountBook)
    {
        //
    }

    public function account_receive_index(){
        return view('operation.bills_receive');
    }
    public function account_pay_index(){
        $route;
        return view('operation.bills_pay');
    }
}

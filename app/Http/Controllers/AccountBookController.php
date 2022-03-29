<?php

// Utilizado para controle de abertura e fechamento de caixas

namespace App\Http\Controllers;

use App\Models\AccountBook;
use App\Models\AccountReference;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\OpenBookRequest;
use App\Models\Account;
use App\Models\AccountTransitions;
use App\Models\PaymentMethod;
use RealRashid\SweetAlert\Facades\Alert;

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

        return view('operation.open_account_book',compact('account_book',
                                                          'account_reference',
                                                          'select_account',
                                                          'caixa'));
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
            if($request->data_aber != null || $request->data_aber != ''){
                $account_book = AccountBook::create($request->all());
            }
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
        try{
            DB::beginTransaction();
            // Localizando Caixa
            $account_book = AccountBook::find($id);

            // Verificando se o campo "data_fech" foi enviado e se é válido
            $account_book->data_fech = $request->input('data_fech');
            switch($account_book->data_fech){
                case(null);
                DB::rollback();
                    return redirect()->back()->with([toast()->error("Data de fechamento é obrigatório!")]);
                break;
                case($account_book->data_fech < $account_book->data_aber);
                DB::rollback();
                    return redirect()->back()->with([toast()->error("Data de fechamento não pode ser menor do que a data de abertura!")]);
                break;
            }

            $account_book->update();
            DB::commit();

        }catch(\Exception $e){
            DB::rollback();
            return redirect()->back()->with([toast()->error($e->getMessage())]);
        }

        return redirect()->route("account.book")->with([toast()->info("Caixa fechado com sucesso!")]);


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

    // Contas do Caixa(Movimentações)
    public function account_transition(){

        // Lançar conta à receber
      //  $accountbook = AccountBook::selectcaix();

        $paymentbook = AccountBook::all();

        foreach($paymentbook as $i => $payment){
            $conta[$i] = [
                'Caixa' => $payment->referenciacaixa->descricao,
                'Serviços' => 
                    [
                        'Procedimentos' =>  $payment->services,
                    //    'Valor' => 
                    ]
            ];
        }
        dd($conta);die;
     //   $allbooks = AccountBook::with(['livrocaixa','CaixaReferencia'])
    //    ->join('accounts','account_transitions.conta_id','=','accounts.id')->get();
        $paymethod = PaymentMethod::all();
        $accounts = Account::Where([
            ['categoria','=','C'],
        ])->get();

     //   echo json_encode([$allbooks]);die;
      //  dd($allbooks);die;
    /*    foreach($allbooks as $i => $livroconta){
            $resultado[$i] = [
                'Caixa_id' =>$livroconta->caixa_id,
                'Caixa' => $livroconta->CaixaReferencia->descricao,
                'Conta_Caixa' => [],
            ];
            foreach($livroconta->livrocaixa as $k => $contacaixa){
                $resultado[$i]['Conta_Caixa'][$k] = [
                    'id' => $contacaixa->conta_id,
                    'valor' => $contacaixa->valor,
                    'observação' => $contacaixa->observacao
                ];
            }

        }*/

       // dd([$resultado]);die;
        return view('operation.posting_account',compact('paymentbook','accounts','paymethod'));
    }

    public function transition_store(Request $request)
    {
        try{

            $transition = AccountTransitions::create($request->all());

        }catch(\Exception $ex){
            return redirect()->back()->with([toast()->error($ex->getMessage())]);
        }

        return redirect()->route('posting.account')->with([toast()->success('Lançamento Realizado com sucesso!')]);
    }

    public function warning($id){
        $cliente = AccountTransitions::find($id);
        Alert::alert()->html('Aviso'," Você está prestes esse lançamento!
        <br>Deseja prosseguir?<br>
        <br><a class='btn btn-danger' href='/customer/delete/$id')}}'>Sim</a>&nbsp;
        <a class='btn btn-secondary' href='/customer/edit/$id'>Não</a><br>",'warning')
        ->autoClose(20000);
        return redirect()->back();
    }



}

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
use App\Models\CustomerService;
use App\Models\PaymentMethod;
use App\Models\Payments;
use RealRashid\SweetAlert\Facades\Alert;

use function PHPUnit\Framework\isNull;

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
            $payment_book = Payments::Where('caix_ref',$id)->sum('valor');
            $account_transitions = AccountTransitions::Where('livro_caixa_id',$id)->sum('valor');
            $valor_caixa = $payment_book + $account_transitions;

        }catch(\Exception $e){

            return redirect()->route('dashboard')->with([toast()->info($e->getMessage())]);
        }

        return view("operation.close_account_book", compact('select_account',
                                                            'account_reference',
                                                            'account',
                                                            'caixa',
                                                            'payment_book',
                                                            'valor_caixa'));
    }

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

        // Movimentações e Atendimentos

        $data = [];
        $paymentbook = AccountBook::with(['referenciacaixa','payments','contas'])->get();

        

        foreach($paymentbook as $i => $book){
            $data[$i] = [
                'id' => $book->caixa_id,
                'descricao' => $book->referenciacaixa->descricao,
                'data_abertura' => $book->data_aber,
                'data_fech' => $book->data_fech,
                'atendimentos' => [],
                'contas' => []
            ];

            foreach($book->payments as $payment){
                $data[$i]['atendimentos'][] = [
                //    'id' => $payment->id,
                    'pagamento_id' => $payment->id,
                    'descricao_servico' => $payment->descricao,
                    'valor' => $payment->valor,
                ];
            }

            foreach($book->contas as $conta){
                $data[$i]['contas'][] = [
                    'id' => $conta->id,
                    'descricao_conta' => $conta->conta_descricao,
                    'valor' => $conta->valor
                ];
            }

        }
     //   $allbooks = AccountBook::with(['livrocaixa','CaixaReferencia'])
    //    ->join('accounts','account_transitions.conta_id','=','accounts.id')->get();
        $paymethod = PaymentMethod::all();
        $accounts = Account::Where([
            ['categoria','=','C'],
        ])->get();
        $accountbook = AccountBook::with(['referenciacaixa'])->whereNUll('data_fech')->get();

        return view('operation.posting_account', ['data'=>$data,
                                                  'paymethod' => $paymethod,
                                                  'accounts'=> $accounts,
                                                  'accountbook' => $accountbook]);
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

    public function warning_conta($id)
    {
        try{
            $conta = AccountTransitions::find($id);
            Alert::alert()->html('Aviso'," Você está prestes à excluir esse lançamento!
            <br>Deseja prosseguir?<br>
            <br><a class='btn btn-danger' href='/operation/transitions/account_payment_delete/$id')}}'>Sim</a>&nbsp;
            <a class='btn btn-secondary' href='/operation/transitions'>Não</a><br>",'warning')
            ->autoClose(20000);
            return redirect()->back();

        }catch(\Exception $ex){
            return redirect()->back()->with([toast()->error($ex->getMessage())]);
        }
        
    }

    public function warning_service($id)
    {
        try{
            $service = Payments::findOrfail($id);
            Alert::alert()->html('Aviso'," Você está prestes à excluir esse pagamento!
            <br>Deseja prosseguir?<br>
            <br><a class='btn btn-danger' href='/operation/transitions/service_delete/$id')}}'>Sim</a>&nbsp;
            <a class='btn btn-secondary' href='/operation/transitions'>Não</a><br>",'warning')
            ->autoClose(20000);
            return redirect()->back();
        }catch(\Exception $ex){
            return redirect()->back()->with([toast()->error($ex->getMessage())]);
        }
        
    }

    public function service_payment_delete($id)
    {
        try{
            DB::beginTransaction();
            $payment_service = Payments::findOrfail($id);
            $custservice = CustomerService::Where('ordem',$payment_service->customer_services_id)->update(['status' => 'P']);
            $payment_service->delete();

            DB::commit();
            return redirect()->route('posting.account')->with([toast()->success('Pagamento excluído com sucesso!')]);
        }catch(\Exception $ex){
            DB::rollBack();
            return redirect()->back()->with([toast()->error($ex->getMessage())]);
        }
    }

    public function account_payment_delete($id)
    {
        try{
            $account_payment = AccountTransitions::findOrfail($id);
            $account_payment->delete();

            if($account_payment == true){
                return redirect()->route('posting.account')->with([toast()->success('Lançamento excluído com sucesso!')]);
            }

        }catch(\Exception $ex){
            return redirect()->back()->with([toast()->error($ex->getMessage())]);
        }
    }



}

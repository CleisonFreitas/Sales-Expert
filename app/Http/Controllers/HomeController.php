<?php

namespace App\Http\Controllers;

use App\Models\AccountTransitions;
use App\Models\Customer;
use App\Models\CustomerService;
use App\Models\Dashboard;
use App\Models\Note;
use App\Models\Payments;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        try{

            $atendimentos = CustomerService::Where([
                'data_agend' => date('Y-m-d'),
                'status' => ['P','R']
                ])->get();
    
            $contanivers = Customer::contanivers();
    
            $entradas = CustomerService::Where([
                'data_agend' => date('Y-m-d'),
                'status' => 'P'
                ])->sum('valor');
    
            $pagamento = Payments::Where([
                    ['created_at','LIKE', date('Y-m-d %')],
                ])
                ->sum('valor');
    
            $transition = AccountTransitions::Select('*')
            ->join('accounts','account_transitions.conta_id','=','accounts.id')
            ->Where([
                ['account_transitions.created_at','LIKE', date('Y-m-d %')],
                ['tipo' ,'=','Receita']
            ])
            ->sum('valor');
    
            $arrecadacao = $pagamento + $transition;
    
            $saida = AccountTransitions::Select('*')
            ->join('accounts','account_transitions.conta_id','=','accounts.id')
            ->Where([
                ['account_transitions.created_at','LIKE', date('Y-m-d %')],
                ['tipo' ,'=','Despesa']
            ])
            ->sum('valor');
    

        }catch(\Exception $e){
            return response()->json($e->getMessage());
        }

        return view('reports.dashboard',[
                'notas' => Note::all(),
                'atendimentos' => $atendimentos,
                'aniversariantes' => $contanivers,
                'entradas' => $entradas,
                'arrecadacao' => $arrecadacao,
                'saida' => $saida
        ]);

        
    }

    public function search(Request $request)
    {
        try{

            $search = $request->search;
                switch($search){
                    case('Fornecedores');
                        return redirect()->route('supplier');
                    break;

                    case('Clientes');
                        return redirect()->route('customer');
                    break;

                    case('Atendimento');
                        return redirect()->route('customer_service');
                    break;

                    case('Caixa');
                        return redirect()->route('account.book');
                    break;

                    case('Contas');
                        return redirect()->route('account.new');
                    break;

                    default;
                        return redirect()->back()->with([ toast()->info( 'Página não encontrada!' ) ]);
                }
        }catch(\Exception $e){
            return response()->json($e->getMessage(),404);
        }

    }

    public function nota(Request $request)
    {
        try{

            $nota = Note::create($request->all());

        }catch(\Exception $e){
            return redirect()->back()->with([ toast()->error( response()->json( $e->getMessage() ) )]);
        }

        return redirect()->route('dashboard')->with([toast()->success('Nota registrada com sucesso!')]);
    }

    public function nota_update(Request $request,$id)
    {
        try{

            $nota = Note::findorFail($id);

            $nota->update($request->all());

        }catch(\Exception $e){
            return redirect()->back()->with([ toast()->error( response()->json( $e->getMessage() ) )]);
        }

        return redirect()->route('dashboard')->with([toast()->info('Nota atualizada com sucesso!')]);
    }

    public function nota_delete($id)
    {
        try{

            $nota = Note::findorFail($id);

            $nota->delete();

        }catch(\Exception $e){
            return redirect()->back()->with([ toast()->error( response()->json( $e->getMessage() ) )]);
        }

        return redirect()->route('dashboard')->with([toast()->info('Nota excluída com sucesso!')]);
    }

    public function dashpdf()
    {
        try{
            $atendimentos = CustomerService::Where([
                'data_agend' => date('Y-m-d'),
                'status' => ['P','R']
                ])->get();
    
            $contanivers = Customer::contanivers();
    
            $entradas = CustomerService::Where([
                'data_agend' => date('Y-m-d'),
                'status' => 'P'
                ])->sum('valor');
    
            $pagamento = Payments::Where([
                    ['created_at','LIKE', date('Y-m-d %')],
                ])
                ->sum('valor');
    
            $transition = AccountTransitions::Select('*')
            ->join('accounts','account_transitions.conta_id','=','accounts.id')
            ->Where([
                ['account_transitions.created_at','LIKE', date('Y-m-d %')],
                ['tipo' ,'=','Receita']
            ])
            ->sum('valor');
    
            $arrecadacao = $pagamento + $transition;
    
            $saida = AccountTransitions::Select('*')
            ->join('accounts','account_transitions.conta_id','=','accounts.id')
            ->Where([
                ['account_transitions.created_at','LIKE', date('Y-m-d %')],
                ['tipo' ,'=','Despesa']
            ])
            ->sum('valor');
    

        }catch(\Exception $e){
            return response()->json($e->getMessage());
        }


        return PDF::loadview('pdf.dashboard',[
            'atendimentos' => $atendimentos,
            'aniversariantes' => $contanivers,
            'entradas' => $entradas,
            'arrecadacao' => $arrecadacao,
            'saida' => $saida
        ])
            ->setPaper('a4','landscape')
            ->stream('relatorio-dashboard.pdf');
    }

}

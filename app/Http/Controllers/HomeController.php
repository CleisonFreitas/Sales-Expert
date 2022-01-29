<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

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
        return view('reports.dashboard',[
            'notas' => Note::all(),
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

                    case('Contas(Receber)');
                        return redirect()->route('posting.receive');
                    break;

                    case('Contas(Pagar)');
                        return redirect()->route('posting.pay');
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
}

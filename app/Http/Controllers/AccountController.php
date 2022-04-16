<?php

// Utilizado para criação de contas

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Account;
use Illuminate\Http\Request;
use App\Http\Requests\AccountRequest;
use Exception;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

use function PHPUnit\Framework\throwException;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grupo = Account::Where('categoria','=','G')->get();
        $conta = Account::Where('categoria','=','C')->get();

        return view('operation.accounts',compact('grupo','conta'));
    }


    public function store(AccountRequest $request)
    {
        try{
            $account = Account::create($request->all());

        }catch(\Exception $e){
            return redirect()->back()
            ->with([toast()->error($e->getMessage())])
            ->withInput();
        }

        return redirect()->back()->with([toast()->success('Nova conta criada com sucesso!')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try{
            $account = Account::findOrfail($id);

            $grupo_selected = Account::Where([
                ['categoria','=','G'],
                ['id','=',$account->pertence]
            ])->get();

            $grupo = Account::Where([
                ['categoria','=','G'],
            ])->get();
            $conta = Account::Where('categoria','=','C')->get();

            return view('operation.accounts',compact('account','grupo','conta','grupo_selected'));

        }catch(\Exception $ex){
            return redirect()->back()->with([toast()->error('Nenhum registro encontrado!')]);
        }
        
    }
    public function update(Request $request, $id)
    {
        try{
            DB::beginTransaction();

            $account = Account::find($id);
            $account->update($request->all());

            DB::commit();
            return redirect()->back()->with([toast()->success('Registro atualizado com sucesso!')]);
        }catch(\Exception $ex){
            DB::rollback();
            return redirect()->back()->with([toast()->error($ex->getMessage())]);
        }
    }

    public function warning($id){
        $account = Account::find($id);
        Alert::alert()->html('Aviso'," Você está prestes a excluir esse cadastro!
        <br>Deseja prosseguir?<br>
        <br><a class='btn btn-danger' href='/operation/accounts/delete/$id')}}'>Sim</a>&nbsp;
        <a class='btn btn-secondary' href='/operation/accounts'>Não</a><br>",'warning')
        ->autoClose(20000);
        return redirect()->back();

    }


    public function destroy($id)
    {
        try{
            DB::beginTransaction();
            $account_pertence = Account::Where('pertence',$id)->get();

            if($account_pertence->count()){
                return redirect()->back()->with([toast()->error('Esse grupo possui registros relacionados')]);
            }

            $account = Account::find($id);

            $account->delete();

            DB::commit();
            return redirect()->route('account.new')->with([toast()->success('Registro excluído com sucesso!')]);
        }catch(\Exception $ex){
            DB::rollback();
            return redirect()->back()->with([toast()->error($ex->getMessage())]);
        }
    }
}

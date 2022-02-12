<?php

// Utilizado para criação de contas

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Account;
use Illuminate\Http\Request;
use App\Http\Requests\AccountRequest;

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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $account = Account::findOrfail($id);

        $grupo = Account::Where('categoria','=','G')->get();
        $conta = Account::Where('categoria','=','C')->get();

        return view('operation.accounts',compact('account','grupo','conta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

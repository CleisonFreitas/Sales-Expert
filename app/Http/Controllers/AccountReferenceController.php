<?php

// Utilizado para criação de caixas

namespace App\Http\Controllers;

use App\Models\AccountReference;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccountReferenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request)
    {
        $account_reference = AccountReference::create($request->all());
        return redirect()->route('account.book')->with([toast()->success("Novo caixa criado com sucesso!")]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AccountReference  $accountReference
     * @return \Illuminate\Http\Response
     */
    public function show(AccountReference $accountReference)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AccountReference  $accountReference
     * @return \Illuminate\Http\Response
     */
    public function edit(AccountReference $accountReference)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AccountReference  $accountReference
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AccountReference $accountReference)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AccountReference  $accountReference
     * @return \Illuminate\Http\Response
     */
    public function destroy(AccountReference $accountReference)
    {
        //
    }
}

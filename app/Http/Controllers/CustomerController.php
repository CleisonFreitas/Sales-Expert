<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use RealRashid\SweetAlert\Facades\Alert;

class CustomerController extends Controller
{
    public function show(){
        $cliente = Customer::all();
        return view('customers.customer.customer')->with('customers',$cliente);
    }
    public function create(Request $request){
        $cliente = Customer::create($request->all());
        if($cliente == true){
            return redirect()->route('customer')->withSuccess('Cliente cadastrado com sucesso!');
        }
            return redirect()->back()->withInput()->withError('Erro ao tentar cadastrar cliente');
    }
    public function edit($id){
        $cliente = Customer::find($id);
            return view('customers.customer.edit_customer')->with('customers',$cliente);
    }
    public function updt(Request $request,$id){
        $customer = Customer::find($id);
        $customer->update($request->all());
        if($customer == true){
            return redirect()->back()->withSuccess('Cadastro de cliente atualizado com sucesso!');
        }
            return redirect()->back()->withInput()->withError('Erro ao tentar atualizar cadastro!');
    }
    public function warning($id){
        $cliente = Customer::find($id);
        Alert::alert()->html('Aviso'," Você está prestes a excluir esse cadastro! 
        <br>Deseja prosseguir?<br>
        <br><a class='btn btn-danger' href='/customer/delete/$id')}}'>Sim</a>&nbsp;
        <a class='btn btn-secondary' href='/customer/edit/$id'>Não</a><br>",'warning')
        ->autoClose(20000);
        return redirect()->back();
    }
    public function delete($id){
        $cliente = Customer::find($id);
        $cliente->delete();

        if($cliente == true){
            return redirect()->route('customer')->withSuccess('Cadastro de cliente excluído com sucesso!');
        }
            return redirect()->back()->withError('Erro ao tentar excluir cliente');
    }

}

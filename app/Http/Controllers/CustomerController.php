<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\CustomerService;
use Exception;
use RealRashid\SweetAlert\Facades\Alert as FacadesAlert;

class CustomerController extends Controller
{
    public function show(){
        $cliente = Customer::all();
        return view('customers.customer.customer')->with('customers',$cliente);
    }
    public function create(Request $request){
        $cliente = Customer::create($request->all());
        if($cliente == true){
            return redirect()->route('customer')->with([Toast()->Success('Cliente cadastrado com sucesso!')->timerProgressBar()]);
        }
            return redirect()->back()->with([toast()->error("Erro ao tentar cadastrar novo cliente")]);
    }
    public function edit($id){
        $cliente = Customer::find($id);
            return view('customers.customer.edit_customer')->with('customers',$cliente);
    }
    public function updt(Request $request,$id){
        $customer = Customer::find($id);
        $customer->update($request->all());
        if($customer == true){
            return redirect()->back()->withToastSuccess('Cadastro de cliente atualizado com sucesso!');
        }
            return redirect()->back()->withInput()->withToastError('Erro ao tentar atualizar cadastro!');
    }
    public function warning($id){
        $cliente = Customer::find($id);
        FacadesAlert::alert()->html('Aviso'," Você está prestes a excluir esse cadastro!
        <br>Deseja prosseguir?<br>
        <br><a class='btn btn-danger' href='/customer/delete/$id')}}'>Sim</a>&nbsp;
        <a class='btn btn-secondary' href='/customer'>Não</a><br>",'warning')
        ->autoClose(20000);
        return redirect()->back();
    }
    public function delete($id){

    //    $cliente_servico = CustomerService::Where('cust_id',$id)->get();
        try {
            $cliente = Customer::find($id);

            $search = CustomerService::Where('cust_id',$id)->get();
            if($search->count()){
                return redirect()->back()->with([toast()->info('Não foi possível realizar exclusão pois esse cliente possui atendimento(s)')->autoClose(30000)]);
            }
            $cliente->delete();
        }catch (\Exception $e) {
        //    dd($e);
            return redirect()->back()->with([toast()->error($e->getMessage())]);

        }
        return redirect()->route('customer')->with([toast()->success('Cadastro excluído com sucesso!')]);

    }

}

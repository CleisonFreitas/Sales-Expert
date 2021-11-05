<?php

namespace App\Http\Controllers;

use App\Http\Requests\PayMethodRequest;
use App\Models\PaymentMethod;

use RealRashid\SweetAlert\Facades\Alert;

class PaymentMethodController extends Controller
{
    public function show(){
        $payment_methods = PaymentMethod::all();
        return view('registers.payment.payment_method')->with('payment_methods',$payment_methods);
    }
    public function create(PayMethodRequest $request){
        $payment_methods = PaymentMethod::create($request->all());

        if($payment_methods == true){
            return redirect()->route('payment_method')->with([Toast()->Success('Forma de pagamento cadastrada com sucesso!')->timerProgressBar()]);
        }
            return redirect()->route('payment_method')->with([Toast()->Error('Erro ao tentar cadastrar forma de pagamento!')->timerProgressBar()]);
    }
    public function edit($id){
        $payment_methods = PaymentMethod::all()->where('id',$id);
        return view('registers.payment.edit_payment_method')->with('payment_methods',$payment_methods);
    }
    public function updt(PayMethodRequest $request,$id){
        $payment_methods = PaymentMethod::find($id);
        $payment_methods->update($request->all());

        if($payment_methods == true){
            return redirect()->back()->with([Toast()->Success('Forma de pagamento atualizada com sucesso!')->timerProgressBar()]);
        }
            return redirect()->back()->with([Toast()-Error('Erro ao tentar atualizar forma de pagamento!')->timerProgressBar()]);
    }
    public function warning($id){
        Alert::alert()->html('Aviso'," Você está prestes a excluir essa forma de pagamento! 
        <br>Deseja prosseguir?<br>
        <br><a class='btn btn-danger' href='/payment_method/delete/$id')}}'>Sim</a>&nbsp;
        <a class='btn btn-secondary' href='/payment_method/edit/$id'>Não</a><br>",'warning')
        ->autoClose(20000);
        return redirect()->back();
    }
    public function delete($id){
        $payment_method = PaymentMethod::find($id);
        $payment_method->delete();
        if($payment_method == true){
            return redirect()->route('payment_method')->with([Toast()->Success('Forma de pagamento excluída com sucesso!')->timerProgressBar()]);
        }
            return redirect()->back()->with([Toast()->Error('Erro ao tentar excluir forma de pagamento!')->timerProgressBar()]);
    }
}

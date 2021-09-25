<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\Http\Requests\CustomServiceRequest;
use App\Models\CustomerService;
use App\Models\Employer;
use App\Models\Customer;
use App\Models\PaymentMethod;
use RealRashid\SweetAlert\Facades\Alert;

class CustomerServiceController extends Controller
{
    public function show(){
        $employer = Employer::all();
        $customerservice = CustomerService::latest()->first();

        if($customerservice == true){
            return view('customers.service.customer_service')->with('employers',$employer);
        }   

            return redirect()->back()->with([alert("Você ainda não possui atendimento cadastrado!")->autoClose(5000)->showConfirmButton($btnText = 'Ok', $btnColor = '#3085d6')]);
    }
    public function shop($id){
        $employers = Employer::all();
        $payments = PaymentMethod::all();
        $customers = Customer::find($id);
        return view('customers.service.customer_shop')->with([
            'employers'=>$employers,
            'customers'=>$customers,
            'payment_methods'=>$payments,
        ]);
    }
    public function store(Request $request){
        $customerservice = CustomerService::create($request->all());
        $id = $customerservice->id;
        if($customerservice == true){
            $customerservice->ordem;
            return redirect()->route('customer_service')->with([alert('Atendimento cadastrado com sucesso!'),$id]);
        }
            return redirect()->back()->withError("Erro ao tentar cadastrar atendimento");
    }
}

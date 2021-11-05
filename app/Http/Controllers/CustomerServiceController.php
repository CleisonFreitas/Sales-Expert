<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\Http\Requests\CustomServiceRequest;
use App\Models\CustomerService;
use App\Models\Employer;
use App\Models\Customer;
use App\Models\PaymentMethod;
use Alert;
use Illuminate\Support\Facades\DB;

class CustomerServiceController extends Controller
{
    public function show(){
        $employer = Employer::all();
        $payments = PaymentMethod::all();
      
        $select = DB::table('customer_services')
        ->join('customers','customers.id','=','customer_services.cust_id')
        ->join('employers','employers.id','=','customer_services.resp_id')
        ->select('customer_services.*','employers.nome as e_nome','customers.nome as c_nome')
        ->get();

        if($select == true){
            return view('customers.service.customer_service')->with([
            'employers'=>$employer,
            'payment_methods'=>$payments,
            'customer_services'=>$select
            ]);
        }   

            return redirect()->back()->with([toast()->info("Você ainda não possui atendimento cadastrado!")]);
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
    public function store(CustomServiceRequest $request){
        $customerservice = new CustomerService;
        $customerservice = CustomerService::create($request->all(),[$customerservice->total = $request->input('valor')]);
        $id = $customerservice->id;
        if($customerservice == true){
            $customerservice->ordem;
            return redirect()->route('customer_service')->with([toast()->success('Atendimento cadastrado com sucesso!'),$id]);
        }
            return redirect()->back()->withError("Erro ao tentar cadastrar atendimento");
    }
    public function edit($ordem){
        $employer = Employer::all();
        $payments = PaymentMethod::all();

        $select = DB::table('customer_services')
        ->join('customers','customers.id','=','customer_services.cust_id')
        ->join('employers','employers.id','=','customer_services.resp_id')
        ->join('payment_methods','payment_methods.id','=','customer_services.form_paga_id')
        ->select('customer_services.*',
                'employers.nome as e_nome',
                'customers.nome as c_nome',
                'payment_methods.descricao as p_method'
                )
        ->where('customer_services.ordem',$ordem)
        ->get();

        return view('customers.service.edit_customer_service')->with([
            'employers'=>$employer,
            'payment_methods'=>$payments,
            'customer_services'=>$select
            ]);

    }
}

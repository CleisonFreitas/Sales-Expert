<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Http\Requests\CustomServiceRequest;
use App\Models\CustomerService;
use App\Models\Employer;
use App\Models\Customer;
use App\Models\PaymentMethod;
use App\Models\Service;
use Illuminate\Support\Str;
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

        return view('customers.service.customer_shop')->with([
            'employers'=> Employer::all(),
            'customers'=> Customer::find($id),
            'payment_methods'=> PaymentMethod::all(),
            'services' => Service::Where('status','ativo')->get()
        ]);
    }
    public function store(Request $request){

        $customer_service = $request->all();
        $customer_service['valor'] = Str::remove(['R$',' '],str_replace(',','.',$request->valor));

        CustomerService::create($customer_service);

        return redirect()->back()->with([toast()->success('Atendimento registrado com sucesso!')]);
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

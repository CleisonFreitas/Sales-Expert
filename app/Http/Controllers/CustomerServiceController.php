<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Http\Requests\CustomServiceRequest;
use App\Models\CustomerService;
use App\Models\Employer;
use App\Models\Customer;
use App\Models\PaymentMethod;
use App\Models\Service;
use App\Models\AccountBook;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CustomerServiceController extends Controller
{
    public function show(){
        $employer = Employer::all();
        $payments = PaymentMethod::all();

        $select = CustomerService::getService();

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

        try{
            if($request->data_agend < date('Y-m-d')){
                return redirect()->back()
                    ->with([toast()->info('A data do atendimento não pode ser inferior a data atual')])
                    ->withInput();
            }

            DB::beginTransaction();

            $customer_service = $request->all();
            $customer_service['valor'] = Str::remove(['R$',' '],str_replace(',','.',$request->valor));

            if($customer_service['valor'] <= '0' || $customer_service['valor'] === null){
                return redirect()->back()
                    ->with([toast()->info('É necessário escolher pelo menus um serviço')])
                    ->withInput();
            }

            CustomerService::create($customer_service);

            DB::commit();


        }catch(\Exception $e){
            DB::rollback();
            return redirect()->back()
                ->with([toast()->error($e->getMessage())])
                ->withInput();

        }

        return redirect()->back()
        ->with([toast()->success('Atendimento registrado com sucesso!')]);
    }
    public function edit($ordem){
        $employer = Employer::all();
        $payments = PaymentMethod::all();
        $account = AccountBook::selectcaix();

        $select = DB::table('customer_services')
        ->join('customers','customers.id','=','customer_services.cust_id')
        ->join('employers','employers.id','=','customer_services.resp_id')
        ->select('customer_services.*',
                'employers.nome as e_nome',
                'customers.nome as c_nome',
                )
        ->where('customer_services.ordem',$ordem)
        ->get();

        return view('customers.service.edit_customer_service')->with([
            'employers'=>$employer,
            'payment_methods'=>$payments,
            'customer_services'=>$select,
            'account' => $account,
            ]);

    }
    

    public function update($ordem)
    {
        try{
            $customer_service = CustomerService::find($ordem);
            $customer_service->update($request->all());

        }catch(\Exception $e){
            return redirect()->back()->with([toast()->error($e->getMessage())]);
        }

        return redirect()->back()->with([toast()->info('Atualização de serviço realizada com sucesso!')]);
    }
}

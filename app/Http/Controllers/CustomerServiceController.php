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
use App\Models\Payments;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CustomerServiceController extends Controller
{
    public function show(){
        $employer = Employer::all();
        $payments = PaymentMethod::all();

        $select = CustomerService::getService();
     //   dd($select);die;
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

            $request_all = $request->all();
            $request_all['service_id'] = collect($request->service_id);
            $request_all['valor'] = 0;
            $request_all['descricao'] = [];

       //     dd($request_all['service_id']);die;

            foreach($request->service_id as $id) {
                $request_all['valor'] += Service::Where('id',$id)->sum('valor');
                $request_all['descricao'][] = Service::Where('id',$id)->select('descricao')->get();

                foreach([$request_all['descricao']] as $i => $descricao){
                    $nota[$i] = [
                        "Servicos" => $descricao,
                    ];
                }
            };

            $request_all['descricao'] = Str::remove(['Servicos',']','[[{','}}','[','{""','}',',"descricao",','{"descricao",','"'],str_replace(':',',',collect($nota)));
            CustomerService::create($request_all);

          //  $customer_service['valor'] = $valor;
           /*
            $customer_service['valor'] = Str::remove(['R$',' '],str_replace(',','.',$request->valor));

            if($customer_service['valor'] <= '0' || $customer_service['valor'] === null){
                return redirect()->back()
                    ->with([toast()->info('É necessário escolher pelo menus um serviço')])
                    ->withInput();
            }
            */

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
        $accountbook = AccountBook::selectcaix();

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
            'accountbook' => $accountbook,
            ]);

    }


    public function update(Request $request,$ordem)
    {
        try{
            $customer_service = CustomerService::find($ordem);
            $customer_service->update($request->all());

        }catch(\Exception $e){
            return redirect()->back()->with([toast()->error($e->getMessage())]);
        }

        return redirect()->back()->with([toast()->info('Atualização de serviço realizada com sucesso!')]);
    }

    public function payment(Request $request) {
        try{
            DB::beginTransaction();
            $ordem = $request->customer_services_id;

            $identpay = [];
            $identpay = CustomerService::where('ordem',$ordem)->get();

            foreach($identpay as $identpay){
                if($identpay->status == 'C') {
                    return redirect()->back()->with([toast()->info('Baixa de pagamento já registrada!')]);
                }
            }
            $payment['valor'] = str_replace(',','.',$request->valor);

            if($request->cortesia == "Sim") {
                $payment['valor'] = 0;
            }

            // Verificando se o pagamento já existe.
          //  dd($payment,$select_pay);die;

            Payments::create($request->all());
            CustomerService::where('ordem',$request->customer_services_id)
                            ->update(['status' => 'C']);

        }catch(\Exception $ex){
            DB::rollback();

            return redirect()->back()->with([toast()->error($ex->getMessage())]);
        }
        DB::commit();
        return redirect()->route('customer_service')->with([toast()->success('Baixa realizada com sucesso!')]);
    }

}

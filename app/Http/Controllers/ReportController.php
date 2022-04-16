<?php

namespace App\Http\Controllers;

use App\Models\CustomerService;
use App\Models\Payments;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function searchPayment(Request $request)
    {
        
        try{

            $dt_inicial = $request->dt_inicial;
            $dt_final = $request->dt_final;
            $service_id = $request->service_id;
            $cep = $request->cep;

            if(empty($dt_inicial)){
                $dt_inicial= '1900-08-07%';
            }
            if(empty($dt_final)){
                $dt_final = date('Y-m-d');
            }

            if(empty($service_id)){
                $service_id = '%';
            }
            if(empty($cep)){
                $cep = '%';
            }

            $report = Payments::with(['customerservices'])
            ->join('customer_services','customer_services_id','=','customer_services.ordem')
            ->join('customers','cust_id','=','customers.id')
            ->select('payments.*','customers.nome','customer_services.descricao')
            ->where([
                ['customers.cep','like', $cep],
                ['customer_services.service_id','like','%'.$service_id.'%']
            ])
            ->get();  

            if($report->count() < 1){
                return redirect()->back()->with([toast()->info('Pesquisa não retornou resultados')->autoClose(40000)]);
            }

        }catch(\Exception $ex){
            return redirect()->back()->with([toast()->error($ex->getMessage())]);
        }

        return PDF::loadview('pdf.payment_report',[
            'report' => $report,
        ])
            ->setPaper('a4','landscape')
            ->stream('relatorio-pagamentos.pdf');

    }
}

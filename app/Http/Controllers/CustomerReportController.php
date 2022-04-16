<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Employer;
use App\Models\Service;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CustomerReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // Para o menu relatório archives/customer_reports
    public function index()
    {

      try{

        $aniversariantes = Customer::aniversariantes();
        $services = Service::all();
        $employers = Employer::all();

      //  return view('archives.customer_report')->with($aniversariantes);

        }catch(\Exception $ex){
            return redirect()->back()->with([toast()->error($ex->getMessage())]);
        }

        return view('archives.customer_report',[
            'services' => $services,
            'employers' => $employers
        ])->with($aniversariantes);
    }

    public function report(Request $request)
    {
        try{

            $report = $request->all();

            $bd_data_inicio = $request->bd_data_inicio;
            $bd_data_fim = $request->bd_data_fim;
            $data_inicio = $request->data_inicio;
            $data_fim = $request->data_fim;
            $aquisicao = $request->aquisicao;
            $profissionais = $request->profissionais;
            $cep = $request->cep;

            if(empty($bd_data_inicio)){
                $bd_data_inicio = '1900-08-07%';
            }
            if(empty($bd_data_fim)){
                $bd_data_fim = date('Y-m-d');
            }
            if(empty($data_inicio)){
                $data_inicio = '1900-08-07%';
            }
            if(empty($data_fim)){
                $data_fim = date('Y-m-d');
            }
            if(empty($aquisicao)){
                $aquisicao = '%';
            }
            if(empty($profissionais)){
                $profissionais = '%';
            }
            if(empty($cep)){
                $cep = '%';
            }

            $customers = Customer::with(['customerservices'])
            ->join('employers','resp_id','=','employers.id')
            ->join('customer_services','cust_id','=','customers.id')
            ->select('customers.*',
                    'customers.nome as name',
                    'customers.cadastro',
                    'employers.nome',
                    'customer_services.service_id')
            ->whereBetween('nascimento', [$bd_data_inicio, $bd_data_fim])
            ->whereBetween('customers.cadastro', [$data_inicio, $data_fim])
            ->where([
                ['customers.cep','like', $cep],
                ['service_id','like','%'.$aquisicao.'%'],
                ['employers.id','like',$profissionais]

            ])
            ->get();
            
            if($customers->count() < 1){
                return redirect()->back()->with([toast()->info('Pesquisa não retornou resultados')->autoClose(40000)]);
            }
            }catch(\Exception $ex){
                return redirect()->back()->with([toast()->error($ex->getMessage())]);
            }
            return PDF::loadview('pdf.customer_report',[
                'customers' => $customers,
            ])
                ->setPaper('a4','landscape')
                ->stream('relatorio-clientes.pdf');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

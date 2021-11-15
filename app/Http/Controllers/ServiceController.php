<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Http\Controllers\Controller;
use App\Http\Resources\ServiceResource;
use Illuminate\Http\Request;
use Alert;
use Illuminate\Support\Str;

class ServiceController extends Controller
{

    public function index()
    {
        $services = ServiceResource::collection(Service::all());
        return view('registers.service.service',compact('services'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $services = $request->all();
        $services['valor'] = Str::remove(',',$request->valor);
        Service::create($services);

        return redirect()->back()->with([toast()->success('Novo serviço criado com sucesso!')]);
    }


    public function show(Service $service)
    {
        //
    }


    public function edit($id)
    {
        $services = ServiceResource::collection(Service::all());
        $service = Service::findOrfail($id);

        if($service->count()){
            return view('registers.service.edit_service',compact('services','service'));
        }
        else{
            return redirect()->back()->with([toast()->info('Serviço não localizado')]);
        }
    }


    public function update(Request $request,$id)
    {
        $service = Service::findOrfail($id);
        $update = $request->all();
        $update['valor'] = Str::remove(',',$request->valor);

        $service->update($update);

        return redirect()->back()->with([toast()->info('Cadastro de serviço atualizado com sucesso!')]);
    }


    public function destroy($id)
    {
        $service = Service::findOrfail($id);
        $service->delete();

        return redirect()->route('services')->with([Toast()->Info('Serviço Excluído com sucesso!')]);
    }
}

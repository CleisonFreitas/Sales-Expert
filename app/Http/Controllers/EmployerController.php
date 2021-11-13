<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployerRequest;

//use Illuminate\Http\Request;

use App\Models\Employer;

use RealRashid\SweetAlert\Facades\Alert;


class EmployerController extends Controller
{
    public function show(){
        $employer = Employer::all();
        return view('registers.employer.employer')->with('employers',$employer);
    }

    public function create(EmployerRequest $request){
        $employer = Employer::create($request->all());

        if($employer == true){
            return redirect()->route('employer')->withToastSuccess('Cadastro de profissional realizado com sucesso!');
        }else{
            return redirect()->back()->withToastError('Erro ao tentar cadastrar novo profissional!')->withInput();
        }
    }
    public function edit($id){
        $employers = Employer::all()->where('id',$id);
        return view('registers.employer.edit_employer')->with('employers',$employers,$id);
    }
    public function updt(EmployerRequest $request,$id){
        $employer = Employer::find($id);
        $employer->update($request->all());
        return redirect()->route('employer')->withToastSuccess('Cadastro atualizado com sucesso');
    }
    public function warning($id){
        $employer = Employer::find($id);
        Alert::alert()->html('Aviso'," Você está prestes a excluir esse cadastro!
        <br>Tem certeza que deseja fazer isso?<br>
        <br><a class='btn btn-danger' href='/employer/delete/$id')}}'>Sim</a>&nbsp;
        <a class='btn btn-secondary' href='/employer/edit/$id'>Não</a><br>",'warning')
        ->autoClose(20000);
        return redirect()->back();
    }
    public function delete($id){
        $employer = Employer::find($id);
        $employer->delete();
        return redirect()->route('employer')->withToastSuccess('Cadastro excluído com sucesso!');

    }
}

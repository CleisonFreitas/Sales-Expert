<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Employer;

use RealRashid\SweetAlert\Facades\Alert;

class EmployerController extends Controller
{
    public function show(){
        $employer = Employer::all();
        return view('registers.employer.employer')->with('employers',$employer);
    }

    public function create(Request $request){
        $employer = Employer::create($request->all());

        if($employer == true){
            Alert::toast('Cadastro de funcionário realizado com sucesso!','success');
            return redirect()->route('employer');
        }else{
        Alert::toast('Erro ao tentar realizar cadastro de funcionário','error');
        return redirect()->back();
        }
    }
}

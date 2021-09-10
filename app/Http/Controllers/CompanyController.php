<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\Http\Requests\CompanyRequest;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Company;

class CompanyController extends Controller
{
    public function show(){
        $company = Company::all()->where('id',1);
        if(count($company) > 0){
            return view('registers.company.company_edit')->with('company',$company);
        }
            return view('registers.company.company');
    }
    public function register(CompanyRequest $request){
        $company = Company::create($request->all());
        if($company == false){
            Alert::toast('Erro ao tentar realizar o cadastro!','error');
            return redirect()->back();
        }
        Alert::toast('Cadastro empresa realizado com sucesso!','success');
        return redirect()->route('company');
    }
    public function update(CompanyRequest $request,$id){
        
        if(!$company = Company::find($id)) {
            return redirect()->back();
        }
        $company->update($request->all());
        if($company == false){
            Alert::toast('Erro ao tentar atualizar cadastro!', 'error');
            return redirect()->back();
        }
        Alert::toast('Atualizando registro','success')->timerProgressBar();
       // Alert::toast('Cadastro atualizado com sucesso!', 'success')->background('#145');
       return redirect()->route('company');
    }


}

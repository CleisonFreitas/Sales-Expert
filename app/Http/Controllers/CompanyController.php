<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\Http\Requests\CompanyRequest;
use App\Models\Company;

class CompanyController extends Controller
{
    public function show(){
        $company = Company::all()->where('id',1);
        if(isset($company)){
            return view('registers.company.company_edit')->with('company',$company);
        }
        return view('registers.company.company');
    }
    public function register(CompanyRequest $request){
        Company::create($request->all());
        $sessao = session()->flash('sucesso',"mensagem!");
        return redirect()->route('company')->with($sessao);
    }
    public function update(CompanyRequest $request,$id){
        
        if(!$company = Company::find($id)) {
            return redirect()->back();
        }
        $company->update($request->all());
        $sessao = session()->flash('sucesso',"mensagem");
        return redirect()->route('company')->with($sessao);
    }
}

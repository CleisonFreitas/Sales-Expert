<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;

use App\Http\Requests\SupplierRequest;

use App\Models\Supplier;

use RealRashid\SweetAlert\Facades\Alert;

class SupplierController extends Controller
{
    public function show(){
        $suppliers = Supplier::all();
        return view('registers.supplier.supplier')->with('suppliers',$suppliers);
    }
    public function create(SupplierRequest $request){
        $suppliers = Supplier::create($request->all());

        if($suppliers == false){
            return redirect()->route('supplier')->withError('Erro ao tentar cadastrar novo fornecedor!');
        }
        return redirect()->route('supplier')->withSuccess('Novo fornecedor cadastrado com sucesso!');
    }
    public function edit($id){
        $suppliers = Supplier::all()->where('id',$id);
        return view('registers.supplier.edit_supplier')->with('suppliers',$suppliers);
    }
    public function updt(SupplierRequest $request,$id){
        $suppliers = Supplier::find($id);
        $suppliers->update($request->all());
        
        if($suppliers == true){
            return redirect()->route('supplier_edit',$id)->withSuccess('Cadastro de Fornecedor atualizado com Sucesso!');
        }
        return redirect()->back()->withError('Erro ao tentar atualizar cadastro de fornecedor');
    }
    public function warning($id){
        $supplier = Supplier::find($id);
        Alert::alert()->html('Aviso'," Você está prestes a excluir esse cadastro! 
        <br>Tem certeza que deseja fazer isso?<br>
        <br><a class='btn btn-danger' href='/supplier/delete/$id')}}'>Sim</a>&nbsp;
        <a class='btn btn-secondary' href='/supplier/edit/$id'>Não</a><br>",'warning')
        ->autoClose(20000);
        return redirect()->back();
    }
    public function delete($id){
        $supplier = Supplier::find($id);
        $supplier->delete();

        if($supplier == false){
            return redirect()->back()->withError('Erro ao tentar excluir cadastro de fornecedor');
        }
            return redirect()->route('supplier')->withSuccess('Exclusão de Fornecedor realizado com sucesso!');
        }

    }

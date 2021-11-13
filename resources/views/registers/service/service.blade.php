@extends('layouts.main')

@section('title','Service Register')

@section('content')
<div class="card shadow mt-3 mb-4 text-danger">
    <div class="card-header py-1">
        <div class="row">
            <div class="col-12 col-sm-6 col-lg-6">
                <h2 class="text-gray-600 mt-2">Serviços</h2>
            </div>
        </div>
    </div>
    <div class="card-body">
        <form action="#" method="post">
            @csrf
            <div class="row mt-3">
                <div class="col-12 col-sm-12 col-lg-12">
                    <label for="descrição">Descrição:</label>
                    <input type="text" name="descricao" id="" class="form-control" placeholder="Descrição do Serviço">
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-12 col-sm-4 col-lg-3">
                    <label for="status">Status:</label>
                    <select name="status" id="" class="custom-select">
                        <option value="Ativo">Ativo</option>
                        <option value="Inativo">Inativo</option>
                    </select>
                </div>
                <div class="col-12 col-sm-3 col-lg-3">
                    <label for="valor">Valor:</label>
                    <input type="text" name="valor" id="" class="form-control">
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-12 col-sm-12 col-lg-12">
                    <label for="observacao">Observação:</label>
                    <textarea name="observacao" class="form-control" id="" cols="5" rows="5"></textarea>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-12">
                    <button type="submit" class="btn btn-danger">Gravar</button>
                    <button type="reset" class="btn btn-secondary">Novo</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection

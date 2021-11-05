@extends('layouts.main')

@section('title','Lançamentos')

@section('content')

<div class="card shadow mt-3">
    <div class="card-header py-1">
        <h2 class="mb-4 text-gray-800 mt-2">Lançamento de Contas</h2>
    </div>
    <div class="card-body text-danger">
        <div class="card-header bg-gray-300">
            <h5 class="m-0 font-weight-bold text-secondary">Gerenciamento de Contas</h5>
        </div>
        <form action="#" method="POST" class="">
            @csrf
            <div class="row mt-3">
                <div class="col-12 col-sm-8 col-lg-3">
                    <label for="operador">Operador:</label>
                    <input type="text" name="login" id="" value="{{ Auth::user()->name;}}" class="form-control" readonly>
                </div>
                <div class="col-12 col-sm-8 col-lg-3">
                    <label for="data">Data:</label>
                    <input type="date" name="dt_register" id="" value="{{ Date('Y-m-d') }}" class="form-control">
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-12 col-sm-12 col-lg-12">
                    <label for="caixa">Caixa:</label>
                    <select name="caixa" id="" class="custom-select">
                        <option value="#">001 - Caixa de Vendas</option>
                        <option value="#">002 - Caixa de Manutenção</option>
                    </select>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-12 col-sm-6 col-lg-6">
                    <label for="conta">Conta:</label>
                    <input type="text" name="conta" list="contas" id="conta" class="form-control" placeholder="Clique para pesquisar">
                    <datalist id="contas">
                        <option value="Gasolina">
                        <option value="Alimentação">
                    </datalist>
                </div>
                <div class="col-12 col-sm-6 col-lg-6">
                    <label for="forma">Forma de Pagamento:</label>
                    <input type="text" name="formas" list="formas" id="forma" class="form-control" placeholder="Clique para pesquisar">
                    <datalist id="formas">
                        <option value="Dinheiro">
                        <option value="Cartão de Crédito">
                        <option value="Cartão de Débito">
                        <option value="Crédito em conta">
                        <option value="Pix">
                        <option value="Boleto">
                    </datalist>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-6 col-sm-4 col-lg-2">
                    <label for="qtd_parcelas">Parcela(s)</label>
                    <input type="text" name="" id="" pattern="[1-12]" class="form-control">
                    <small class="text-form text-muted text-secondary">*Valores de 1 à 12</small>
                </div>
                <div class="col-6 col-sm-4 col-lg-2">
                    <label for="qtd_parcelas">Crédito</label>
                    <input type="text" name="credito" id="" pattern="[1-100]" class="form-control">
                    <small class="text-form text-muted">*Dias para Crédito</small>
                </div>
                <div class="col-6 col-sm-4 col-lg-2">
                    <label for="valor">Valor:</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <button class="btn btn-dark">R$</button>
                        </div> 
                        <input type="text" name="valor" id="valor" class="form-control">         
                    </div>    
                </div>
            </div>
            <div class="row mt-3">
                <div class="col">
                    <label for="observacao">Observação:</label>
                    <textarea name="note" id="note" cols="30" rows="1" maxlength="100" class="form-control"></textarea>
                    <small class="text-form text-muted text-secondary">*Até 100 caractéres no máximo</small>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col">
                    <button type="submit" class="btn btn-danger">Gravar</button>
                    <button type="reset" class="btn btn-secondary">Limpar</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
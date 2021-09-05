@extends('/layouts/main')

@section('title','Relatório de Pagamentos')

@section('content')

<div class="card shadow mt-3 mb-1">
    <div class="card-header py-1">
        <h2 class="mb-4 text-gray-800 mt-2">Relatório de Pagamentos</h2>
    </div>
    <div class="card-body text-danger">
        <form action="#" method="POST" class="">
            @csrf
            <div class="row mt-3">
                <div class="col-12 col-sm-12 col-lg-6"><!-- Início da divisão -->

                    <div class="row">
                        <div class="col-12 col-sm-12 col-lg-6">
                            <label for="dt_inicial">Data inicial</label>
                            <input type="date" name="dt_inicial" id="" class="form-control">
                        </div>
                        <div class="col-12 col-sm-12 col-lg-6">
                            <label for="dt_inicial">Data final</label>
                            <input type="date" name="dt_final" id="" class="form-control">                           
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <small class="text-form text-muted">*Período de pagamento inicial e final</small>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-12 col-sm-12 col-lg-6">
                            <label for="srv-prod">Produto:</label>
                            <input type="text" name="dt_inicial" id="" class="form-control">
                        </div>
                        <div class="col-12 col-sm-12 col-lg-6">
                            <label for="srv-prod">Serviço:</label>
                            <input type="text" name="dt_inicial" id="" class="form-control">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-12 col-sm-12 col-lg-6">
                            <label for="cidade">Cidade:</label>
                            <input type="text" name="cidade" id="city" class="form-control">
                        </div>
                        <div class="col-12 col-sm-12 col-lg-6">
                            <label for="district">Bairro:</label>
                            <input type="text" name="district" id="district" class="form-control">
                        </div>
                    </div>

                </div><!-- Fim da divisão -->

                <div class="col-12 col-sm-12 col-lg-6"><!-- Início da segunda divisão -->

                    <div class="row">
                        <div class="col-12 col-sm-12 col-lg-12">
                            <label for="caixa">Nome do Caixa:</label>
                            <input type="text" name="caixa" id="" class="form-control" placeholder="Ex: Caixa Vendas">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-12 col-lg-12">
                            <small class="text-form text-muted">*Digite o nome do caixa</small>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-12 col-sm-12 col-lg-6">
                            <label for="lot_caix">Lote do caixa:</label>
                            <input type="text" name="" id="" class="form-control" placeholder="Ex: 003">
                        </div>
                        <div class="col-12 col-sm-12 col-lg-6">
                            <label for="lot_caix">Ano do Caixa:</label>
                            <input type="text" name="lot_caix" id="" value="" class="form-control" placeholder="Ex: {{ date('Y') }}">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-12 col-sm-12 col-lg-12">
                            <label for="valores">Valores entre:</label>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-12 col-lg-6">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="btn btn-dark">R$</span>
                                    </div>
                                    <input type="text" name="" id="valorMenor" class="form-control">
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-lg-6">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="btn btn-dark">R$</span>
                                    </div>
                                    <input type="text" name="" id="valorMaior" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- Fim da segunda divisão -->
            </div>
            <div class="row mt-2">
                <div class="col">
                    <small class="text-form text-secondary">*Opções de relatório</small>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col">
                    <button class="btn bg-gray-400">Excel&nbsp; <img src="https://img.icons8.com/ios-filled/30/000000/ms-excel.png"/></button>
                    <button class="btn bg-gray-400">PDF&nbsp; <img src="https://img.icons8.com/ios-filled/30/000000/pdf--v2.png"/></button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
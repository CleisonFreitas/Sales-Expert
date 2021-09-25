@extends('/layouts/main')

@section('title','Customer Service')

@section('content')

    <div class="card shadow mt-3 mb-4">
        <div class="card-header py-1">
            <div class="row">
                <div class="col-12 col-sm-6 col-lg-6">
                    <h2 class="text-gray-600 mt-2">Procedimento</h2>
                </div>
                <div class="col-12 col-sm-12 col-lg-6">
                    <nav class="mx-auto mt-2">
                        <ul class="nav nav-pills justify-content-end" id="pills-tab" role="tablist">

                            <li class="nav-item" role="presentation">
                                <a class="nav-link active btn-sm" id="nav-home-ta" data-toggle="pill" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Novo</a>
                            </li>

                            <li class="nav-item" role="presentation">
                                <a class="nav-link btn-sm" id="nav-prdserv-tab" data-toggle="pill" href="#nav-prdserv" role="tab" aria-controls="nav-prdserv" aria-selected="false">Produto/Serviço</i></a>
                            </li>

                            <li class="nav-item" role="presentation">
                                <a class="nav-link btn-sm" id="nav-parc-tab" data-toggle="pill" href="#nav-parc" role="tab" aria-controls="nav-parc" aria-selected="false">Lançamento de Parcelas</i></a>
                            </li>
                            
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <div class="card-body text-danger">
            <div class="card-header bg-gray-300 ">
                <h5 class="m-0 font-weight-bold text-secondary">Registrar novo atendimento</h5>
            </div>
            <form action="{{ route('service_create') }}" method="POST">
                @csrf
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="row mt-3">
                            <div class="col-12 col-sm-8 col-lg-3">
                                <label for="st_date">Cadastro:</label>
                                <input type="date" name="cadastro" value="{{ date('Y-m-d') }}"  id="" class="form-control">
                            </div>
                            <div class="col-12 col-sm-8 col-lg-3">
                                <label for="status">Status:</label>
                                <select name="status" id="" class="custom-select">
                                    <option value="P">Pendente</option>
                                    <option value="C">Concluído</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12 col-sm-6 col-lg-2">
                                <label for="id">Ordem:</label>
                                <input type="text" name="id" id="" class="form-control bg-gray-300" readonly>
                            </div>
                            <div class="col-12 col-sm-6 col-lg-3">
                                <label for="dt_concl">Conclusão:</label>
                                <input type="date" name="conclusao" value="" id="" class="form-control">
                            </div>
                            <div class="col-12 col-sm-6 col-lg-3">
                                <label for="st_hour">Horário:</label>
                                <input type="text" name="hora_agend" value="{{ date('H:i:s') }}" id="" class="form-control">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12 col-sm-12 col-lg-12">
                                <label for="service">Responsável pelo atendimento:</label>
                                <select name="resp_id" id="" class="custom-select">
                                    <option>Selecionar</option>
                                    @foreach ($employers as $e)
                                        <option value="{{ $e->id }}">{{ $e->p_nome }}</option>
                                    @endforeach
                                </select>
                                <small class="form-text text-secondary">*Campo obrigatório</small>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <label for="customer">Cliente:</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-4 col-lg-2">
                                <input type="text" name="cust_id" id="" value="{{ $customers->id }}" class="form-control" readonly>
                            </div>
                            <div class="col-12 col-sm-8 col-lg-10">
                                <input type="text" name="ct_nome" value="{{ $customers->nome }}" id="" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12 col-sm-12 col-lg-12">
                                <label for="description">Descrição:</label>
                                <input type="text" name="descricao" maxlength="255" id="" class="form-control">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12 col-sm-12 col-lg-12">
                                <label for="note">Observação:</label>
                                <textarea name="observacao" id="" cols="30" rows="5" class="form-control" maxlength="255"></textarea>
                            </div>      
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <small class="text-secondary">*Necessário informar a forma de pagamento, antes de gravar</small>
                            </div>
                        </div>
                    </div>
                    <!-- Produto/Serviço -->
                    <div class="tab-pane fade" id="nav-prdserv" role="tabpanel" aria-labelledby="nav-prdserv-tab">
                        <div class="row mt-1">
                            <div class="col-12 col-sm-12 col-lg-6 mb-2">

                                <div class="row">
                                    <div class="col">
                                        <label for="forma_pagamento">Forma de Pagamento:</label>
                                        <select name="form_paga_id" id="" class="custom-select">
                                            <option>Selecionar forma de pagamento</option>
                                            @foreach ($payment_methods as $payment)
                                                <option value="{{ $payment->id }}">{{ $payment->descricao }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-12 col-sm-6 col-lg-4">
                                        <label for="cortesia">Cortesia: </label>
                                        <select name="cortesia" id="" class="custom-select">
                                            <option value="N" selected>Não</option>
                                            <option value="S">Sim</option>
                                        </select>
                                    </div>
                                </div>

                            </div>
                            <div class="col-12 col-sm-12 col-lg-6">

                                <div class="row">
                                    <div class="col-12 col-sm-12 col-lg-6">
                                        <label for="valor">Valor:</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="btn btn-secondary">
                                                    R$
                                                </span>
                                            </div>
                                            <input type="text" name="valor" id="valor" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-12 col-lg-6">
                                        <label for="valor">Desconto:</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="btn btn-secondary">
                                                    R$
                                                </span>
                                            </div>
                                            <input type="text" name="desconto" id="desconto" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-12 col-sm-12 col-lg-6">
                                        <label for="total">Total:</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="btn btn-secondary">
                                                    R$
                                                </span>
                                            </div>
                                            <input type="text" name="total" id="" class="form-control" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <button type="submit" class="btn btn-danger">Gravar</button>
                                <button type="reset" class="btn btn-secondary">Limpar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
            
                    <!-- #Produto/Serviço -->

                    <!-- Parcelas 
                    <div class="tab-pane fade" id="nav-parc" role="tabpanel" aria-labelledby="nav-parc">
                        <div class="row mt-3">
                            <div class="col-12 col-sm-12 col-lg-3">
                                <label for="val_total">Valor a lançar:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="btn btn-danger">
                                            R$
                                        </span>
                                    </div>
                                    <input type="text" name="" id="currency" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>-->
@endsection
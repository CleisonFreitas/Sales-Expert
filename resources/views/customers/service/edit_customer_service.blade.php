@extends('layouts.main')

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
                                <a class="nav-link active btn-sm" id="nav-home-ta" data-toggle="pill" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Detalhes</a>
                            </li>

                            <li class="nav-item" role="presentation">
                                <a class="nav-link btn-sm" id="nav-prdserv-tab" data-toggle="pill" href="#nav-prdserv" role="tab" aria-controls="nav-prdserv" aria-selected="false">Pagamento</i></a>
                            </li>

                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <div class="card-body text-danger">
            <div class="card-header bg-gray-300 ">
                <h5 class="m-0 font-weight-bold text-secondary">Atendimento</h5>
            </div>
            @foreach ($customer_services as $c )
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <form action="{{ route('customer_service_update',$c->ordem) }}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="row mt-3">
                                <div class="col-12 col-sm-8 col-lg-3">
                                    <label for="st_date">Cadastro:</label>
                                    <input type="date" name="cadastro" value="{{ date('Y-m-d',strtotime($c->cadastro)) }}"  id="" class="form-control">
                                </div>
                                <div class="col-12 col-sm-8 col-lg-3">
                                    <label for="status">Status:</label>
                                    <select name="status" id="" class="custom-select">
                                        @switch($c->status)
                                            @case('R')
                                            <option value="R" selected>Remarcado</option>
                                                @break
                                            @case('C')
                                            <option value="C" selected>Concluído</option>
                                                @break
                                            @default
                                            <option value="P">Pendente</option>
                                        @endswitch
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-12 col-sm-6 col-lg-2">
                                    <label for="id">Ordem:</label>
                                    <input type="text" name="customer_services_id" id="" value="{{ $c->ordem }}" class="form-control bg-gray-300" readonly>
                                </div>
                                <div class="col-12 col-sm-6 col-lg-3">
                                    <label for="dt_concl">Agendado para:</label>
                                    <input type="date" name="data_agend" value="{{ date('Y-m-d',strtotime($c->data_agend)) ?? date('Y-m-d',strtotime(old('data_agend'))) }}" id="" class="form-control">
                                </div>
                                <div class="col-12 col-sm-6 col-lg-3">
                                    <label for="st_hour">Horário:</label>
                                    <input type="text" name="hora_agend" value="{{ date('H:i',strtotime($c->hora_agend)) }}" id="hora_id" class="form-control" maxlength="5" onkeyup="mask_hora();" required placeholder="12:00" pattern="[0-9,:]{5}">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-12 col-sm-12 col-lg-12">
                                    <label for="service">Responsável pelo atendimento:</label>
                                    <select name="resp_id" id="" class="custom-select">
                                        <option value="{{ $c->resp_id }}" selected>{{ $c->e_nome }} (Atual)</option>
                                        @foreach ($employers as $e)
                                            <option value="{{ $e->id }}">{{ $e->nome }}</option>
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
                                    <input type="text" name="cust_id" id="" value="{{ $c->cust_id }}" class="form-control" readonly>
                                </div>
                                <div class="col-12 col-sm-8 col-lg-10">
                                    <input type="text" name="ct_nome" value="{{ $c->c_nome }}" id="" class="form-control" readonly>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                    <label for="description">Serviços:</label>
                                    <input type="text" value="{{ $c->descricao }}" name="" id="" class="form-control" readonly>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-12 col-sm-12 col-lg-12">
                                    <label for="note">Observação:</label>
                                    <textarea name="observacao" id="" cols="30" rows="5" class="form-control" maxlength="255">{{ $c->observacao }}</textarea>
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
                    <!-- Produto/Serviço -->
                    <div class="tab-pane fade" id="nav-prdserv" role="tabpanel" aria-labelledby="nav-prdserv-tab">
                        <form action="{{ route('service_payment') }}" method="POST">
                            @csrf
                            <input type="hidden" name="customer_id" value="{{ $c->cust_id }}"><!-- ID do cliente -->
                            <input type="hidden" name="customer_services_id" value="{{ $c->ordem }}"><!-- ID do cliente -->
                            <div class="row mt-1">
                                <div class="col-12 col-sm-8 col-lg-12">
                                    <label for="caixa">Caixa:</label>
                                    <select name="caix_ref" id="" class="custom-select">
                                        @foreach ($accountbook as $accountbook)
                                            <option value="{{ $accountbook->id }}">{{ $accountbook->id }} - {{ $accountbook->descricao }} - {{ date('d/m/Y', strtotime($accountbook->data_aber)) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row mt-1">
                                <div class="col-12 col-sm-12 col-lg-6 mb-2">

                                    <div class="row">
                                        <div class="col">
                                            <label for="forma_pagamento">Forma de Pagamento:</label>
                                            <select name="form_paga_id" id="" class="custom-select">
                                                @foreach ($payment_methods as $payment)
                                                    <option value="{{ $payment->id }}">{{ $payment->descricao }}</option>
                                                @endforeach
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
                                                <input type="text" name="valor" value="{{ number_format($c->valor,2,',','.') }}" id="valor" class="form-control" readonly>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6 col-lg-6">
                                            <label for="cortesia">Cortesia: </label>
                                            <select name="cortesia" id="" class="custom-select">
                                                <option value="Não" selected>Não</option>
                                                <option value="Sim">Sim</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-1">
                                <div class="col">
                                    <small class="text-muted">*Nota: Marcar Cortesia como "Sim" automaticamente irá zerar o valor a ser cobrado no caixa.</small>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col">
                                    @if ($payment_accept->count())
                                        @foreach ($payment_accept as $p)
                                            <a href="{{ route('service_payment_warning',$p->id) }}" class="btn btn-danger">Excluir</a>
                                        @endforeach
                                    @else
                                        <button type="submit" class="btn btn-danger">Baixar</button>
                                    @endif
                                    
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            @endforeach

        </div>
    </div>

@endsection

@extends('layouts.main')

@section('title','Customer Service')


@section('content')

    <div class="card shadow mt-3 mb-4">
        <div class="card-header py-1">
            <div class="row">
                <div class="col-12 col-sm-6 col-lg-6">
                    <h2 class="text-gray-600 mt-2">Procedimento</h2>
                </div>
                <!--
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
                </div>-->
            </div>
        </div>
        <div class="card-body text-danger">
            <div class="card-header bg-gray-300 ">
                <h5 class="m-0 font-weight-bold text-secondary">Registrar novo atendimento</h5>
            </div>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <form action="{{ route('customer_service_create') }}" method="POST">
                            @csrf
                            <div class="row mt-3">
                                <div class="col-12 col-sm-8 col-lg-3">
                                    <label for="st_date">Cadastro:</label>
                                    <input type="date" name="cadastro" value="{{ date('Y-m-d') }}"  id="" class="form-control">
                                </div>
                                <div class="col-12 col-sm-8 col-lg-3">
                                    <label for="status">Status:</label>
                                    <select name="status" id="" class="custom-select">
                                        <option value="P">Pendente</option>
                                        <option value="R">Resolvido</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-12 col-sm-6 col-lg-2">
                                    <label for="id">Ordem:</label>
                                    <input type="text" name="id" id="" class="form-control bg-gray-300" readonly>
                                </div>
                                <div class="col-12 col-sm-6 col-lg-3">
                                    <label for="dt_concl">Agendar para:</label>
                                    <input type="date" name="data_agend" value="" id="" class="form-control" required>
                                </div>
                                <div class="col-12 col-sm-6 col-lg-3">
                                    <label for="st_hour">Horário:</label>
                                    <input type="text" name="hora_agend" value="{{ old('hora_agend') }}" id="hora_id" class="form-control" maxlength="5" onkeyup="mask_hora();" required placeholder="12:00" pattern="[0-9,:]{5}">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-12 col-sm-12 col-lg-12">
                                    <label for="service">Responsável pelo atendimento:</label>
                                    <select name="resp_id" id="" class="custom-select" required>
                                        <option>Selecionar</option>
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
                                <div class="col-4 col-sm-4 col-lg-2">
                                    <input type="text" name="cust_id" id="" value="{{ $customers->id ?? old('cust_id')}}" class="form-control" readonly>
                                </div>
                                <div class="col-8 col-sm-8 col-lg-10">
                                    <input type="text" name="ct_nome" value="{{ $customers->nome ?? old('ct_nome') }}" id="" class="form-control mr-2" readonly>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-12 col-sm-12 col-lg-12">
                                    <label for="description">Descrição do tratamento:</label>
                                    <input type="text" name="descricao" id="" class="form-control" value="{{ old('descricao') }}" maxlength="100" required>
                                </div>
                            </div>
                            <div class="row mt-1">
                                <div class="col-12 col-sm-6 col-lg-3">
                                    <!-- Button trigger modal -->
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                          <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#servico" id="basic-addon1"><i class="far fa-list-alt" title="Selecionar Serviços"></i></button>
                                        </div>
                                        <input type="text" class="form-control" placeholder="60,00" aria-label="valor" name="valor" id="valor" value="R$ 0,00" aria-describedby="basic-addon1" readonly>
                                    </div>

                                        <!-- Modal -->
                                        <div class="modal fade " id="servico" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="servicoLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-scrollable">
                                                <div class="modal-content text-secondary">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="servicoLabel">Serviços</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col">
                                                                <label for="lista">Lista de Serviços</label>
                                                                @foreach ($services as $service)
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input" id="check{{ $service->id }}" name="services" value="{{ $service->valor }}">
                                                                    <label class="custom-control-label" for="check{{ $service->id }}">{{ $service->descricao }} - R$ {{ str_replace('.',',',$service->valor) }}</label>
                                                                </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Ok</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <!-- #Modal -->
                                </div>
                            </div>
                            <div class="row mt-1">
                                <div class="col">
                                    <small class="text-secondary">*Necessário informar pelo menos um serviço, antes de gravar</small>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-12 col-sm-12 col-lg-12">
                                    <label for="note">Observação:</label>
                                    <textarea name="observacao" id="" cols="30" rows="5" class="form-control" maxlength="255">{{ old('observacao') }}</textarea>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-12 col-sm-12 col-lg-12">
                                    <button type="submit" class="btn btn-danger">Gravar</button>
                                    <button type="reset" class="btn btn-secondary">Novo</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- Produto/Serviço -->
                    <div class="tab-pane fade" id="nav-prdserv" role="tabpanel" aria-labelledby="nav-prdserv-tab">
                        <!-- -->
                    </div>
                </div>
            </div>
    </div>

@endsection

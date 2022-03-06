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
                                    <select name="resp_id" id="resp_id" class="custom-select" required>
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
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                    <label for="description">Serviços:</label>
                                    <select name="service_id[]" class="custom-select" onblur="nomeDisplay()" id="field2" multiple multiselect-search="true" multiselect-select-all="true" >
                                        @foreach ($services as $service)
                                            <option value="{{$service->id}}" id="servico">{{$service->descricao}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row mt-1">
                                <div class="col">
                                    <small class="text-secondary">*Necessário informar pelo menos um serviço, antes de gravar</small>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-12 col-sm-12 col-lg-12">
                                    <label for="note">Descrição:</label>
                                    <textarea name="observacao" id="descricao" cols="30" rows="5" class="form-control" maxlength="255"></textarea>
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

    @section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <script src="{{asset('js/multiselect-dropdown.js')}}"></script>
        <script>

        </script>
    @stop

@endsection

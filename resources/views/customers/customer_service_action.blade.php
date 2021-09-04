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
            <form action="#" method="POST">
                @csrf
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="row mt-3">
                            <div class="col-12 col-sm-8 col-lg-3">
                                <label for="st_date">Cadastro:</label>
                                <input type="date" name="st_date" value="{{ date('Y-m-d') }}"  id="" class="form-control">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12 col-sm-6 col-lg-2">
                                <label for="id">Ordem:</label>
                                <input type="text" name="id" id="" class="form-control bg-gray-300" readonly>
                            </div>
                            <div class="col-12 col-sm-6 col-lg-3">
                                <label for="st_hour">Previsão:</label>
                                <input type="date" name="dt_prev" value="{{ date('Y-m-d') }}" id="" class="form-control">
                            </div>
                            <div class="col-12 col-sm-6 col-lg-3">
                                <label for="st_hour">Horário:</label>
                                <input type="text" name="st_hour" value="{{ date('H:i:s') }}" id="" class="form-control">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12 col-sm-12 col-lg-12">
                                <label for="service">Profissional:</label>
                                <select name="pf_service" id="" class="custom-select">
                                    <option value="#">Jessica Andrade</option>
                                </select>
                                <small class="form-text text-secondary">*Campo obrigatório</small>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12 col-sm-12 col-lg-12">
                                <label for="customer">Cliente:</label>
                                <input type="text" name="ct_id" value="Cleison Freitas" id="" class="form-control">
                                <small class="form-text text-secondary">*Campo obrigatório</small>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12 col-sm-12 col-lg-12">
                                <label for="description">Descrição:</label>
                                <input type="text" name="descr" maxlength="255" id="" class="form-control">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12 col-sm-12 col-lg-12">
                                <label for="note">Observação:</label>
                                <textarea name="note" id="" cols="30" rows="5" class="form-control" maxlength="255"></textarea>
                            </div>      
                        </div>
                    </div>

                    <!-- Produto/Serviço -->
                    <div class="tab-pane fade" id="nav-prdserv" role="tabpanel" aria-labelledby="nav-prdserv-tab">
                        <div class="row mt-4">
                            <div class="col-12 col-sm-12 col-lg-6 mb-2">
                                <div class="row">
                                    <div class="col">
                                        <label for="service">Produto/Serviço:</label>
                                        <select name="prd_serv" id="" class="custom-select" required>
                                            <option value="#">Health Care</option>
                                            <option value="#">Skin Drainage</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col">
                                        <button type="button" class="btn btn-secondary" id="btn2" style="width:100%">Adicionar</button>
                                    </div>
                                </div>
                                <div class="form-group row mt-4">
                                    <div class="col-12 col-sm-12 col-lg-6">
                                        <label for="valor">Valor:</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="btn btn-danger">
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
                                <div class="form-group row mt-3">
                                    <div class="col-12 col-sm-6 col-lg-4">
                                        <label for="cortesia">Cortesia: </label>
                                        <select name="cortesia" id="" value="S" class="custom-select">
                                            <option value="#" selected>Não</option>
                                            <option value="#">Sim</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-lg-6">
                                <div class="card shadow">
                                    <div class="card-header bg-danger">
                                        <h6 class="text-white mt-2 d-flex font-weight-bold">Adicionar/Remover</h6>
                                    </div>
                                    <div class="card-body shadow bg-light">
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <tbody>
                                                    <div id="div1">
                                                    <tr>
                                                        <td>Health Care</td>
                                                        <td>
                                                            <button type="button" class="btn btn-sm btn-danger btn-circle rem" >
                                                                <i class="fas fa-minus"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                </div>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <!-- #Produto/Serviço -->

                    <!-- Parcelas -->
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
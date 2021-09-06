@extends('/layouts/main')

@section('title','Caixa')

@section('content')

<div class="card shadow mt-3">
    <div class="card-header py-1">
        <h2 class="mb-4 text-gray-800 mt-2">Controle de caixa</h2>
    </div>
    <div class="card-body text-danger">
        <div class="card-header bg-gray-300">
            <h5 class="m-0 font-weight-bold text-secondary">Abertura/Fechamento de caixa</h5>
        </div>
        <form action="#" method="POST" class="">
            @csrf
            <div class="row mb-4 mt-2">
                <div class="col-12 col-sm-8 col-lg-3">
                    <label for="dt_procedimento" class="col-form-label">Data:</label>
                    <input type="date" name="dt_procedimento" id="" value="{{ Date('Y-m-d') }}" class="form-control" readonly>
                </div>
                <div class="col-12 col-sm-8 col-lg-2">
                    <label for="hr_procedimento" class="col-form-label">Hora:</label>
                    <input type="text" name="dt_procedimento" id="" value="{{ Date('H:i:s') }}" class="form-control" readonly>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-12 col-sm-12 col-lg-12">
                    <label for="caixa">Caixa</label>
                    <select name="caixa" id="" class="custom-select">
                        <option value="001">Caixa Vendas</option>
                        <option value="002">Caixa Compras</option>
                    </select>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-12 col-sm-12 col-md-12 col-lg-4">
                    <label for="dt_abertura">Data de Abertura:</label>
                    <input type="date" name="" id="" value="{{date('Y-m-d')}}" class="form-control">
                </div>
                <div class="col-12 col-sm-12 col-md-12 col-lg-4">
                    <label for="dt_fechamento">Data de Fechamento:</label>
                    <input type="date" name="" id="" class="form-control">
                </div>
                <div class="col-12 col-sm-6 col-lg-2">
                    <label for="anual">Ano:</label>
                    <input type="text" name="ano_abertura" value="{{date('Y')}}" id="" class="form-control">
                </div>
                <div class="col-12 col-sm-6 col-lg-2">
                    <label for="lote">Lote:</label>
                    <input type="text" name="ano_abertura" id="" class="form-control" readonly>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-12 col-sm-6 col-lg-8">
                    <div class="row mt-3">
                        <div class="col">
                            <small class="text-form text-secondary">*Salvar procedimento</small>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col">
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#abrirCaixa">Abrir</button>
                            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#fecharCaixa">Fechar</button>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="row mt-3">
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
                </div>
                <div class="row">
                    <div class="col">
                        <!-- Modal para abertura de caixa -->
                        <div class="modal fade" id="abrirCaixa" tabindex="-1" aria-labelledby="abrirCaixaLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title text-gray-600" id="abrirCaixaLabel">Abertura de caixa</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <h6 class="text-form text-gray-600">
                                    <i class="fas fa-exclamation-circle mx-3" style="color:red;"></i>
                                        Deseja realmente abrir esse caixa?
                                    </h6>
                                </div>
                                <div class="modal-footer">
                                  <button type="submit" class="btn btn-danger" >Sim</button>
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        <!-- #Abertura de caixa -->
                        <!-- Modal para fechamento de caixa -->
                        <div class="modal fade" id="fecharCaixa" tabindex="-1" aria-labelledby="fecharCaixaLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title text-gray-600" id="fecharCaixaLabel">Fechamento de caixa</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <h6 class="text-form text-gray-600">
                                    <i class="fas fa-exclamation-circle mx-3" style="color:red;"></i>
                                        Deseja realmente fechar esse caixa?
                                    </h6>
                                </div>
                                <div class="modal-footer">
                                  <button type="submit" class="btn btn-danger" >Sim</button>
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        <!-- #Abertura de caixa -->
                    </div>
                </div>

            </div><!-- Fim -->
        </form>
    </div>
</div>



@endsection
<div class="tab-content" id="nav-tabContent">
    <div class="tab-pane fade show active" id="nav-list" role="tabpanel" aria-labelledby="nav-list-tab">
        <div class="table-responsive">
            <table class="table table-hover" id="dataTable" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Caixa</th>
                        <th>Abertura</th>
                        <th>Status</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($allbooks as $book)
                    <tr>
                        <td>{{$book->caixa_id}}</td>
                        <td>{{$book->descricao}}</td>
                        <td>{{date('d/m/Y',strtotime($book->data_aber))}}</td>
                        <td>
                            @if ($book->data_fech)
                                <span class="btn btn-danger btn-sm">Fechado</span>
                            @else
                                <span class="btn btn-info btn-sm">Aberto
                            @endif
                        </td>
                        <td>
                            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_{{$book->caixa_id}}" title="visualizar lançamentos">
                                <i class="fas fa-key"></i>
                            </button>
                        </td>
                    </tr>

                    <!-- Modal -->
                    <div class="modal fade" id="modal_{{$book->caixa_id}}" tabindex="-1" aria-labelledby="modal_{{$book->caixa_id}}Label" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-md">
                            <div class="modal-content">
                                <div class="modal-header" style="text-align: right">
                                    <nav class="mx-auto mt-2" >
                                        <ul class="nav nav-pills justify-content-end" id="pills-tab" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link active btn-sm " id="nav-atendimento-tab" data-toggle="pill" href="#nav-atendimento" role="tab" aria-controls="nav-atendimento" aria-selected="true">ATENDIMENTO</a>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link btn-sm" id="nav-movimentacao-tab" data-toggle="pill" href="#nav-movimentacao" role="tab" aria-controls="nav-movimentacao" aria-selected="false">MOVIMENTAÇÔES</a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                                <div class="modal-body text-secondary">
                                    <div class="tab-content" id="nav-tabContent" style="text-align: left;">
                                        <div class="tab-pane fade show active" id="nav-atendimento" role="tabpanel" aria-labelledby="nav-atendimento-tab">
                                            <div class="row" >
                                                <div class="col col-md-10 col-lg-9">
                                                   <h5><b>Descrição do serviço:</b></h5>
                                                </div>
                                                <div class="col col-md-2 col-lg-3">
                                                    <h5><b>Valor:</b></h5>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                               <div class="col col-md-10 col-lg-9">
                                                   <h6>Limpeza de pele fenômenal de supra</h6>
                                               </div>
                                               <div class="col col-md-10 col-lg-3">
                                                   <h6 class="">R$ 60,00<a href="#" id="delete" style="color:red;"><i class="fas fa-trash-alt mx-2"></i></a></h6>
                                               </div>
                                            </div>
                                            <div class="row">
                                                <div class="col col-md-10 col-lg-9">
                                                    <h6>Clareamento facial</h6>
                                                </div>
                                                <div class="col col-md-10 col-lg-3">
                                                    <h6 class="">R$ 60,00<a href="#" id="delete" style="color:red;"><i class="fas fa-trash-alt mx-2"></i></a></h6>
                                                </div>
                                             </div>
                                        </div>
                                        <div class="tab-pane fade show" id="nav-movimentacao" role="tabpanel" aria-labelledby="nav-movimentacao-tab">
                                            <div class="row" >
                                                <div class="col col-md-10 col-lg-9">
                                                   <h5><b>Lançamento:</b></h5>
                                                </div>
                                                <div class="col col-md-2 col-lg-3">
                                                    <h5><b>Valor:</b></h5>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                               <div class="col col-md-10 col-lg-9">
                                                   <h6></h6>
                                               </div>
                                               <div class="col col-md-10 col-lg-3">
                                                   <h6 class="">{{$book->valor}}<a href="#" id="delete" style="color:red;"><i class="fas fa-trash-alt mx-2"></i></a></h6>
                                               </div>
                                            </div>
                                            <div class="row">
                                                <div class="col col-md-10 col-lg-9">
                                                    <h6>Alimentação funcionário</h6>
                                                </div>
                                                <div class="col col-md-10 col-lg-3">
                                                    <h6 class="">R$ 60,00<a href="#" id="delete" style="color:red;"><i class="fas fa-trash-alt mx-2"></i></a></h6>
                                                </div>
                                             </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times-circle mx-1"></i>Fechar</button>
                                    <button type="button" class="btn btn-danger"><i class="far fa-file-pdf mx-1"></i>Relatório</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- #Fim do Modal -->
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="tab-pane fade show" id="nav-new" role="tabpanel" aria-labelledby="nav-new-tab">
        <div class="card-header bg-gray-300">
            <h5 class="m-0 font-weight-bold text-secondary">Gerenciamento de Contas</h5>
        </div>
        <form action="{{route('posting.account.store')}}" method="POST" class="">
            @csrf
            <div class="row mt-3">
                <div class="col-12 col-sm-8 col-lg-3">
                    <label for="operador">Operador:</label>
                    <input type="text" name="operador" id="" value="{{ Auth::user()->name;}}" class="form-control" readonly>
                </div>
                <div class="col-12 col-sm-8 col-lg-3">
                    <label for="data">Data:</label>
                    <input type="date" name="lancamento" id="" value="{{ Date('Y-m-d') }}" class="form-control">
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-12 col-sm-12 col-lg-12">
                    <label for="caixa">Caixa:</label>
                    <select name="caixa_id" id="" class="custom-select">
                        @foreach ($accountbook as $accountbook)
                            <option value="{{ $accountbook->id }}">{{ $accountbook->id }} - {{ $accountbook->descricao }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-12 col-sm-6 col-lg-6">
                    <label for="conta_id">Conta:</label>
                    <select name="conta_id" id="" class="custom-select">
                        @foreach ($accounts as $account)
                            <option value="{{ $account->id }}">{{ $account->descricao }} - ({{$account->tipo}})</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-12 col-sm-6 col-lg-6">
                    <label for="forma">Forma de Pagamento:</label>
                    <select name="form_pagamento_id" id="" class="custom-select">
                        @foreach ($paymethod as $paymethod)
                            <option value="{{$paymethod->id}}">{{$paymethod->descricao}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12 col-sm-4 col-lg-3">
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
                    <textarea name="observacao" id="note" cols="30" rows="1" maxlength="255" class="form-control"></textarea>
                    <small class="text-form text-muted text-secondary">*Até 255 caractéres no máximo</small>
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

<div class="card-body">
    <div class="card-header bg-gray-300">
        <h5 class="m-0 font-weight-bold text-secondary">Lista de Caixas</h5>
    </div>
    <div class="row mt-2">
        <div class="col">
            <small><div class="table-responsive">
                <table id="dataTable" class="table table-hover" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Caixa</th>
                            <th>Abertura</th>
                            <th>Fechamento</th>
                            <th>Operador</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($select_account->count())
                            @foreach ($select_account as $s)
                                <tr>
                                    <td>{{ $s->descricao }}</td>
                                    <td>{{ date('d/m/Y',strtotime($s->data_aber)) }}</td>
                                    @if(isset($s->data_fech))
                                    <td>{{ date('d/m/Y',strtotime($s->data_fech)) }}</td>
                                    @else
                                    <td></td>
                                    @endif
                                    <td>Cleison Freitas</td>
                                    <td>
                                        <a href="{{ route('account.book.show',$s->id) }}" class="btn btn-primary btn-sm">
                                            <i class="fas fa-search-dollar"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr style="text-align:center;">
                                <td colspan="5"><h5>Não existe caixa aberto no momento</h5></td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div></small>
        </div>
    </div>
</div>
<div class="card-footer bg-white">
    <small class="text-secondary"><p>*Listagem de caixas abertos e fechados ordenados por data de abertura</p></small>
</div>

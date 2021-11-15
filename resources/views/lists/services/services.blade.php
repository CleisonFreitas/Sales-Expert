<div class="table-responsive">
    <small>
        <div class="row">
            <div class="col-12 col-sm-12 col-lg-12">
                <table class="table table-hover" id="dataTable" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Descrição</th>
                            <th>Status</th>
                            <th>Valor</th>
                            <th>Operador</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($services->count())
                            @foreach ($services as $service)
                            <tr>
                                <td>{{ $service->descricao }}</td>
                                <td>{{ $service->status }}</td>
                                <td>{{str_replace(',','.',$service->valor)}}</td>
                                <td>{{ $service->operador }}</td>
                                <td>
                                    <a href="{{ route('services_edit',$service->id) }}" class="btn btn-secondary btn-sm"><i class="far fa-edit"></i></a>

                                    <a href="#" class="btn btn-info btn-sm"><i class="fas fa-toggle-off"></i></a>

                                    <a href="{{ route('services_delete',$service->id) }}" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        @else
                        <tr>
                            <td colspan="5">Você ainda não possui serviços cadastrados</td>
                        </tr>

                        @endif
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="5">*Nenhuma exclusão de serviço é permitida após o primeiro lançamento</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>


    </small>
    </div>

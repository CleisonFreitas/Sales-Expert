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
                <h5 class="m-0 font-weight-bold text-secondary">Atendimentos agendados</h5>
            </div>
            <!-- DataTales Example -->
               <small><div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Cliente</th>
                                    <th>Data agendada</th>
                                    <th>hora agendada</th>
                                    <th>Profissional</th>
                                    <th>Status</th>
                                    <th>Ação</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                @foreach ($customer_services as $c)
                                <tr>
                                    <td>{{ $c->c_nome}}</td>
                                    <td>{{ date('d/m/Y', strtotime($c->data_agend)) }}</td>
                                    <td>{{ $c->hora_agend }}</td>
                                    <td>{{ $c->e_nome }}</td>
                                    <td>{{ $c->status }}</td>
                                    <td>
                                        <a href="{{ route('service_edit',$c->ordem) }}" class="btn btn-secondary btn-sm btn-circle">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <a href="{{ route('customer_edit',$c->cust_id) }}" class="btn btn-info btn-sm btn-circle">
                                            <i class="fas fa-people-arrows"></i>
                                        </a>
                                        <a href="" class="btn btn-danger btn-sm btn-circle">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div></small>
            <!-- table -->
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
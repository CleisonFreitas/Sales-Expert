@extends('/layouts/main')

@section('title','dashboard')

@section('content')
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i
                    class="fas fa-file-pdf text-white-100"></i> Gerar relação</a>
        </div>

        <!-- Content Row -->
        <div class="row">

            <!-- Atendimentos Card -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Atendimentos (Atual)</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">10</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Previsão Card  -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Previsão de entradas</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">R$ 215,000</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--Ganhos atuais -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Ganhos atuais</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">R$ 90</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-money-bill-wave fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Clientes Card -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-dark shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Clientes(Total)
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">102</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contas(Receber) Card -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Contas(Receber)
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">R$ 400</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-receipt fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contas(Pagar) Card -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-danger shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Contas(Pagar)
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">R$ 137</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-file-invoice-dollar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- FIm Cards -->

        <div class="card shadow mt-2">
            <div class="card-header">
                <div class="row">
                    <div class="col-12 col-sm-6 col-lg-8">
                        <h4>Quadro de anotações</h4>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-4">
                        <a href="#" class="btn btn-primary" style="margin-left: 75%"
                            data-toggle="modal" data-target="#exampleModal">
                            <i class="far fa-sticky-note"></i>&nbsp;<i class="fas fa-plus"></i>
                        </a>
                    </div>
                </div>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Descrição</th>
                                <th>Previsão</th>
                                <th>Editar/Excluir</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @foreach ($notas as $nota)
                                <td>{{$nota->descricao}}</td>
                                <td>{{date('d/m/Y', strtotime($nota->previsao))}}</td>
                                <td><!-- Editar Registro -->
                                    <a href="#" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#nota_edit{{ $nota->id }}">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a><!-- Excluir Registro -->
                                    <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#nota_del{{ $nota->id }}">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                </td>

                                <!-- Editar nota -->
                                    <div class="modal fade" id="nota_edit{{ $nota->id }}" tabindex="-1" aria-labelledby="nota_edit{{ $nota->descricao }}Label" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <form action="{{ route('note_update',$nota->id) }}" method="post">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="nota_edit{{ $nota->descricao }}Label">Editar nota</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body text-danger">
                                                    <div class="row">
                                                        <div class="col">
                                                            <label for="descricao">Descrição:</label>
                                                            <input type="text" name="descricao" value="{{ $nota->descricao }}" id="" class="form-control" placeholder="Digite aqui a descrição" required>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-2">
                                                        <div class="col">
                                                            <label for="previsao">Previsão de conclusão:</label>
                                                            <input type="date" name="previsao" value="{{date('Y-m-d', strtotime($nota->previsao))}}" id="" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="row mt-2">
                                                        <div class="col">
                                                            <label for="sobre">Sobre:</label>
                                                            <textarea name="sobre" id="" cols="5" rows="5" class="form-control">{{ $nota->sobre }}</textarea required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="reset" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                    <button type="submit" class="btn btn-info">Atualizar</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                <!-- #Editar -->

                                <!-- Excluir nota -->
                                    <div class="modal fade" id="nota_del{{ $nota->id }}" tabindex="-1" aria-labelledby="nota_del{{ $nota->id }}Label" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="nota_del{{ $nota->id }}Label">{{ $nota->descricao }}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body text-danger">
                                                    <div class="row">
                                                        <div class="col">
                                                            <h6 ><i class="fas fa-exclamation-triangle fa-2x text-danger"></i>
                                                                &nbsp;Deseja realmente excluir essa anotação?
                                                            </h6>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="reset" class="btn btn-secondary" data-dismiss="modal">Não</button>
                                                    <a href="{{ route('note_delete',$nota->id) }}" class="btn btn-danger">Sim</a>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                <!-- #Excluir -->
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Criar nota -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <form action="{{ route('note_create') }}" method="post">
                                @csrf
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Nova nota</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body text-danger">
                                    <div class="row">
                                        <div class="col">
                                            <label for="descricao">Descrição:</label>
                                            <input type="text" name="descricao" id="" class="form-control" placeholder="Digite aqui a descrição" required>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col">
                                            <label for="previsao">Previsão de conclusão:</label>
                                            <input type="date" name="previsao" id="" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col">
                                            <label for="sobre">Sobre:</label>
                                            <textarea name="sobre" id="" cols="5" rows="5" class="form-control"></textarea required>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="reset" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-primary">Registrar</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>

            <!-- #Modal -->
        </div>

@endsection

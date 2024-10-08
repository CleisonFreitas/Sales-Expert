@extends('layouts.main')

@section('title','Gerência de Contas')

@section('content')

<div class="card shadow mt-3">
    <div class="card-header py-1">
        <div class="row">
            <div class="col-12 col-sm-6 col-lg-6">
                <h2 class="mb-2 text-gray-800 mt-2">Gerência de Contas</h2>
            </div>
            <div class="col-12 col-sm-6 col-lg-6">
                <nav class="mx-auto mt-2">
                    <ul class="nav nav-pills justify-content-end" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active btn-sm" id="nav-consult-tab" data-toggle="pill" href="#nav-consult" role="tab" aria-controls="nav-consult" aria-selected="false"><i class="fas fa-th-list"></i></a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link btn-sm" id="nav-create-tab" data-toggle="pill" href="#nav-create" role="tab" aria-controls="nav-create" aria-selected="true"><i class="fas fa-file-invoice"></i></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

    <div class="card-body text-danger">
        <div class="card-header bg-gray-300">
            <h5 class="m-0 font-weight-bold text-secondary">Controle de Contas </h5>
        </div>
        <div class="tab-content" id="nav-tabContent">
            <!-- Formulário de controle de conta -->
            <div class="tab-pane fade show" id="nav-create" role="tabpanel" aria-labelledby="nav-create-tab">
                @if(isset($account))
                <form action="{{ route('account.update',$account->id) }}" method="post">
                    @method('PUT')
                    @csrf
                         @include('components.account_form')
                 </form>
                @else
                <form action="{{ route('account.store') }}" method="post">
                    @csrf
                         @include('components.account_form')
                 </form>

                @endif

            </div>

            <!-- Lista de Contas -->
            <div class="tab-pane fade show active" id="nav-consult" role="tabpanel" aria-labelledby="nav-consult-tab">
                <small><div class="table-responsive mt-3">
                    <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Grupo</th>
                                <th>Status</th>
                                <th>Tipo</th>
                                <th>Editar/Excluir</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($grupo as $g)
                                    <tr>
                                        <td>{{ $g->descricao }}</td>
                                        <td>{{ $g->status }}</td>
                                        <td>{{ $g->tipo }}</td>
                                        <td>
                                            <div class="row">
                                                <a href="{{ route('account.edit',$g->id)}}" class="btn btn-secondary btn-sm mx-1"><i class="fas fa-edit"></i></a>
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-info btn-sm " data-toggle="modal" data-target="#modal{{ $g->id }}">
                                                    <i class="fas fa-list-alt"></i>
                                                </button>
                                                <a href="{{ route('account.warning',$g->id) }}" class="btn btn-danger btn-sm mx-1"><i class="fas fa-trash"></i></a>
                                            </div>
                                                <!-- Modal -->
                                                <div class="modal fade" id="modal{{ $g->id }}" tabindex="-1" aria-labelledby="{{ $g->id }}ModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg modal-dialog-scrollable">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="{{ $g->id }}ModalLabel">{{ $g->descricao }}</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="table-responsive">
                                                                    <table class="table table-hover">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Conta</th>
                                                                                <th>Tipo</th>
                                                                                <th>Editar/Excluir</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                                @foreach ($conta as $c)
                                                                                    @if ($c->pertence == $g->id)
                                                                                        <tr>
                                                                                            <td>{{ $c->descricao }}</td>
                                                                                            <td>{{ $c->tipo }}</td>
                                                                                            <td>
                                                                                                <a href="{{ route('account.edit',$c->id)}}" class="btn btn-sm"><i class="fas fa-edit" style="color: blue;"></i></a>
                                                                                                <a href="{{ route('account.warning',$c->id) }}" class="btn btn-sm"><i class="fas fa-trash-alt" style="color:red;"></i></a>
                                                                                            </td>
                                                                                        </tr>
                                                                                    @endif
                                                                                @endforeach
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div></small>
                </div>
            </div>

        </div>
    </div>

@endsection

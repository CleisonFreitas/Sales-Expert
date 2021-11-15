@extends('layouts.main')

@section('title','Service Register')

@section('content')
<div class="card shadow mt-2 mb-4 text-danger">
    <div class="card-header py-1">
        <div class="row">
            <div class="col-12 col-sm-6 col-lg-6">
                <h2 class="text-gray-600 mt-2">Serviços</h2>
            </div>
            <div class="col-12 col-sm-12 col-lg-6">
                <nav class="mx-auto mt-2">
                    <ul class="nav nav-pills justify-content-end" id="pills-tab" role="tablist">

                        <li class="nav-item" role="presentation">
                            <a class="nav-link active btn-sm" id="nav-home-ta" data-toggle="pill" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Novo</a>
                        </li>

                        <li class="nav-item" role="presentation">
                            <a class="nav-link btn-sm" id="nav-consult-tab" data-toggle="pill" href="#nav-consult" role="tab" aria-controls="nav-consult" aria-selected="false">Consultar</i></a>
                        </li>

                    </ul>
                </nav>
            </div>

        </div>
    </div>
    <div class="card-body">
        <div class="tab-content" id="nav-tabContent">
            <!-- Formulário de Cadastro -->
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                <form action="{{ route('services_update',$service->id) }}" method="post">
                    @csrf
                    @method('PUT')
                        @include('forms.services.service')
                </form>
            </div>
            <!-- #Formulário de Cadastro -->

            <!-- Lista de serviços cadastrados -->
            <div class="tab-pane fade" id="nav-consult" role="tabpanel" aria-labelledby="nav-consult-tab">
                @include('lists.services.services')
            </div>
            <!-- #Lista -->
        </div>
    </div>
</div>

@endsection

@extends('/layouts/main')

@section('title','Formas de Pagamento')

@section('content')

<div class="card shadow mt-3">
    <div class="card-header py-1">
        <div class="row">
            <div class="col-6 col-sm-6 col-lg-6">
                <h2 class="text-gray-800 mt-2 d-flex">Formas de pagamento</h2>
            </div>
            <div class="col-6 col-sm-6 col-lg-6">
                <nav class="mx-auto mt-2">
                    <ul class="nav nav-pills justify-content-end" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active btn-sm" id="nav-home-ta" data-toggle="pill" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true"><i class="fas fa-comment-dollar"></i></a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link btn-sm" id="nav-consult-tab" data-toggle="pill" href="#nav-consult" role="tab" aria-controls="nav-consult" aria-selected="false"><i class="fas fa-search-dollar"></i></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <div class="card-body text-danger">
        <div class="tab-content" id="nav-tabContent"> 
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                <form action="{{ route('payment_method_create') }}" method="POST">
                    @csrf
                    <div class="card-header bg-gray-300 ">
                        <h5 class="m-0 font-weight-bold text-secondary">Cadastrar nova forma de pagamento</h5>
                    </div>
                    <div class="row mt-3">
                        <div class="col-7 col-sm-7 col-lg-2">
                            <label for="id">ID:</label>
                            <input type="text" name="id" id="" class="form-control bg-gray-300" readonly>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12 col-sm-12 col-lg-12">
                            <label for="descricao">Descrição: </label>
                            <input type="text" name="descricao" maxlength:="50" id="" class="form-control" placeholder="Ex: Cartão de Credito (2x)">
                            @error('descricao')<small>{{ $message }}</small>@enderror
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12 col-sm-6 col-lg-2">
                            <label for="initials">Sigla: </label>
                            <input type="text" name="sigla" maxlength="3" id="" class="form-control" >
                            @error('sigla')<small>{{ $message }}</small>@enderror
                        </div>
                        <div class="col-12 col-sm-6 col-lg-6">
                            <label for="tipo">Tipo: @error('tipo')<small>{{ $message }}</small>@enderror </label>
                            <select name="tipo" id="" class="custom-select">
                                <option value="M">Dinheiro</option>
                                <option value="A">Conta</option>
                                <option value="C">Cartão</option>
                            </select>
                            @error('tipo')<small>{{ $message }}</small>@enderror
                            
                        </div>
                        <div class="col-12 col-sm-6 col-lg-2">
                            <label for="installments">Parcelas:</label>
                            <select name="parcelas" id="" class="custom-select">
                                <option value="1">1x</option>
                                <option value="2">2x</option>
                                <option value="3">3x</option>
                                <option value="4">4x</option>
                                <option value="5">5x</option>
                                <option value="6">6x</option>
                                <option value="7">7x</option>
                                <option value="8">8x</option>
                                <option value="9">9x</option>
                                <option value="10">10x</option>
                                <option value="11">11x</option>
                                <option value="12">12x</option>
                            </select>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-2">
                            <label for="credit">Dias para crédito</label>
                            <input type="text" name="credito" value="0" id="" class="form-control">
                        </div>
                    </div>
            
                    <div class="row mt-3">
                        <div class="col-7 col-sm-8 col-lg-10">
                            <button type="submit" class="btn btn-danger">Gravar</button>
                            <button type="reset" class="btn btn-secondary">Limpar</button>
                        </div>
                    </div>
                </form>
            </div>
    

            <div class="tab-pane fade" id="nav-consult" role="tabpanel" aria-labelledby="nav-consult-tab">
                <form action="#">
                    @csrf
                    <div class="row">
                        <div class="col-12 col-sm-12 col-lg-12">
                            <!-- DataTales Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header bg-gray-300 py-3">
                                    <h5 class="m-0 font-weight-bold text-secondary">Lista de formas de pagamento</h5>
                                </div>           
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
                                            <thead class="text-dark">
                                                <tr>
                                                    <th>Descrição</th>
                                                    <th>Sigla</th>
                                                    <th>Tipo</th>
                                                    <th>Data de Cadastro</th>
                                                    <th>Ação</th>
                                                </tr>
                                            </thead>
                                        
                                            <tbody>
                                                @foreach($payment_methods as $p)
                                                    
                                                    <tr>
                                                        <td>{{ $p->descricao }}</td>
                                                        <td>{{ $p->sigla }}</td>
                                                        @switch($p->tipo)
                                                            @case("M")
                                                                <td>{{ $p->tipo = "Dinheiro" }}</td>
                                                            @break
                                                            @case("A")
                                                                <td>{{ $p->tipo = "Conta" }}</td>
                                                            @break
                                                            @default
                                                                <td>{{ $p->tipo = "Cartão" }}</td>  
                                                            @break
                                                        @endswitch
                                                        <td>{{ date('d/m/Y', strtotime($p->created_at)) }}</td>
                                                        <td>
                                                            <div class="row">
                                                                <div class="col-6 col-sm-6 col-lg-3">
                                                                    <a href="{{ route('payment_method_edit',$p->id) }}" class="btn btn-sm btn-circle btn-secondary">
                                                                        <i class="fas fa-pencil-alt"></i>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        <!-- table -->
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
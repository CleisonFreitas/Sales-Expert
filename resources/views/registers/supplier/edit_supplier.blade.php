@extends('/layouts/main')

@section('title','Fornecedores')

@section('content')

        <div class="card shadow mt-3 text-danger">
            <div class="card-header py-1">
                <div class="row">
                    <div class="col-6 col-sm-6 col-lg-6">
                        <h2 class="text-gray-600 mt-2 d-flex">Fornecedores</h2>
                    </div>
                    <div class="col-6 col-sm-6 col-lg-6">
                        <nav class="mx-auto mt-2">
                            <ul class="nav nav-pills justify-content-end" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active btn-sm" id="nav-home-ta" data-toggle="pill" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true"><i class="fas fa-store"></i></a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link btn-sm" id="nav-list-tab" data-toggle="pill" href="#nav-list" role="tab" aria-controls="nav-list" aria-selected="false"><i class="fas fa-pen-alt"></i></a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="card-body">
            @foreach($suppliers as $supplier)
            <form action="{{ route('supplier_update',$supplier->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <!-- Main -->
                            <div class="card-header bg-gray-300 ">
                                <h5 class="m-0 font-weight-bold text-secondary">Cadastrar novo Fornecedor</h5>
                            </div>
                            <div class="row mt-2 mb-3">
                                <div class="col-12 col-sm-9 col-lg-3">
                                    <label for="dt_cad">Cadastro:</label>
                                    <input type="date" value="{{ date('Y-m-d',strtotime($supplier->dt_cad)) }}" name="dt_cad" id="" class="form-control">
                                </div>
                            </div>

                            <div class="row mt-2 mb-3">
                                <div class="col-12 col-sm-9 col-lg-2">
                                    <label for="id">ID:</label>
                                    <input type="text" name="id" id="" value={{ $supplier->id }} class="form-control bg-gray-300" readonly>
                                </div>
                                <div class="col-12 col-sm-9 col-lg-2">
                                    <label for="status" class="text-danger">Status:</label>
                                    <select name="status" id="" class="custom-select">
                                        <option value="on">Ativo</option>
                                        <option value="off">Inativo</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mt-2 mb-3">
                                <div class="col-12 col-sm-12 col-lg-12">
                                    <label for="name" class="text-danger">Nome: <small> @error('nome') {{$message}} @enderror </small></label>
                                    <input type="text" name="nome" value="{{ $supplier->nome }}" id="" class="form-control">
                                    <small id="emailHelp" class="form-text text-secondary">*Campo obrigatório</small>
                                </div>
                            </div>

                            <div class="row mt-2 mb-3">
                                <div class="col-12 col-sm-12 col-lg-7">
                                    <label for="cnpj" >Cnpj:</label>
                                    <input type="text" name="cnpj" value="{{ $supplier->cnpj }}" id="txtCnpj" onkeyup="mask_cnpj();" class="form-control" maxlength="20">
                                </div>
                            </div>

                            <div class="row mt-2 mb-3">
                                <div class="col">
                                    <h5 class="text-gray-400">Localização*</h5>
                                </div>
                            </div>

                            <div class="row mt-2 mb-3">
                                <div class="col-12 col-sm-12 col-lg-4">
                                    <label for="zip_code">Cep:</label>
                                    <input type="text" name="cep" value="{{ $supplier->cep }}" id="cep" maxlength="9" class="form-control" onkeyup="mask_cep();" onblur="pesquisacep(this.value);">
                                </div>
                                <div class="col-12 col-sm-12 col-lg-6">
                                    <label for="adress">Endereço:</label>
                                    <input type="text" name="logradouro" value="{{ $supplier->logradouro }}" id="street" class="form-control">
                                </div>
                                <div class="col-12 col-sm-12 col-lg-2">
                                    <label for="adress">Número:</label>
                                    <input type="text" name="numero" value="{{ $supplier->numero }}" id="numero" class="form-control">
                                </div>
                            </div>

                            <div class="row mt-2 mb-3">
                                <div class="col-9 col-sm-9 col-lg-4">
                                    <label for="city">Cidade:</label>
                                    <input type="text" name="cidade" value="{{ $supplier->cidade }}" id="city" class="form-control">
                                </div>
                                <div class="col-3 col-sm-3 col-lg-2">
                                    <label for="state">Estado:</label>
                                    <input type="text" name="estado" value="{{ $supplier->estado }}" id="state" class="form-control">
                                </div>
                                <div class="col-12 col-sm-12 col-lg-6">
                                    <label for="district">Bairro:</label>
                                    <input type="text" name="bairro" value="{{ $supplier->bairro }}" id="district" class="form-control">
                                </div>
                            </div>

                            <div class="row mt-2 mb-3">
                                <div class="col">
                                    <h5 class="text-gray-400">Contato</h5>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-12 col-sm-12 col-lg-8">
                                    <label for="email">E-mail:</label>
                                    <input type="email" name="email" value="{{ $supplier->email }}" id="" class="form-control">
                                </div>
                                <div class="col-12 col-sm-12 col-lg-4">
                                    <label for="ct_num">Celular:</label>
                                    <input type="text" name="ct_num" value="{{ $supplier->ct_num }}" id="txtFone"  maxlength="15" onkeyup="mask_fone();" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-12 col-sm-12 col-lg-4">
                                    <label for="whatsapp">WhatsApp:</label>
                                    <input type="text" name="whatsapp" value="{{ $supplier->whatsapp }}" id="txtWhats"  maxlength="15" onkeyup="mask_whats();" class="form-control">
                                </div>
                                <div class="col-12 col-sm-12 col-lg-4">
                                    <label for="facebook">Facebook:</label>
                                    <input type="text" name="facebook" value="{{ $supplier->facebook }}" id="" class="form-control">
                                </div>
                                <div class="col-12 col-sm-12 col-lg-4">
                                    <label for="col-12 col-sm-12 col-lg-4">Instagram:</label>
                                    <input type="text" name="instagram" value="{{ $supplier->instagram }}" id="" class="form-control">
                                </div>
                            </div>

                            <div class="row mt-2 mb-3">
                                <div class="col">
                                    <h5 class="text-gray-400">Área de atuação</h5>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="product" class="col-form-label">Produto: </label>
                                <div class="col ">
                                    <textarea name="prod_desc" value="{{ $supplier->prod_desc }}" id="" cols="30" rows="5" class="form-control">{{ $supplier->prod_desc }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="service" class="col-form-label">Serviço: </label>
                                <div class="col">
                                    <textarea name="serv_desc" value="" id="" cols="30" rows="5" class="form-control"> {{ $supplier->serv_desc }} </textarea>
                                </div>
                            </div>
                            <div class="row mt-2 mb-3">
                                <div class="col">
                                    <button type="submit" class="btn btn-danger">Gravar</button>
                                    <button type="reset" class="btn btn-secondary">Limpar</button>
                                </div>
                            </div>
                        </form>
                        @endforeach
                        <!-- #Main -->
                    </div>
                    <!-- Contact -->
                    
                    <div class="tab-pane fade" id="nav-list" role="tabpanel" aria-labelledby="nav-list-tab">
                    @foreach ($suppliers as $supplier)
                        <!-- Table -->
                    <form action="#">
                        @csrf
                        <div class="row">
                            <div class="col-12 col-sm-12 col-lg-12">
                                 <!-- DataTales Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header bg-gray-300 py-3">
                                    <h5 class="m-0 font-weight-bold text-secondary">Lista de Fornecedores</h5>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-hover border-1" id="dataTable" width="100%" cellspacing="0">
                                            <thead class="text-dark">
                                                <tr>
                                                    <th>Nome</th>
                                                    <th>CNPJ</th>
                                                    <th>Data de Cadastro</th>
                                                    <th>Ação</th>
                                                </tr>
                                            </thead>
                                            
                                            <tbody>
                                                <tr>
                                                    <td>{{ $supplier->nome }}</td>
                                                    <td>{{ $supplier->cnpj }}</td>
                                                    <td>{{ date('d/m/Y', strtotime($supplier->dt_cad)) }}</td>
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-6 col-sm-6 col-lg-4">
                                                                <a href="{{ route('supplier_warning',$supplier->id) }}" class="btn btn-sm btn-circle btn-danger">
                                                                    <i class="fas fa-times-circle"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- table -->
                            </div>
                        </div>
                    </form>
                    @endforeach
                    </div>
                    
                    <!-- #Contact -->
                </div>
    </div>
</div>


@endsection
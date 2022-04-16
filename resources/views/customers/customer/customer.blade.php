@extends('layouts.main')

@section('title','Clientes')

@section('content')

    <div class="card shadow mt-3">
        <div class="card-header py-1">
            <div class="row">
                <div class="col-6 col-sm-6 col-lg-6">
                    <h2 class="text-gray-800 mt-2 d-flex">Clientes</h2>
                </div>
                <div class="col-6 col-sm-6 col-lg-6">
                    <nav class="mx-auto mt-2">
                        <ul class="nav nav-pills justify-content-end" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active btn-sm" id="nav-contact-tab" data-toggle="pill" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false"><i class="fas fa-user-clock"></i></a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link  btn-sm" id="nav-home-ta" data-toggle="pill" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true"><i class="fas fa-user-plus"></i></a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <div class="card-body text-danger">

            <form action="{{ route('customer_create') }}" method="POST">
                @csrf
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <!-- Main -->
                        <div class="card-header bg-gray-300 ">
                            <h5 class="m-0 font-weight-bold text-secondary">Cadastrar novo cliente</h5>
                        </div>
                        <div class="row mt-2 mb-3">
                            <div class="col-12 col-sm-12 col-lg-3">
                                <label for="dt_register">Cadastro:</label>
                                <input type="date" name="cadastro" value="{{ date('Y-m-d') }}" id="" class="form-control">
                                <input type="hidden" name="resp_id" value="{{ Auth::user()->id }}">
                            </div>
                        </div>

                        <div class="row mt-2 mb-3">
                            <div class="col-12 col-sm-9 col-lg-2">
                                <label for="id">ID:</label>
                                <input type="text" name="id" id="" class="form-control bg-gray-300" readonly>
                            </div>
                            <div class="col-12 col-sm-9 col-lg-2">
                                <label for="status">Status:</label>
                                <select name="status" id="" class="custom-select">
                                    <option value="Ativo">Ativo</option>
                                    <option value="Inativo">Inativo</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-12 col-sm-12 col-lg-12">
                                <label for="f_name">Nome Completo:</label>
                                <input type="text" name="nome" onblur="apelidoDisplay()" id="nome" class="form-control" placeholder="Ex: Luciano Cavalcante">
                                <small class="form-text text-secondary">*Campo obrigatório</small>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12 col-sm-12 col-lg-9">
                                <label for="apelido">Como deseja ser chamado?</label>
                                <input type="text" name="apelido" maxlength="15" id="apelido" class="form-control" placeholder="Ex: Luciano">
                                <small class="form-text text-secondary">*Campo obrigatório</small>
                            </div>
                            <div class="col-12 col-sm-12 col-lg-3">
                                <label for="b_day">Nascimento:</label>
                                <input type="date" name="nascimento" id="" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12 col-sm-12 col-lg-4">
                                <label for="itin">CPF:</label>
                                <input type="text" name="cpf" id="txtCpf" onkeyup="mask_cpf();" maxlength="14"class="form-control" placeholder="Ex: 145.521.452-37">
                            </div>
                            <div class="col-12 col-sm-6 col-lg-5">
                                <label for="ssn">RG:</label>
                                <input type="text" name="rg" id="" class="form-control" placeholder="Ex: 745214-7">
                            </div>
                            <div class="col-12 col-sm-6 col-lg-3">
                                <label for="gender">Gênero:</label>
                                <select name="genero" id="" class="custom-select">
                                    <option value="M">Masculino</option>
                                    <option value="F">Feminino</option>
                                    <option value="O">Outro</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mt-2 mb-3">
                            <div class="col">
                                <h5 class="text-gray-400">Localização*</h5>
                            </div>
                        </div>
                        <div class="row mt-2 mb-3">
                            <div class="col-12 col-sm-12 col-lg-3">
                                <label for="zip_code">Cep: </label>
                                <input type="text" name="cep" id="cep" onkeyup="mask_cep();" maxlength="9" class="form-control" onblur="pesquisacep(this.value);" placeholder="Ex: 60.452-141">
                            </div>
                            <div class="col-8 col-sm-9 col-lg-7">
                                <label for="street">Rua/Avenida: </label>
                                <input type="text" name="logradouro" id="street" class="form-control" placeholder="Ex: Rua Augusta dos Anjos">
                            </div>
                            <div class="col-4 col-sm-3 col-lg-2">
                                <label for="n_home">Número: </label>
                                <input type="text" name="numero" id="" class="form-control" placeholder="Ex: 142">
                            </div>
                        </div>
                        <div class="row mt-2 mb-3">
                            <div class="col-9 col-sm-9 col-lg-4">
                                <label for="city">Cidade:</label>
                                <input type="text" name="cidade" id="city" class="form-control" placeholder="Ex: São Paulo">
                            </div>
                            <div class="col-3 col-sm-3 col-lg-2">
                                <label for="state">Estado:</label>
                                <input type="text" name="estado" id="state" class="form-control" placeholder="Ex: SP">
                            </div>
                            <div class="col-12 col-sm-12 col-lg-6">
                                <label for="district">Bairro:</label>
                                <input type="text" name="bairro" id="district" class="form-control" placeholder="Cenpretade">
                            </div>
                        </div>
                        <div class="row mt-2 mb-3">
                            <div class="col">
                                <h5 class="text-gray-400">Contato*</h5>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12 col-sm-12 col-lg-8">
                                <label for="email">E-mail</label>
                                <input type="text" name="email" id="" class="form-control" placeholder="Ex: luciano@gmail.com">
                            </div>
                            <div class="col-12 col-sm-12 col-lg-4">
                                <label for="ct_numb">Telefone:</label>
                                <input type="text" name="ct_num" id="txtFone" onkeyup="mask_fone();" maxlength="15" class="form-control" placeholder="(85) 98541-2345">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12 col-sm-12 col-lg-4">
                                <label for="whatsapp">WhatsApp:</label>
                                <input type="text" name="ct_whats" id="txtWhats" onkeyup="mask_whats();" maxlength="15" class="form-control" placeholder="(85) 98541-2345">
                            </div>
                            <div class="col-12 col-sm-12 col-lg-4">
                                <label for="facebook">Facebook:</label>
                                <input type="text" name="facebook" id="" class="form-control" placeholder="facebook.com/miha.yu.1840">
                            </div>
                            <div class="col">
                                <label for="col-12 col-sm-12 col-lg-4">Instagram:</label>
                                <input type="text" name="instagram" id="" class="form-control" placeholder="@mirna_economirna">
                            </div>
                        </div>
                        <div class="row mt-2 mb-3">
                            <div class="col">
                                <button type="submit" class="btn btn-danger">Gravar</button>
                                <button type="reset" class="btn btn-secondary">Limpar</button>
                            </div>
                        </div>
                    </form>

                        <!-- #Main -->
                    </div>

                    <div class="tab-pane fade show active" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                        <form action="#">
                            @csrf
                            <div class="row">
                                <div class="col-12 col-sm-12 col-lg-12">
                                <!-- DataTales Example -->
                                <div class="card shadow mb-4">
                                    <div class="card-header bg-gray-300 ">
                                        <h5 class="m-0 font-weight-bold text-secondary">Lista de Clientes</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>Nome</th>
                                                        <th>Telefone</th>
                                                        <th>Status</th>
                                                        <th>Data de Cadastro</th>
                                                        <th>Ação</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    @foreach ($customers as $c)
                                                    <tr>
                                                        <td>{{ $c->apelido }}</td>
                                                        <td>{{ $c->ct_num }}</td>
                                                        <td>{{ $c->status }}</td>
                                                        <td>{{ date('d/m/Y', strtotime($c->cadastro)) }}</td>
                                                        <td>
                                                            <a href="{{ route('customer_edit',$c->id) }}" title="Editar" class="btn btn-secondary btn-sm btn-circle">
                                                                <i class="fas fa-pencil-alt"></i>
                                                            </a>
                                                            <a href="{{ route('customer_shop',$c->id) }}" title="Atendimento" class="btn btn-primary btn-sm btn-circle">
                                                                <i class="fas fa-hands-helping"></i>
                                                            </a>
                                                            <a href="{{ route('customer_warning',$c->id) }}" title="Excluir registro" class="btn btn-danger btn-sm btn-circle">
                                                                <i class="fas fa-trash"></i>
                                                            </a>
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

@extends('./layouts/main')

@section('title','Employer')

@section('content')

    <div class="card shadow mt-3">
        <div class="card-header py-1">
            <div class="row">
                <div class="col-6 col-sm-6 col-lg-6">
                    <h2 class="text-gray-800 mt-2 d-flex">Funcionários</h2>
                </div>
                <div class="col-6 col-sm-6 col-lg-6">
                    <nav class="mx-auto mt-2">
                        <ul class="nav nav-pills justify-content-end" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active btn-sm" id="nav-home-ta" data-toggle="pill" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true"><i class="fas fa-user-plus"></i></a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link btn-sm" id="nav-contact-tab" data-toggle="pill" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false"><i class="fas fa-user-edit"></i></a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <div class="card-body text-danger">
            @foreach ( $employers as $employer )
            <form action="{{ route('employer_updt',$employer->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <!-- Main -->
                        <div class="card-header bg-gray-300 ">
                            <h5 class="m-0 font-weight-bold text-secondary">Cadastrar novo Funcionário</h5>
                        </div>
                        <div class="row mt-2 mb-3">
                            <div class="col-12 col-sm-12 col-lg-3 d-flex">
                                <a href="{{ route('employer') }}" class="btn btn-secondary mt-4">
                                    <i class="fas fa-plus-circle"></i>&nbsp;Novo Funcionário</a>
                            </div>
                        </div>
                        <div class="row mt-2 mb-3">
                            <div class="col-12 col-sm-12 col-lg-3">
                                <label for="dt_cad">Cadastro:</label>
                                <input type="date" name="dt_cad" value="{{ date('Y-m-d',strtotime($employer->dt_cad)) }}" id="" class="form-control">
                            </div>
                        </div>

                        <div class="row mt-2 mb-3">
                            <div class="col-12 col-sm-9 col-lg-2">
                                <label for="id">ID:</label>
                                <input type="text" name="id" id="" value="{{ $employer->id }}" class="form-control bg-gray-300" >
                            </div>
                            <div class="col-12 col-sm-9 col-lg-2">
                                <label for="status">Status:</label>
                                @switch($employer->status)
                                    @case('on')
                                    <select name="status" id="" class="custom-select">
                                        <option value="on" selected>Ativo</option>
                                        <option value="off">Inativo</option>
                                    </select>
                                        @break
                                    @case('off')
                                    <select name="status" id="" class="custom-select">
                                        <option value="on">Ativo</option>
                                        <option value="off" selected>Inativo</option>
                                    </select>
                                        @break
                                    @default
                                    <select name="status" id="" class="custom-select">
                                        <option value="on" selected>Ativo</option>
                                        <option value="off">Inativo</option>
                                    </select>
                                @endswitch
                                
                            </div>
                        </div> 

                        <div class="row mb-3">
                            <div class="col-12 col-sm-12 col-lg-9">
                                <label for="f_name">Nome Completo:</label>
                                <input type="text" name="p_nome" value="{{ $employer->p_nome }}" id="" class="form-control">
                                <small class="form-text text-secondary">*Campo obrigatório</small>
                            </div>
                            <div class="col-12 col-sm-12 col-lg-3">
                                <label for="b_day">Nascimento:</label>
                                <input type="date" name="dt_nasc" value="{{ date('Y-m-d', strtotime($employer->dt_nasc)) }}" id="" class="form-control">
                                <small class="form-text text-secondary">*Campo obrigatório</small>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12 col-sm-12 col-lg-4">
                                <label for="itin">CPF:</label>
                                <input type="text" name="cpf" id="txtCpf" value="{{ $employer->cpf }}" maxlength="14" onkeyup="mask_cpf();" class="form-control">
                            </div>
                            <div class="col-12 col-sm-6 col-lg-5">
                                <label for="ssn">RG:</label>
                                <input type="text" name="rg" value="{{ $employer->rg }}" id="" class="form-control">
                            </div>
                            <div class="col-12 col-sm-6 col-lg-3">
                                <label for="gender">Gênero:</label>
                                <select name="genero" id="" class="custom-select">
                                    @switch($employer->genero)
                                        @case('M')
                                            <option value="M" selected>Masculino</option>
                                            <option value="F">Feminino</option>
                                            <option value="O">Outro</option>
                                            @break
                                        @case('F')
                                            <option value="M">Masculino</option>
                                            <option value="F" selected>Feminino</option>
                                            <option value="O">Outro</option>
                                            @break
                                        @case('O')
                                            <option value="M">Masculino</option>
                                            <option value="F">Feminino</option>
                                            <option value="O" selected>Outro</option>
                                            @break
                                        @default  
                                    @endswitch
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
                                <input type="text" name="cep" value="{{ $employer->cep }}" id="cep" maxlength="9" class="form-control" onkeyup="mask_cep();" onblur="pesquisacep(this.value);">                            </div>
                            <div class="col-8 col-sm-9 col-lg-7">
                                <label for="street">Rua/Avenida: </label>
                                <input type="text" name="logradouro" value="{{ $employer->logradouro }}" id="street" class="form-control">
                            </div>
                            <div class="col-4 col-sm-3 col-lg-2">
                                <label for="n_home">Número: </label>
                                <input type="text" name="numero" value="{{ $employer->numero }}" id="" class="form-control">
                            </div>
                        </div>
                        <div class="row mt-2 mb-3">
                            <div class="col-9 col-sm-9 col-lg-4">
                                <label for="city">Cidade:</label>
                                <input type="text" name="cidade" value="{{ $employer->cidade }}" id="city" class="form-control">
                            </div>
                            <div class="col-3 col-sm-3 col-lg-2">
                                <label for="state">Estado:</label>
                                <input type="text" name="estado" value="{{ $employer->estado }}" id="state" class="form-control">
                            </div>
                            <div class="col-12 col-sm-12 col-lg-6">
                                <label for="district">Bairro:</label>
                                <input type="text" name="bairro" value="{{ $employer->bairro }}" id="district" class="form-control">
                            </div>
                        </div>
                        <div class="row mt-2 mb-3">
                            <div class="col">
                                <h5 class="text-gray-400">Contact*</h5>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12 col-sm-12 col-lg-8">
                                <label for="email">E-mail:</label>
                                <input type="email" name="email" value="{{ $employer->email }}" id="" class="form-control">
                            </div>
                            <div class="col-12 col-sm-12 col-lg-4">
                                <label for="ct_numb">Celular:</label>
                                <input type="text" name="ct_num" value="{{ $employer->ct_num }}" id="txtFone"  maxlength="15" onkeyup="mask_fone();" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12 col-sm-12 col-lg-4">
                                <label for="whatsapp">WhatsApp:</label>
                                <input type="text" name="ct_whats" value="{{ $employer->ct_whats }}" id="txtWhats"  maxlength="15" onkeyup="mask_whats();" class="form-control">
                            </div>
                            <div class="col-12 col-sm-12 col-lg-4">
                                <label for="facebook">Facebook:</label>
                                <input type="text" name="facebook" value="{{ $employer->facebook }}" id="" class="form-control">
                            </div>
                            <div class="col-12 col-sm-12 col-lg-4">
                                <label for="col-12 col-sm-12 col-lg-4">Instagram:</label>
                                <input type="text" name="instagram" value="{{ $employer->instagram }}" id="" class="form-control">
                            </div>
                        </div>
                        <div class="row mt-2 mb-3">
                            <div class="col">
                                <button type="submit" class="btn btn-danger">Atualizar</button>
                                <button type="reset" class="btn btn-secondary">Desfazer</button>
                    
                            </div>
                        </div>
                    </form>
                    @endforeach
                        <!-- #Main -->
                    </div>
                    @foreach($employers as $employer)
                    <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                        <form action="#">
                            @csrf
                            <div class="row">
                                <div class="col-12 col-sm-12 col-lg-12">
                                     <!-- DataTales Example -->
                                <div class="card shadow mb-4">
                                    <div class="card-header bg-gray-300 py-3">
                                        <h5 class="m-0 font-weight-bold text-secondary">Lista de Funcionários</h5>
                                    </div>
                                    <small><div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-hover border-1" id="dataTable" width="100%" cellspacing="0">
                                                <thead class="text-dark">
                                                    <tr>
                                                        <th>Nome</th>
                                                        <th>CPF</th>
                                                        <th>Idade</th>
                                                        <th>Data de Cadastro</th>
                                                        <th>Ação</th>
                                                    </tr>
                                                </thead>
                                                
                                                <tbody>
                                                   
                                                    <tr>
                                                        <td>{{ $employer->p_nome }}</td>
                                                        <td>{{ $employer->cpf }}</td>
                                                        <td>{{ $employer->age }} anos</td>
                                                        <td>{{ date('d/m/Y', strtotime($employer->dt_cad)) }}</td>
                                                        <td>
                                                            <div class="row">
                                                                <div class="col-6 col-sm-6 col-lg-3">
                                                                    <a href="{{ route('employer_warning',$employer->id) }}" class="btn btn-sm btn-circle btn-danger">
                                                                        <i class="fas fa-minus"></i>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                   
                                                </tbody>
                                            </table>
                                        </div>
                                    </div></small>
                                </div>
                                <!-- table -->
                                </div>
                            </div>
                        </form>
                    </div>
                    @endforeach
                </div>
        </div>
    </div>

@endsection
@extends('/layouts/main')

@section('title','Relatório de Clientes')

@section('content')

    <div class="card shadow mt-3 mb-4">
        <div class="card-header py-1">
            <h2 class="mb-4 text-gray-800 mt-2">Relatório de Clientes</h2>
        </div>
        <div class="card-body text-danger">

            <form action="#" method="POST">
                @csrf
                    <div class="row">
                        <!-- Divisão de Layout -->
                        <div class="col-12 col-sm-12 col-lg-6">
                            <div class="row">
                                <div class="col">
                                    <h5>Data de Cadastro</h5>
                                </div>
                            </div>
                        
                            <div class="row mt-3">
                                <div class="col">
                                    <input type="date" name="" id="st_date" value="{{ Date('Y-m-d') }}" class="form-control">
                                        <label for="st-date">
                                            <small id="st_date" class="form-text text-secondary ">Início*</small>
                                        </label>
                                </div>
                                <div class="col">
                                    <input type="date" name="" id="end_date" value="{{ Date('Y-m-d') }}" class="form-control">
                                        <label for="en-date mx-auto">
                                            <small id="end_date" class="form-text text-secondary ">Fim *</small>
                                        </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-lg-6">
                            <div class="row">
                                <div class="col">
                                    <h5>Data de Nascimento</h5>
                                </div>
                            </div>
                            
                            <div class="row mt-3">
                                <div class="col">
                                    <input type="date" name="" id="st_date" value="{{ Date('Y-m-d') }}" class="form-control">
                                        <label for="st-date">
                                            <small id="st_date" class="form-text text-secondary ">Início*</small>
                                        </label>
                                </div>
                                <div class="col">
                                    <input type="date" name="" id="end_date" value="{{ Date('Y-m-d') }}" class="form-control">
                                        <label for="en-date mx-auto">
                                            <small id="end_date" class="form-text text-secondary ">Fim*</small>
                                        </label>
                                </div>
                            </div>
                        </div>

                        <!-- #Divisão -->
                    </div>
                    <div class="row mt-3">
                        <div class="col-12 col-sm-12 col-lg-6">

                            <div class="form-group row">
                                <div class="col-12 col-sm-12 col-lg-6">
                                    <label for="cep">Pesquise pelo Cep:</label>
                                    <input type="text" name="cep" id="cep" class="form-control" maxlength="9" onkeyup="mask_cep();" onblur="pesquisacep(this.value);">
                                </div>
                                <div class="col-12 col-sm-12 col-lg-6">
                                    <label for="serv-prod text-gray-800">Adiquiriu:</label>
                                    <select name="aquisicao" id="" class="custom-select">
                                        <option value="#">Serviço 1</option>
                                        <option value="#">Serviço 1</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-lg-6">
                            <div class="row">
                                <div class="col-12 col-sm-12 col-lg-4">
                                        <label for="dias">Nos últimos</label>
                                        <div class="input-group">
                                            <input type="text" name="" id="" class="form-control"> 
                                            <div class="input-group-append">
                                                <span class="btn btn-danger">
                                                    Dias
                                                </span>
                                            </div>
                                        </div>
                                </div>
                                <div class="col-12 col-sm-12 col-lg-8">
                                    <label for="atendido">Atendido por</label>
                                    <select name="login" id="" class="custom-select">
                                        <option value="">Todos</option>
                                        <option value="#">Jessica Andrade</option>
                                        <option value="#">Thalita</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col">
                            <small class="text-form text-secondary">*Opções de relatório</small>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col">
                            <button class="btn bg-gray-400">Excel&nbsp; <img src="https://img.icons8.com/ios-filled/30/000000/ms-excel.png"/></button>
                            <button class="btn bg-gray-400">PDF&nbsp; <img src="https://img.icons8.com/ios-filled/30/000000/pdf--v2.png"/></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

@endsection
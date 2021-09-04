@extends('/layouts/main')

@section('title','Company')

@section('content')

    <div class="card shadow mb-4">
        <div class="card-header">
            <h2 class="text-gray-600 d-flex">Registro Empresarial</h2>
        </div>
        <div class="card-body text-danger">
            <div class="card-header bg-gray-300 ">
                <h5 class="m-0 font-weight-bold text-secondary">Cadastrar Empresa</h5>
            </div>
            <form action="#" method="POST">
            @csrf
                <div class="row mt-3">
                    <div class="col-12 col-sm-3 col-lg-3">
                        <label for="dt_register text-danger">Cadastro</label>
                        <input type="date" value="{{ date('Y-m-d')}}" name="dt_cadastro" id="" class="form-control mb-2">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col col-sm-12 col-lg-4">
                        <h5 class="text-danger">CEO</h5>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12 col-sm-12 col-lg-6">
                        <input type="text" name="first_n" id="" class="form-control" >
                        <small class="form-text text-secondary">*Nome(obrigatório)</small>
                    </div>
                    <div class="col-12 col-sm-12 col-lg-6">
                        <input type="text" name="last_n" id="" class="form-control " >
                        <small class="form-text text-secondary">*Sobrenome(obrigatório)</small>
                    </div>

                </div>
                <div class="row mt-3">
                    <div class="col-12 col-sm-12 col-lg-12">
                        <label for="f_name" class="text-bold">Razão Social</label>
                        <input type="text" name="f_name" id="" class="form-control">
                        <small class="form-text text-secondary">*Campo obrigatório</small>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col text-gray-400 lead">
                        <h5>Localização</h5>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12 col-sm-12 col-lg-4">
                        <label for="zip_code" class="text-danger">Cep</label>
                        <input type="text" name="zip_code" id="cep" maxlength="9" class="form-control" onkeyup="mask_cep();" onblur="pesquisacep(this.value);">                        <small class="form-text text-secondary">*Campo obrigatório</small>
                    </div>
                    <div class="col-12 col-sm-12 col-lg-8">
                        <label for="adress" class="text-danger">Endereço</label>
                        <input type="text" name="street" id="street" class="form-control">
                        <small class="form-text text-secondary">*Campo obrigatório</small>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12 col-sm-12 col-lg-4">
                        <label for="city" class="text-danger">Cidade </label>
                        <input type="text" name="city" id="city" class="form-control">
                        <small class="form-text text-secondary">*Campo obrigatório</small>
                    </div>
                    <div class="col col-sm-12 col-lg-2">
                        <label for="state" class="text-danger">Estado </label>
                        <input type="text" name="state" id="state" class="form-control">
                        <small class="form-text text-secondary">*Campo obrigatório</small>
                    </div>
                    <div class="col-12 col-sm-12 col-lg-6">
                        <label for="district" class="text-danger">Bairro*</label>
                        <input type="text" name="district" id="district" class="form-control">
                        <small class="form-text text-secondary">*Campo obrigatório</small>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col text-gray-400 lead">
                        <h5>Contato</h5>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12 col-sm-6 col-lg-6">
                        <label for="email">E-mail</label>
                        <input type="email" name="email" id="" class="form-control" placeholder="example@example.com">
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3">
                        <label for="ct_numb_1">Número para contato 1</label>
                        <input type="text" name="ct_numb" id="txtFone"  maxlength="15" onkeyup="mask_fone();" class="form-control" placeholder="(00) 00000-0000">                    
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3">
                        <label for="ct_numb_2">Número para Contato 2</label>
                        <input type="text" name="ct_numb" id="txtFone2"  maxlength="15" onkeyup="mask_fone2();" class="form-control" placeholder="(00) 00000-0000">                    
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12 col-sm-6 col-lg-6">
                        <label for="fbook">Facebook</label>
                        <input type="email" name="f_book" id="" class="form-control" placeholder="https://www.facebook.com/miha.yu.1840">
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3">
                        <label for="instagram">Instagram</label>
                        <input type="text" name="instagram" id="" class="form-control" placeholder="https://www.instagram.com/_example__/">
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3">
                        <label for="whatsapp">WhatsApp</label>
                        <input type="text" name="whatsapp" id="" class="form-control" placeholder="(00) 00000-0000">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <button type="submit" class="btn btn-danger">Gravar</button>
                        <button type="reset" class="btn btn-secondary">Limpar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
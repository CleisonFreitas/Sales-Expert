@extends('./layouts/main')

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
            @foreach ($company as $c)
                <form action="{{ route('company_updt',$c->id) }}" method="POST">
                @csrf
                @method('PUT')
                    <div class="row mt-3">
                        <div class="col-12 col-sm-3 col-lg-3">
                            <label for="dt_register text-danger">Cadastro</label>
                            <input type="date" value="{{ date('Y-m-d',$c->created_up)}}" name="dt_cadastro" id="" class="form-control mb-2" readonly>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col col-sm-12 col-lg-4">
                            <input type="hidden" name="id" value="{{$c->id}}" id="">
                            <h5 class="text-danger">CEO</h5>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12 col-sm-12 col-lg-6">
                            <input type="text" name="ceo_nome" maxlenght="20" value="{{ $c->ceo_nome }}" id="" class="form-control" >
                            <small class="form-text text-secondary">*Nome(obrigatório)</small>
                            @error('ceo_nome')
                                <small id="emailHelp" class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-12 col-sm-12 col-lg-6">
                            <input type="text" name="ceo_sobrenome"  maxlenght="40" value="{{ $c->ceo_sobrenome }}" id="" class="form-control " >
                            <small class="form-text text-secondary">*Sobrenome(obrigatório)</small>
                            @error('ceo_sobrenome')
                                <small id="emailHelp" class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>

                    </div>
                    <div class="row mt-3">
                        <div class="col-12 col-sm-12 col-lg-12">
                            <label for="f_name" class="text-bold">Razão Social</label>
                            <input type="text" name="empr_nome"  maxlenght="80" value="{{ $c->empr_nome }}" id="" class="form-control">
                            <small class="form-text text-secondary">*Campo obrigatório</small>
                            @error('empr_nome')
                                <small id="emailHelp" class="form-text text-danger">{{$message}}</small>
                            @enderror
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
                            <input type="text" name="cep" value="{{ $c->cep }}" id="cep" maxlength="9" class="form-control" onkeyup="mask_cep();" onblur="pesquisacep(this.value);">                        
                            <small class="form-text text-secondary">*Campo obrigatório</small>
                            @error('cep')
                                <small id="emailHelp" class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="col-12 col-sm-12 col-lg-8">
                            <label for="adress" class="text-danger">Endereço</label>
                            <input type="text" name="endereco" maxlenght="80" value="{{ $c->endereco }}" id="street" class="form-control">
                            <small class="form-text text-secondary">*Campo obrigatório</small>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12 col-sm-12 col-lg-4">
                            <label for="city" class="text-danger">Cidade </label>
                            <input type="text" name="cidade" maxlenght="40" value="{{ $c->cidade }}" id="city" class="form-control">
                            <small class="form-text text-secondary">*Campo obrigatório</small>
                        </div>
                        <div class="col col-sm-12 col-lg-2">
                            <label for="state" class="text-danger">Estado </label>
                            <input type="text" name="uf" value="{{ $c->uf }}" maxlenght="2" id="state" class="form-control">
                            <small class="form-text text-secondary">*Campo obrigatório</small>
                        </div>
                        <div class="col-12 col-sm-12 col-lg-6">
                            <label for="district" class="text-danger">Bairro*</label>
                            <input type="text" name="bairro"  maxlenght="50" value="{{ $c->bairro }}" id="district" class="form-control">
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
                            <input type="email" name="email" maxlenght="80" value="{{ $c->email}}" id="" class="form-control" placeholder="example@example.com">
                        </div>
                        <div class="col-12 col-sm-6 col-lg-3">
                            <label for="ct_numb_1">Número para contato 1</label>
                            <input type="text" name="num_c1"  maxlenght="16" value="{{ $c->num_c1 }}" id="txtFone"  maxlength="15" onkeyup="mask_fone();" class="form-control" placeholder="(00) 00000-0000">                    
                        </div>
                        <div class="col-12 col-sm-6 col-lg-3">
                            <label for="ct_numb_2">Número para Contato 2</label>
                            <input type="text" name="num_c2" id="txtFone2" value="{{ $c->num_c2 }}" maxlength="16" onkeyup="mask_fone2();" class="form-control" placeholder="(00) 00000-0000">                    
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12 col-sm-6 col-lg-6">
                            <label for="fbook">Facebook</label>
                            <input type="text" name="facebook"  maxlenght="50" value="{{ $c->facebook }}" id="" class="form-control" placeholder="https://www.facebook.com/miha.yu.1840">
                        </div>
                        <div class="col-12 col-sm-6 col-lg-3">
                            <label for="instagram">Instagram</label>
                            <input type="text" name="instagram"  maxlenght="50" value="{{ $c->instagram }}" id="" class="form-control" placeholder="https://www.instagram.com/_example__/">
                        </div>
                        <div class="col-12 col-sm-6 col-lg-3">
                            <label for="whatsapp">WhatsApp</label>
                            <input type="text" name="whatsapp"  maxlenght="16" value="{{ $c->whatsapp }}" id="txtWhats" onkeyup="mask_whats();" maxlength="15" class="form-control" placeholder="(00) 00000-0000">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <button type="submit" class="btn btn-danger">Gravar</button>
                            <button type="reset" class="btn btn-secondary">Limpar</button>
                        </div>
                    </div>
                </form>
            @endforeach
        </div>
    </div>
@endsection
@extends('/layouts/main')

@section('title','Formas de Pagamento')

@section('content')

    <div class="card shadow mt-3 mb-4">
        <div class="card-header py-1">
            <div class="row mt-3">
                <div class="col-12 col-sm-6 col-lg-11">
                    <h2 class="text-gray-600">Editar forma de pagamento</h2>
                </div>
                <div class="col-12 col-sm-6 col-lg-1 mx-auto">
                    @foreach ($payment_methods as $p )
                        <a href="{{ route('payment_method_warning',$p->id) }}" class="btn btn-danger btn-circle"><i class="fas fa-trash-alt"></i></a>
                    @endforeach
                </div>
            </div>   
        </div>
        <div class="card-body text-danger">
            <div class="card-header bg-gray-300 ">
                <h5 class="m-0 font-weight-bold text-secondary">Editar forma de pagamento</h5>
            </div>
            @foreach ($payment_methods as $p )
                <form action="{{ route('payment_method_updt',$p->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row mt-3">
                    <div class="col-7 col-sm-7 col-lg-2">
                        <label for="id">ID:</label>
                        <input type="text" name="id" id="" value="{{ $p->id }}" class="form-control bg-gray-300" readonly>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12 col-sm-12 col-lg-12">
                        <label for="descricao">Descrição: </label>
                        <input type="text" name="descricao" value="{{ $p->descricao }}" maxlength:="50" id="" class="form-control" placeholder="Ex: Cartão de Credito (2x)">
                        @error('descricao')<small>{{ $message }}</small>@enderror
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12 col-sm-6 col-lg-2">
                        <label for="initials">Sigla: </label>
                        <input type="text" name="sigla" value="{{ $p->sigla }}" maxlength="3" id="" class="form-control" >
                        @error('sigla')<small>{{ $message }}</small>@enderror
                    </div>
                    <div class="col-12 col-sm-6 col-lg-6">
                        <label for="tipo">Tipo: @error('tipo')<small>{{ $message }}</small>@enderror </label>
                        <select name="tipo" id="" class="custom-select">
                            @switch($p->tipo)
                                @case("M")
                                    <option value="M" selected>Dinheiro</option>
                                    <option value="A">Conta</option>
                                    <option value="C">Cartão</option>
                                @break
                                @case("A")
                                    <option value="M">Dinheiro</option>
                                    <option value="A" selected>Conta</option>
                                    <option value="C">Cartão</option>
                                @break
                                @case("C")
                                    <option value="M">Dinheiro</option>
                                    <option value="A">Conta</option>
                                    <option value="C" selected>Cartão</option>
                                @break
                                
                                @default
                                    
                            @endswitch
                        </select>
                        @error('tipo')<small>{{ $message }}</small>@enderror
                        
                    </div>
                    <div class="col-12 col-sm-6 col-lg-2">
                        <label for="installments">Parcelas:</label>
                        <select name="parcelas" id="" class="custom-select">
                            <option value="{{ $p->parcelas }}" selected>{{ $p->parcelas }}x (Atual)</option>
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
                        <input type="text" name="credito" value="{{ $p->credito }}" id="" class="form-control">
                    </div>
                </div>
                
                <div class="row mt-3">
                    <div class="col-7 col-sm-8 col-lg-10">
                        <button type="submit" class="btn btn-danger">Atualizar</button>
                        <button type="reset" class="btn btn-secondary">Limpar</button>
                    </div>
                    <div class="col-4 col-sm-4 col-lg-2">
                        <a class="btn btn-dark" href="{{ route('payment_method') }}">Nova Forma</a>
                    </div>
                </div>
            </form>
            @endforeach
        </div>
    </div>
@endsection
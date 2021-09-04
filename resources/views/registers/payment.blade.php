@extends('/layouts/main')

@section('title','Formas de Pagamento')

@section('content')

    <div class="card shadow mt-3 mb-4">
        <div class="card-header py-1">
            <h2 class="text-gray-600">Formas de Pagamento</h2>
        </div>
        <div class="card-body text-danger">
            <div class="card-header bg-gray-300 ">
                <h5 class="m-0 font-weight-bold text-secondary">Cadastrar nova forma de pagamento</h5>
            </div>
            <form action="#" method="POST">
                @csrf
                <div class="row mt-3">
                    <div class="col-7 col-sm-7 col-lg-2">
                        <label for="id">ID:</label>
                        <input type="text" name="id" id="" class="form-control bg-gray-300" readonly>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12 col-sm-12 col-lg-12">
                        <label for="id">Descrição:</label>
                        <input type="text" name="name" id="" class="form-control" >
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12 col-sm-6 col-lg-2">
                        <label for="initials">Sigla:</label>
                        <input type="text" name="initials" id="" class="form-control" >
                    </div>
                    <div class="col-12 col-sm-6 col-lg-6">
                        <label for="source">Tipo:</label>
                        <select name="source" id="" class="custom-select">
                            <option value="M">Dinheiro</option>
                            <option value="A">Conta</option>
                            <option value="C">Cartão</option>
                        </select>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-2">
                        <label for="installments">Parcelas:</label>
                        <select name="installments" id="" class="custom-select">
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
                        <input type="text" name="c_days" value="0" id="" class="form-control">
                    </div>
                </div>
                
                <div class="row mt-3">
                    <div class="col-7 col-sm-8 col-lg-10">
                        <button type="submit" class="btn btn-danger">Gravar</button>
                        <button type="reset" class="btn btn-secondary">Limpar</button>
                    </div>
                    <div class="col-4 col-sm-4 col-lg-2">
                        <a class="btn btn-dark" href="#">Consultar</a>
                    </div>
                </div>

            </form>
        </div>
    </div>

@endsection
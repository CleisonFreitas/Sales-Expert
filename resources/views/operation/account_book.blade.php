@extends('/layouts/main')

@section('title','Caixas')

@section('content')

<div class="card shadow mt-3">
    <div class="card-header py-1">
        <h2 class="mb-4 text-gray-800 mt-2">Relatório de Pagamentos</h2>
    </div>
    <div class="card-body text-danger">
        <form action="#" method="POST" class="">
            @csrf
            <div class="row mb-4">
                <div class="col-12 col-sm-8 col-lg-3">
                    <label for="dt_procedimento" class="col-form-label">Data:</label>
                    <input type="date" name="dt_procedimento" id="" value="{{ Date('Y-m-d') }}" class="form-control" readonly>
                </div>
                <div class="col-12 col-sm-8 col-lg-2">
                    <label for="hr_procedimento" class="col-form-label">Hora:</label>
                    <input type="text" name="dt_procedimento" id="" value="{{ Date('H:i:s') }}" class="form-control" readonly>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-12 col-sm-12 col-lg-12">
                    <label for="caixa">Caixa</label>
                    <select name="caixa" id="" class="custom-select">
                        <option value="001">Caixa Vendas</option>
                        <option value="002">Caixa Compras</option>
                    </select>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-12 col-sm-12 col-md-12 col-lg-4">
                    <label for="dt_abertura">Data de Abertura:</label>
                    <input type="date" name="" id="" value="{{date('Y-m-d')}}" class="form-control">
                </div>
                <div class="col-12 col-sm-12 col-md-12 col-lg-4">
                    <label for="dt_fechamento">Data de Fechamento:</label>
                    <input type="date" name="" id="" class="form-control">
                </div>
                <div class="col-12 col-sm-6 col-lg-2">
                    <label for="anual">Ano:</label>
                    <input type="text" name="ano_abertura" value="{{date('Y')}}" id="" class="form-control">
                </div>
                <div class="col-12 col-sm-6 col-lg-2">
                    <label for="lote">Lote:</label>
                    <input type="text" name="ano_abertura" id="" class="form-control" readonly>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-12 col-sm-6 col-lg-8">
                    <div class="row mt-3">
                        <div class="col">
                            <small class="text-form text-secondary">*Salvar procedimento</small>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col">
                            <button type="submit" class="btn btn-danger">Gravar</button>
                            <button type="submit" class="btn btn-secondary">Fechar</button>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="row mt-3">
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
                </div>

            </div><!-- Fim -->
        </form>
    </div>
</div>



@endsection
@extends('/layouts/main')

@section('title','Relatório de Pagamentos')

@section('content')

<div class="card shadow mt-3 mb-1">
    <div class="card-header py-1">
        <h2 class="mb-4 text-gray-800 mt-2">Relatório de Pagamentos</h2>
    </div>
    <div class="card-body text-danger">
        <div class="card-header bg-gray-300">
            <h5 class="m-0 font-weight-bold text-secondary">Relatório de pagamentos por período</h5>
        </div>
        <form action="{{ route('archive.payment.report') }}" target="_blank" method="POST" class="">
            @csrf

            <div class="row mt-3">
                <div class="col-12 col-sm-12 col-lg-3">
                    <label for="dt_inicial">Data inicial</label>
                    <input type="date" name="dt_inicial" id="" class="form-control">
                </div>
                <div class="col-12 col-sm-12 col-lg-3">
                    <label for="dt_inicial">Data final</label>
                    <input type="date" name="dt_final" id="" class="form-control">                           
                </div>
                <div class="col-12 col-sm-12 col-lg-6">
                    <label for="srv-prod">Serviço:</label>
                    <select name="service_id" id="" class="custom-select">
                        <option value="%">Todos</option>
                        @foreach ($services as $service)
                            <option value="{{ $service->id }}">{{ $service->descricao }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <small class="text-form text-muted">*Período de pagamento inicial e final</small>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-12 col-sm-12 col-lg-4">
                    <label for="cep">CEP:</label>
                    <input type="text" name="cep" id="cep" maxlength="9" class="form-control" onkeyup="mask_cep();">
                </div>
            </div>
            <div class="row mt-2">
                <div class="col">
                    <button type="submit" class="btn bg-gray-400">Relatório&nbsp; <img src="https://img.icons8.com/ios-filled/30/000000/pdf--v2.png"/></button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
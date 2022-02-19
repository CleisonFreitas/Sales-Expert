
    @foreach ($company as $company)
    <div class="row mt-2">
        <div class="col-12 col-md-12 col-lg-12">
            <h3>{{ $company->empr_nome }}</h3>
        </div>
    </div>

    <div class="row mt-2">
        <div class="col-12 col-md-12 col-lg-12">
            <h5>Endereço: {{ $company->endereco }} - {{ $company->uf }}</h5>
        </div>
    </div>

    <div class="row mt-2">
        <div class="col-12 col-md-12 col-lg-12">
            <h5>Telefone: {{ $company->num_c1 }}</h5>
        </div>
    </div>

    <div class="row mt-2 mb-4">
        <div class="col-12 col-md-12 col-lg-12">
          <h5>Email: {{ $company->email }}</h5>
        </div>
    </div>
@endforeach

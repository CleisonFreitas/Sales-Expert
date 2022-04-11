
    @foreach ($company as $company)
    <div class="row mt-2">
        <div class="col-12 col-md-12 col-lg-12">
            <h3>{{ $company->empr_nome }}</h3>
        </div>
    </div>

    <div class="row mt-2">
        <div class="col-6 col-md-6 col-lg-6">
            <h5>CEP: {{ $company->cep }}</h5>
        </div>
        <div class="col-6 col-md-6 col-lg-6">
            <h5>Endereco: {{ $company->endereco }}</h5>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
            <h5>Bairro: {{ $company->bairro }},     Cidade:{{ $company->cidade }} - {{ $company->uf }} </h5>
        </div>
    </div>

    <div class="row mt-2">
        <div class="col-12 col-md-12 col-lg-12">
            <h5>Telefone: {{ $company->num_c1 }}, WhatsApp: {{ $company->whatsapp }}</h5>
        </div>
    </div>

    <div class="row mt-2 mb-4">
        <div class="col-12 col-md-12 col-lg-12">
          <h5>Email: {{ $company->email }} Instagram: {{ $company->instagram }} </h5>
        </div>
    </div>
    <hr>
@endforeach

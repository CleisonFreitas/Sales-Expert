
    @foreach ($company as $company)
    <div class="row mt-2">
        <div class="col-12 col-md-12 col-lg-12">
            <h3>{{ $company->empr_nome }}</h3>
        </div>
    </div>
    <div class="row mt-1">
        <div class="col-12 col-md-12 col-lg-12">
            <h5>Usuário: &nbsp;{{ Auth::user()->name }}</h5>
        </div>
    </div>
    
    <hr>
@endforeach

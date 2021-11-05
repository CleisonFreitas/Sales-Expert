@extends('/layouts/main')

@section('title','Caixa')

@section('content')

<div class="card shadow mt-3">
    
    <div class="card-header">
        <div class="row">
            <div class="col-12 col-sm-12 col-lg-6">
                <h2 class="text-gray-800 mt-2">Controle de caixa</h2>
            </div>
            <div class="col-12 col-sm-12 col-lg-6">
                <nav class="mx-auto">
                    <ul class="nav nav-pills justify-content-end" id="pills-tab" role="tablist">
        
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active btn-sm" id="nav-home-ta" data-toggle="pill" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Abertura/Fechamento</a>
                        </li>
        
                        <li class="nav-item" role="presentation">
                            <a class="nav-link btn-sm" id="nav-prdserv-tab" data-toggle="pill" href="#nav-prdserv" role="tab" aria-controls="nav-prdserv" aria-selected="false">Novo caixa</i></a>
                        </li>

                        <li class="nav-item" role="presentation">
                            <a class="nav-link btn-sm" id="nav-account-tab" data-toggle="pill" href="#nav-chgcaix" role="tab" aria-controls="nav-chgcaix" aria-selected="false">Caixas</i></a>
                        </li>
        
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
            @yield('caixa')
                    
            
        </div><!-- Fim -->
    </div>
    </div>
        <div class="tab-pane fade" id="nav-prdserv" role="tabpanel" aria-labelledby="nav-prdserv-tab">
            @include("components.account_ref_create")
        </div>

        <div class="tab-pane fade" id="nav-chgcaix" role="tabpanel" aria-labelledby="nav-account-tab">
            @include("components.responsive-table-account")
        </div>
    </div>
</div>



@endsection
@extends("layouts.account_book")

@section('caixa')

<div class="card-body text-danger">
    <div class="card-header bg-gray-300">
        <h5 class="m-0 font-weight-bold text-secondary">Abertura de caixa</h5>
    </div>
    <form action="{{ route('account.book.open') }}" method="POST" class="">
        @csrf

        @include("components.account_book_form")

        <div class="row mt-2">
            <div class="col-12 col-sm-6 col-lg-8">
                <div class="row mt-3">
                    <div class="col">
                        <small class="text-form text-secondary">*Abertura de Caixa</small>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col">
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#abrirCaixa">Abrir</button>

                    </div>
                </div>

                <!-- Modal para abertura de caixa -->
                <div class="modal fade" id="abrirCaixa" tabindex="-1" aria-labelledby="abrirCaixaLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-gray-600" id="abrirCaixaLabel">Abertura de caixa</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <h6 class="text-form text-gray-600">
                                    <i class="fas fa-exclamation-circle mx-3" style="color:red;"></i>
                                    Deseja realmente abrir esse caixa?
                                </h6>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-danger" >Sim</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- #Abertura de caixa -->
                </form>
            </div>

@endsection

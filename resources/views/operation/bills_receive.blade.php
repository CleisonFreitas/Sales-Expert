@extends('layouts.main')

@section('title','Lançamentos')

@section('content')

<div class="card shadow mt-3">
    <div class="card-header py-1">
        <div class="row">
            <div class="col-6 col-sm-6 col-lg-6">
                <h2 class="text-gray-800 mt-2 d-flex">Contas à Receber</h2>
            </div>
            <div class="col-6 col-sm-6 col-lg-6">
                <nav class="mx-auto mt-2">
                    <ul class="nav nav-pills justify-content-end" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link btn-sm" id="nav-list-tab" data-toggle="pill" href="#nav-list" role="tab" aria-controls="nav-list" aria-selected="false"><i class="fas fa-list-alt"></i></a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active btn-sm" id="nav-new-tab" data-toggle="pill" href="#nav-new" role="tab" aria-controls="nav-new" aria-selected="true"><i class="fas fa-receipt"></i></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <div class="card-body text-danger">
        @include('components.posting_account')
    </div>
</div>
@endsection

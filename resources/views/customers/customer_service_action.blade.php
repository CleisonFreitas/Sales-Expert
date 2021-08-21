@extends('/main')

@section('title','Customer Service')

@section('content')

    <div class="card shadow mt-3 mb-4">
        <div class="card-header py-1">
            <h2 class="mb-4 text-gray-600 mt-2">Customer Service</h2>
        </div>
        <div class="card-body text-danger">
            <form action="#" method="POST">
                @csrf
                <div class="row">
                    <div class="col-12 col-sm-8 col-lg-3">
                        <label for="st_date">Start Date:</label>
                        <input type="date" name="st_date" value="{{ date('Y-m-d') }}"  id="" class="form-control">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12 col-sm-6 col-lg-2">
                        <label for="id">ID:</label>
                        <input type="text" name="id" id="" class="form-control" readonly>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3">
                        <label for="st_hour">Start Hour:</label>
                        <input type="text" name="st_hour" value="{{ date('H:i:s') }}" id="" class="form-control">
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3">
                        <label for="ed_hour">End Hour:</label>
                        <input type="text" name="ed_date" value="" id="" class="form-control">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12 col-sm-12 col-lg-12">
                        <label for="service">Professional*</label>
                        <select name="pf_service" id="" class="custom-select">
                            <option value="#">Jessica Andrade</option>
                        </select>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12 col-sm-12 col-lg-6">
                        <label for="service">Product/Service</label>
                        <select name="prd_serv" id="" class="custom-select">
                            <option value="#">Health Care</option>
                            <option value="#">Skin Drainage</option>
                        </select>
                    </div>
                    <div class="col-12 col-sm-12 col-lg-6">
                        <label for="customer">Customer:</label>
                        <input type="text" name="ct_id" value="Cleison Freitas" id="" class="form-control">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12 col-sm-12 col-lg-12">
                        <label for="description">Description*</label>
                        <input type="text" name="descr" id="" class="form-control">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12 col-sm-12 col-lg-12">
                        <label for="note">Note:</label>
                        <textarea name="note" id="" cols="30" rows="5" class="form-control"></textarea>
                    </div>      
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <button class="btn btn-danger">Submit</button>
                        <button class="btn btn-secondary">Clear</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
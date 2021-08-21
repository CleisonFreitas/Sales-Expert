@extends('/main')

@section('title','Company')

@section('content')

    <div class="card shadow mt-3 mb-4">
        <div class="card-header py-1">
            <h2 class="mb-4 text-gray-600 mt-2">Company Register Form</h2>
        </div>
        <div class="card-body text-danger">
            <form action="#" method="POST">
            @csrf
                <div class="row">
                    <div class="col-12 col-sm-3 col-lg-3">
                        <label for="dt_register">Register</label>
                        <input type="date" value="{{ date('Y-m-d')}}" name="dt_cadastro" id="" class="form-control mb-2">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col col-sm-12 col-lg-4">
                        <h5>Business Owner *</h5>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12 col-sm-12 col-lg-6">
                        <input type="text" name="first_n" id="" class="form-control">
                            <small class="text-muted">First Name</small>
                    </div>
                    <div class="col-12 col-sm-12 col-lg-6">
                        <input type="text" name="last_n" id="" class="form-control">
                            <small class="text-muted">Last Name</small>
                    </div>

                </div>
                <div class="row mt-3">
                    <div class="col-12 col-sm-12 col-lg-12">
                        <label for="f_name">Business Name *</label>
                        <input type="text" name="f_name" id="" class="form-control " placeholder="">
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col text-gray-400 lead">
                        <h5>Localization*</h5>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12 col-sm-12 col-lg-4">
                        <label for="zip_code">Zip code*</label>
                        <input type="text" name="zip_code" id="" class="form-control" onblur="pesquisacep(this.value);">
                    </div>
                    <div class="col-12 col-sm-12 col-lg-8">
                        <label for="adress">Adress*</label>
                        <input type="text" name="street" id="street" class="form-control">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12 col-sm-12 col-lg-4">
                        <label for="city">City*</label>
                        <input type="text" name="city" id="city" class="form-control">
                    </div>
                    <div class="col col-sm-12 col-lg-2">
                        <label for="state">State/Province*</label>
                        <input type="text" name="state" id="state" class="form-control">
                    </div>
                    <div class="col-12 col-sm-12 col-lg-6">
                        <label for="adress">District*</label>
                        <input type="text" name="district" id="district" class="form-control">
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col text-gray-400 lead">
                        <h5>Contact*</h5>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12 col-sm-6 col-lg-6">
                        <label for="email">E-mail</label>
                        <input type="email" name="email" id="" class="form-control">
                        <small class="text-muted">example@example.com</small>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3">
                        <label for="ct_numb_1">Contact Number 1</label>
                        <input type="text" name="ct_numb" id="" class="form-control" placeholder="(000) 000-0000">
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3">
                        <label for="ct_numb_2">Contact Number 2</label>
                        <input type="text" name="ct_numb" id="" class="form-control" placeholder="(000) 000-0000">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12 col-sm-6 col-lg-6">
                        <label for="fbook">Facebook</label>
                        <input type="email" name="f_book" id="" class="form-control">
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3">
                        <label for="instagram">Instagram</label>
                        <input type="text" name="instagram" id="" class="form-control">
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3">
                        <label for="whatsapp">WhatsApp</label>
                        <input type="text" name="whatsapp" id="" class="form-control" placeholder="(000) 000-0000">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <button type="submit" class="btn btn-danger">Send</button>
                        <button type="reset" class="btn btn-secondary">Clear</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
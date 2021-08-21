@extends('/main')

@section('title','Supplier')

@section('content')

    <div class="card shadow mt-3 mb-4">
        <div class="card-header py-1">
            <h2 class="mb-4 text-gray-600 mt-2">Supplier Method Registration</h2>
        </div>
        <div class="card-body text-danger">

            <nav>
                <ul class="nav nav-pills mb-3 justify-content-end" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active btn-sm" id="nav-home-ta" data-toggle="pill" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Home</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link btn-sm" id="nav-contact-tab" data-toggle="pill" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Contact</a>
                    </li>
                </ul>
            </nav>
            <form action="#" method="POST">
                    @csrf
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <!-- Main -->
                            <div class="row mt-2 mb-3">
                                <div class="col-12 col-sm-9 col-lg-3">
                                    <label for="register">Register:</label>
                                    <input type="date" value="{{ date('Y-m-d') }}" id="" class="form-control">
                                </div>
                            </div>

                            <div class="row mt-2 mb-3">
                                <div class="col-12 col-sm-9 col-lg-2">
                                    <label for="id">ID:</label>
                                    <input type="text" name="id" id="" class="form-control" readonly>
                                </div>
                                <div class="col-12 col-sm-9 col-lg-2">
                                    <label for="status">Status:</label>
                                    <select name="status" id="" class="custom-select">
                                        <option value="on">ON</option>
                                        <option value="off">OFF</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mt-2 mb-3">
                                <div class="col-12 col-sm-12 col-lg-12">
                                    <label for="name">Name*</label>
                                    <input type="text" name="name" id="" class="form-control">
                                </div>
                            </div>

                            <div class="row mt-2 mb-3">
                                <div class="col">
                                    <h5 class="text-gray-400">Localization*</h5>
                                </div>
                            </div>

                            <div class="row mt-2 mb-3">
                                <div class="col-12 col-sm-12 col-lg-4">
                                    <label for="zip_code">Zip Code:</label>
                                    <input type="text" name="zip_code" id="" class="form-control"  onblur="pesquisacep(this.value);">
                                </div>
                                <div class="col-12 col-sm-12 col-lg-8">
                                    <label for="adress">Adress:</label>
                                    <input type="text" name="street" id="" class="form-control">
                                </div>
                            </div>

                            <div class="row mt-2 mb-3">
                                <div class="col-9 col-sm-9 col-lg-4">
                                    <label for="city">City:</label>
                                    <input type="text" name="city" id="city" class="form-control">
                                </div>
                                <div class="col-3 col-sm-3 col-lg-2">
                                    <label for="state">State:</label>
                                    <input type="text" name="state" id="state" class="form-control">
                                </div>
                                <div class="col-12 col-sm-12 col-lg-6">
                                    <label for="district">District:</label>
                                    <input type="text" name="district" id="district" class="form-control">
                                </div>
                            </div>

                            <div class="row mt-2 mb-3">
                                <div class="col">
                                    <h5 class="text-gray-400">Type of Business*</h5>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="product">Product: </label>
                                <div class="col ">
                                    <textarea name="product" id="" cols="30" rows="5" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="service">Service: </label>
                                <div class="col">
                                    <textarea name="service" id="" cols="30" rows="5" class="form-control"></textarea>
                                </div>
                            </div>

                        <!-- #Main -->
                    </div>
                    <!-- Contact -->
                    <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">

                        <div class="row mt-2 mb-3">
                            <div class="col">
                                <h5 class="text-gray-400">Contact*</h5>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12 col-sm-12 col-lg-8">
                                <label for="email">E-mail</label>
                                <input type="text" name="email" id="" class="form-control">
                            </div>
                            <div class="col-12 col-sm-12 col-lg-4">
                                <label for="ct_numb">Contact Number:</label>
                                <input type="text" name="ct_numb" id="" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12 col-sm-12 col-lg-4">
                                <label for="whatsapp">WhatsApp:</label>
                                <input type="text" name="whatsapp" id="" class="form-control">
                            </div>
                            <div class="col-12 col-sm-12 col-lg-4">
                                <label for="facebook">Facebook:</label>
                                <input type="text" name="f_book" id="" class="form-control">
                            </div>
                            <div class="col-12 col-sm-12 col-lg-4">
                                <label for="col-12 col-sm-12 col-lg-4">Instagram:</label>
                                <input type="text" name="instagram" id="" class="form-control">
                            </div>
                        </div>
                    </div>
                    <!-- #Contact -->
                </div>
                <div class="row mt-2 mb-3">
                    <div class="col">
                        <button type="submit" class="btn btn-danger">Send</button>
                        <button type="reset" class="btn btn-secondary">Clear</button>
                    </div>
                </div>
            </form>
    </div>
</div>


@endsection
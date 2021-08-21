@extends('/main')

@section('title','Employer')

@section('content')

    <div class="card shadow mt-3 mb-4">
        <div class="card-header py-1">
            <h2 class="mb-4 text-gray-600 mt-2">Employer Method Registration</h2>
        </div>
        <div class="card-body text-danger">

            <form action="#" method="POST">
                @csrf

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
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <!-- Main -->
                        <div class="row mt-2 mb-3">
                            <div class="col-5 col-sm-12 col-lg-3">
                                <label for="dt_register">Register:</label>
                                <input type="date" name="dt_register" value="{{ date('Y-m-d') }}" id="" class="form-control">
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

                        <div class="row mb-3">
                            <div class="col-12 col-sm-12 col-lg-9">
                                <label for="f_name">FullName*</label>
                                <input type="text" name="f_name" id="" class="form-control">
                            </div>
                            <div class="col-12 col-sm-12 col-lg-3">
                                <label for="b_day">Birthday:</label>
                                <input type="date" name="" id="" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12 col-sm-12 col-lg-4">
                                <label for="itin">ITIN:</label>
                                <input type="text" name="itin" id="" class="form-control">
                            </div>
                            <div class="col-12 col-sm-6 col-lg-5">
                                <label for="ssn">SSN:</label>
                                <input type="text" name="ssn" id="" class="form-control">
                            </div>
                            <div class="col-12 col-sm-6 col-lg-3">
                                <label for="gender">Gender:</label>
                                <select name="gender" id="" class="custom-select">
                                    <option value="M">Male</option>
                                    <option value="F">Female</option>
                                    <option value="O">Other</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="row mt-2 mb-3">
                            <div class="col">
                                <h5 class="text-gray-400">Localization*</h5>
                            </div>
                        </div>
                        <div class="row mt-2 mb-3">
                            <div class="col-12 col-sm-12 col-lg-3">
                                <label for="zip_code">Zip Code: </label>
                                <input type="text" name="zip_code" id="" class="form-control" onblur="pesquisacep(this.value);">
                            </div>
                            <div class="col-8 col-sm-9 col-lg-7">
                                <label for="street">Street: </label>
                                <input type="text" name="street" id="street" class="form-control">
                            </div>
                            <div class="col-4 col-sm-3 col-lg-2">
                                <label for="n_home">Number: </label>
                                <input type="text" name="n_home" id="" class="form-control">
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

                        <!-- #Main -->
                    </div>

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
                            <div class="col">
                                <label for="col-12 col-sm-12 col-lg-4">Instagram:</label>
                                <input type="text" name="instagram" id="" class="form-control">
                            </div>
                        </div>
                    </div>
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
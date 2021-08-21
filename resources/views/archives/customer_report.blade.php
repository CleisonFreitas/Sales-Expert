@extends('/main')

@section('title','Customers Reports')

@section('content')

    <div class="card shadow mt-3 mb-4">
        <div class="card-header py-1">
            <h2 class="mb-4 text-gray-600 mt-2">Customers Reports</h2>
        </div>
        <div class="card-body text-danger">

            <form action="#" method="POST">
                @csrf
                    <div class="row">
                        <!-- Divisão de Layout -->
                        <div class="col-12 col-sm-12 col-lg-6">
                            <div class="row">
                                <div class="col">
                                    <h5 class="text-secondary">Registration Date</h5>
                                </div>
                            </div>
                        
                            <div class="row mt-3">
                                <div class="col">
                                    <input type="date" name="" id="st_date" value="{{ Date('Y-m-d') }}" class="form-control">
                                        <label for="st-date">
                                            <small id="st_date" class="form-text text-danger ">Start Date*</small>
                                        </label>
                                </div>
                                <div class="col">
                                    <input type="date" name="" id="end_date" value="{{ Date('Y-m-d') }}" class="form-control">
                                        <label for="en-date mx-auto">
                                            <small id="end_date" class="form-text text-danger ">End Date*</small>
                                        </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-lg-6">
                            <div class="row">
                                <div class="col">
                                    <h5 class="text-secondary">Birth date</h5>
                                </div>
                            </div>
                            
                            <div class="row mt-3">
                                <div class="col">
                                    <input type="date" name="" id="st_date" value="{{ Date('Y-m-d') }}" class="form-control">
                                        <label for="st-date">
                                            <small id="st_date" class="form-text text-danger ">Start Date*</small>
                                        </label>
                                </div>
                                <div class="col">
                                    <input type="date" name="" id="end_date" value="{{ Date('Y-m-d') }}" class="form-control">
                                        <label for="en-date mx-auto">
                                            <small id="end_date" class="form-text text-danger ">End Date*</small>
                                        </label>
                                </div>
                            </div>
                        </div>

                        <!-- #Divisão -->
                    </div>
            </form>
        </div>
    </div>

@endsection
@extends('/main')

@section('title','Product & Services')

@section('content')

    <div class="card shadow mt-3 mb-4">
        <div class="card-header py-1">
            <h2 class="mb-4 text-gray-600 mt-2">Product & Service</h2>
        </div>
        <div class="card-body text-danger">
            <form action="#" method="POST">
                @csrf
                <div class="row mt-3">
                    <div class="col-8 col-sm-6 col-lg-3">
                        <label for="register">Register: </label>
                        <input type="date" name="register" value="{{ date('Y-m-d') }}" id="" class="form-control">
                    </div>
                    <div class="col-8 col-sm-6 col-lg-2">
                        <label for="status">Status:</label>
                        <select name="status" id="" class="custom-select">
                            <option value="on">ON</option>
                            <option value="off">OFF</option>
                        </select>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-8 col-sm-6 col-lg-2">
                        <label for="id">ID:</label>
                        <input type="text" name="id" id="" class="form-control" readonly>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-12 col-sm-12 col-lg-12">
                        <label for="description">Description</label>
                        <input type="text" name="description" id="" class="form-control">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-8 col-sm-8 col-lg-2">
                        <label for="category">Category: </label>
                        <select name="category" id="" class="custom-select">
                            <option value="product">Product</option>
                            <option value="service">Service</option>
                        </select>
                    </div>
                    <div class="col-8 col-sm-8 col-lg-2">
                        <label for="price">Price: </label>
                        <input type="text" name="price" id="" class="form-control">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <button type="submit" class="btn btn-danger">Submit</button>
                        <button type="reset" class="btn btn-secondary">Clear</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@extends('/main')

@section('title','Payment Forms')

@section('content')

    <div class="card shadow mt-3 mb-4">
        <div class="card-header py-1">
            <h2 class="mb-4 text-gray-600 mt-2">Payment Method Registration</h2>
        </div>
        <div class="card-body text-danger">

            <form action="#" method="POST">
                @csrf
                <div class="row mt-3">
                    <div class="col-7 col-sm-7 col-lg-2">
                        <label for="id">ID:</label>
                        <input type="text" name="id" id="" class="form-control" readonly>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12 col-sm-12 col-lg-12">
                        <label for="id">Description:</label>
                        <input type="text" name="name" id="" class="form-control" >
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12 col-sm-6 col-lg-2">
                        <label for="initials">Initials:</label>
                        <input type="text" name="initials" id="" class="form-control" >
                    </div>
                    <div class="col-12 col-sm-6 col-lg-6">
                        <label for="source">Source:</label>
                        <select name="source" id="" class="custom-select">
                            <option value="M">Money</option>
                            <option value="A">Account</option>
                            <option value="C">Card</option>
                        </select>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-2">
                        <label for="installments">Installments:</label>
                        <select name="installments" id="" class="custom-select">
                            <option value="1">1x</option>
                            <option value="2">2x</option>
                            <option value="3">3x</option>
                            <option value="4">4x</option>
                            <option value="5">5x</option>
                            <option value="6">6x</option>
                            <option value="7">7x</option>
                            <option value="8">8x</option>
                            <option value="9">9x</option>
                            <option value="10">10x</option>
                            <option value="11">11x</option>
                            <option value="12">12x</option>
                        </select>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-2">
                        <label for="credit">Credit Days</label>
                        <input type="text" name="c_days" value="0" id="" class="form-control">
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
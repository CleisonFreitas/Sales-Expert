<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomerService;
use App\Models\Employer;

class CustomerServiceController extends Controller
{
    public function show(){
        $cliente = Customer::all();
        return view('customers.service.customer_service');
    }
}

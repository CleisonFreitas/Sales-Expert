<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\PaymentMethodController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CustomerServiceController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Registers - Company

Route::get('/company',              [CompanyController::class, 'show'])->name('company')->middleware(['auth']);
Route::post('/company/create',      [CompanyController::class, 'register'])->name('company_register')->middleware(['auth']);
Route::put('/company/update/{id}',  [CompanyController::class, 'update'])->name('company_updt')->middleware(['auth']);

// Registers - Employer
Route::get('/employer',             [EmployerController::class, 'show'])->name('employer')->middleware(['auth']);
Route::post('/employer/create',     [EmployerController::class, 'create'])->name('employer_create')->middleware(['auth']);
Route::get('/employer/edit/{id}',   [EmployerController::class, 'edit'])->name('employer_edit')->middleware(['auth']);
Route::put('/employer/update/{id}', [EmployerController::class, 'updt'])->name('employer_updt')->middleware(['auth']);
Route::get('/employer/warning/{id}',[EmployerController::class, 'warning'])->name('employer_warning')->middleware(['auth']);
Route::get('/employer/delete/{id}', [EmployerController::class, 'delete'])->name('employer_delete')->middleware(['auth']);

//Registers - Supplier
Route::get('/supplier',                 [SupplierController::class, 'show'])->name('supplier')->middleware(['auth']);
Route::post('/supplier/create',         [SupplierController::class, 'create'])->name('supplier_create')->middleware(['auth']);
Route::get('/supplier/edit/{id}',       [SupplierController::class, 'edit'])->name('supplier_edit')->middleware(['auth']);
Route::put('/supplier/update/{id}',     [SupplierController::class, 'updt'])->name('supplier_update')->middleware(['auth']);
Route::get('/supplier/warning/{id}',    [SupplierController::class, 'warning'])->name('supplier_warning')->middleware(['auth']);
Route::get('/supplier/delete/{id}',     [SupplierController::class, 'delete'])->name('supplier_delete')->middleware(['auth']);

//Registers - Payments
Route::get('/payment_method',                   [PaymentMethodController::class, 'show'])->name('payment_method')->middleware(['auth']);
Route::post('/payment_method/create',           [PaymentMethodController::class, 'create'])->name('payment_method_create')->middleware(['auth']);
Route::get('/payment_method/edit/{id}',         [PaymentMethodController::class, 'edit'])->name('payment_method_edit')->middleware(['auth']);
Route::put('/payment_method/update/{id}',       [PaymentMethodController::class, 'updt'])->name('payment_method_updt')->middleware(['auth']);
Route::get('/payment_method/warning/{id}',      [PaymentMethodController::class, 'warning'])->name('payment_method_warning')->middleware(['auth']);
Route::get('/payment_method/delete/{id}',       [PaymentMethodController::class, 'delete'])->name('payment_method_delete')->middleware(['auth']);


// Customers - Customer
Route::get('/customer',                     [CustomerController::class, 'show'])->name('customer')->middleware(['auth']);
Route::post('/customer/create',             [CustomerController::class, 'create'])->name('customer_create')->middleware(['auth']);
Route::get('/customer/edit/{id}',           [CustomerController::class, 'edit'])->name('customer_edit')->middleware(['auth']);
Route::put('/customer/update/{id}',         [CustomerController::class, 'updt'])->name('customer_updt')->middleware(['auth']);
Route::get('/customer/warning/{id}',        [CustomerController::class, 'warning'])->name('customer_warning')->middleware(['auth']);
Route::get('/customer/delete/{id}',         [CustomerController::class, 'delete'])->name('customer_delete')->middleware(['auth']);

// Customers - Service
Route::get('customers_service',             [CustomerServiceController::class, 'show'])->name('customer_service')->middleware(['auth']);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('reports/dashboard');
})->middleware(['auth'])->name('dashboard');


Route::get('/product&service', function () {
    return view('registers/service');
})->middleware(['auth'])->name('service');

// Customer

Route::get('/customer_service_action', function () {
    return view('customers/customer_service_action');
})->middleware(['auth'])->name('customer_action');

// Archives

Route::get('/archives/customer_report', function () {
    return view('archives/customer_report');
})->middleware(['auth'])->name('archive.customer');

Route::get('/archives/payments_report', function () {
    return view('archives/payment_report');
})->middleware(['auth'])->name('payment.report');

// Operation
Route::get('/operation/accountability', function () {
    return view('operation/account_book');
})->middleware(['auth'])->name('account.book');
Route::get('/operation/posting account', function () {
    return view('operation/posting_account');
})->middleware(['auth'])->name('posting.account');

require __DIR__.'/auth.php';

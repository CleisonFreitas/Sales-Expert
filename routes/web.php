<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\PaymentMethodController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CustomerServiceController;
use App\Http\Controllers\AccountBookController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\AccountReferenceController;
use App\Http\Controllers\CustomerReportController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\RescheduleController;
use App\Http\Controllers\ServiceController;
use App\Models\CustomerService;

//use alert;

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
Route::middleware(['auth'])->group(function () {

    Route::get('/company',              [CompanyController::class, 'show'])->name('company');
    Route::post('/company/create',      [CompanyController::class, 'register'])->name('company_register');
    Route::put('/company/update/{id}',  [CompanyController::class, 'update'])->name('company_updt');

    Route::get('dashboard',                     [HomeController::class, 'index'])->name('dashboard');
    Route::post('search',                       [HomeController::class,'search'])->name('search');
    Route::post('dashboard/note',               [HomeController::class,'nota'])->name('note_create');
    Route::put('dashboard/note/update/{id}',    [HomeController::class,'nota_update'])->name('note_update');
    Route::get('dashboard/note/delete/{id}',    [HomeController::class,'nota_delete'])->name('note_delete');
    Route::get('dashboard/relatorio-pdf',       [HomeController::class,'dashpdf'])->name('dashboard_pdf');



    // Registers - Employer
    Route::get('/employer',             [EmployerController::class, 'show'])->name('employer');
    Route::post('/employer/create',     [EmployerController::class, 'create'])->name('employer_create');
    Route::get('/employer/edit/{id}',   [EmployerController::class, 'edit'])->name('employer_edit');
    Route::put('/employer/update/{id}', [EmployerController::class, 'updt'])->name('employer_updt');
    Route::get('/employer/warning/{id}',[EmployerController::class, 'warning'])->name('employer_warning');
    Route::get('/employer/delete/{id}', [EmployerController::class, 'delete'])->name('employer_delete');

    //Registers - Supplier
    /*
    Route::get('/supplier',                 [SupplierController::class, 'show'])->name('supplier');
    Route::post('/supplier/create',         [SupplierController::class, 'create'])->name('supplier_create');
    Route::get('/supplier/edit/{id}',       [SupplierController::class, 'edit'])->name('supplier_edit');
    Route::put('/supplier/update/{id}',     [SupplierController::class, 'updt'])->name('supplier_update');
    Route::get('/supplier/warning/{id}',    [SupplierController::class, 'warning'])->name('supplier_warning');
    Route::get('/supplier/delete/{id}',     [SupplierController::class, 'delete'])->name('supplier_delete');
    */
    //Registers - Payments
    Route::get('/payment_method',                   [PaymentMethodController::class, 'show'])->name('payment_method');
    Route::post('/payment_method/create',           [PaymentMethodController::class, 'create'])->name('payment_method_create');
    Route::get('/payment_method/edit/{id}',         [PaymentMethodController::class, 'edit'])->name('payment_method_edit');
    Route::put('/payment_method/update/{id}',       [PaymentMethodController::class, 'updt'])->name('payment_method_updt');
    Route::get('/payment_method/warning/{id}',      [PaymentMethodController::class, 'warning'])->name('payment_method_warning');
    Route::get('/payment_method/delete/{id}',       [PaymentMethodController::class, 'delete'])->name('payment_method_delete');

    //Register - Services
    Route::get('/services',                 [ServiceController::class, 'index'])->name('services');
    Route::post('services/store',           [ServiceController::class, 'store'])->name('services_create');
    Route::get('/services/edit/{id}',       [ServiceController::class,'edit'])->name('services_edit');
    Route::get('/services/delete/{id}',     [ServiceController::class, 'destroy'])->name('services_delete');
    Route::put('services/update/{id}',      [ServiceController::class, 'update'])->name('services_update');

    // Customers - Customer
    Route::get('/customer',                     [CustomerController::class, 'show'])->name('customer');
    Route::post('/customer/create',             [CustomerController::class, 'create'])->name('customer_create');
    Route::get('/customer/edit/{id}',           [CustomerController::class, 'edit'])->name('customer_edit');
    Route::put('/customer/update/{id}',         [CustomerController::class, 'updt'])->name('customer_updt');
    Route::get('/customer/warning/{id}',        [CustomerController::class, 'warning'])->name('customer_warning');
    Route::get('/customer/delete/{id}',         [CustomerController::class, 'delete'])->name('customer_delete');

    // Customers - Service
    Route::get('/customer_services',                             [CustomerServiceController::class, 'show'])->name('customer_service');
    Route::get('/customer_services/customer/{id}',               [CustomerServiceController::class, 'shop'])->name('customer_shop');
    Route::post('/customer_services/create',                     [CustomerServiceController::class, 'store'])->name('customer_service_create');
    Route::get('/customer_services/edit/{ordem}',                [CustomerServiceController::class, 'edit'])->name('service_edit');
    Route::post('/customer_services/payment',                    [CustomerServiceController::class, 'payment'])->name('service_payment');
    Route::get('/customer_services/payment/warning/{id}',        [CustomerServiceController::class,'payment_warning'])->name('service_payment_warning');
    Route::get('/customer_services/payment/delete/{id}',         [CustomerServiceController::class,'payment_delete'])->name('service_payment_delete');
    Route::get('/customer_services/warning/{ordem}',             [CustomerServiceController::class,'warning'])->name('customer_service_warning');
    Route::get('/customer_services/delete/{ordem}',              [CustomerServiceController::class,'destroy'])->name('customer_service_delete');

    //Service - Reschedule
    Route::match(['post','put'], '/customer_service/reschedule', [RescheduleController::class,'store'])->name('reschedule_service');

    //Oprations - Accounts
    Route::get('/operation/accounts',                   [AccountController::class,'index'])->name('account.new');
    Route::post('/operation/accounts/store',            [AccountController::class, 'store'])->name('account.store');
    Route::get('/operation/accounts/{id}',              [AccountController::class, 'edit'])->name('account.edit');
    Route::put('/operation/accounts/update/{id}',       [AccountController::class, 'update'])->name('account.update');
    Route::get('operation/accounts/aviso/{id}',         [AccountController::class,'warning'])->name('account.warning');
    Route::get('operation/accounts/delete/{id}',        [AccountController::class,'destroy'])->name('account.delete');
    // Operations - Account_Book
    Route::get('/operation/accountability',                             [AccountBookController::class, 'index'])->name('account.book');
    Route::post('/operation/accountability/open',                       [AccountBookController::class, 'store'])->name('account.book.open');
    Route::put('/operation/accountability/close/{id}',                  [AccountBookController::class, 'close'])->name('account.book.close');
    Route::get('/operation/accountability/show/{id}',                   [AccountBookController::class, 'show'])->name('account.book.show');

    // Operations - posting_account
    Route::get('/operation/transitions',                                [AccountBookController::class,'account_transition'])->name('posting.account');
    Route::post('/operation/transitions/store',                         [AccountBookController::class, 'transition_store'])->name('posting.account.store');
    Route::get('/operation/transitions/account_warning/{id}',           [AccountBookController::class, 'warning_conta'])->name('posting.account.aviso');
    Route::get('/operation/transitions/account_payment_delete/{id}',            [AccountBookController::class, 'account_payment_delete'])->name('posting.account.delete');
    Route::get('/operation/transitions/service_warning/{id}',           [AccountBookController::class, 'warning_service'])->name('posting.service.aviso');
    Route::get('/operation/transitions/service_delete/{id}',            [AccountBookController::class, 'service_payment_delete'])->name('posting.service.delete');




    Route::post('/operation/accountability/create',     [AccountReferenceController::class, 'store'])->name('account.reference.create');

    // Archives
    Route::get('/archives/customer_report', [CustomerReportController::class, 'index'])->name('archive.customer');
    Route::post('archives/customer_report', [CustomerReportController::class, 'report'])->name('archive.report');
    Route::get('archives/payments_report',  [PaymentController::class, 'index'])->name('payment.report');
    Route::post('archives/payments_report', [ReportController::class,'searchPayment'])->name('archive.payment.report');
    //if route doesn't exist
    Route::fallback(function () {

        return redirect()->back()->with([toast()->info('Página não encontrada')]);
    });


});


Route::get('/', function () {
    return view('welcome');
});
/*
Route::get('/dashboard', function () {
    return view('reports/dashboard');
})->middleware(['auth'])->name('dashboard');
*/

Route::get('/product&service', function () {
    return view('registers/service');
})->middleware(['auth'])->name('service');

// Customer

Route::get('/customer_service_action', function () {
    return view('customers/customer_service_action');
})->middleware(['auth'])->name('customer_action');


require __DIR__.'/auth.php';

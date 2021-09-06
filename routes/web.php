<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('reports/dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/company', function () {
    return view('registers/company');
})->middleware(['auth'])->name('company');

Route::get('/employer', function () {
    return view('registers/employer');
})->middleware(['auth'])->name('employer');

Route::get('/supplier', function () {
    return view('registers/supplier');
})->middleware(['auth'])->name('supplier');

Route::get('/payment', function () {
    return view('registers/payment');
})->middleware(['auth'])->name('payment');

Route::get('/product&service', function () {
    return view('registers/service');
})->middleware(['auth'])->name('service');

// Customer

Route::get('/customer', function () {
    return view('customers/customer');
})->middleware(['auth'])->name('customer');

Route::get('/customer_service', function () {
    return view('customers/customer_service');
})->middleware(['auth'])->name('customer_service');

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

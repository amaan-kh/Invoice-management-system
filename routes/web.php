<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\AdminController;

Route::get('/', [AdminController::class, 'index'])->name('index');
Route::get('/adminHome', [AdminController::class, 'getDash'])->name('admin.home');
Route::get('/userHome', [AdminController::class, 'getUserDash'])->name('user.home');

Route::get('/createUser', [UserController::class, 'create'])->name('user.create');
Route::post('/createUser', [UserController::class, 'store'])->name('user.create');

Route::get('/viewUsers', [UserController::class, 'index'])->name('user.index');

Route::get('/viewInvoices', [InvoiceController::class, 'index'])->name('invoice.index');

Route::get('/createInvoices', [InvoiceController::class, 'create'])->name('invoice.create');


Route::get('/taskAllocation', [AdminController::class, 'allocate'])->name('allocatIndex');





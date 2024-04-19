<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\AdminDashMiddleware;

Route::get('/', [AdminController::class, 'index'])->name('index');
Route::post('/', [AdminController::class, 'login'])->name('login');
 
Route::get('/adminHome', [AdminController::class, 'getDash'])->name('admin.home');
//Route::get('/userHome', [AdminController::class, 'getUserDash'])->name('user.home');

Route::post('/logout', [AdminController::class, 'logout'])->name('logout');

Route::get('/createUser', [UserController::class, 'create'])->name('user.create');
Route::post('/createUser', [UserController::class, 'store'])->name('user.create');
Route::get('/viewUsers', [UserController::class, 'index'])->name('user.index');

Route::get('/createInvoices', [InvoiceController::class, 'create'])->name('invoice.create');
Route::post('/createInvoices', [InvoiceController::class, 'store'])->name('invoice.create');
Route::get('/viewInvoices', [InvoiceController::class, 'index'])->name('invoice.index');



Route::get('/taskAllocation', [AdminController::class, 'allocateView'])->name('allocatIndex');
Route::post('/taskAllocation', [AdminController::class, 'allocate'])->name('allocate');


Route::get('/deleteUser', [UserController::class, 'deleteUserView'])->name('user.delete');
Route::post('/deleteUser', [UserController::class, 'deleteUser'])->name('user.delete');




<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\AdminDashMiddleware;

Route::get('/', [AdminController::class, 'index'])->name('index');
Route::post('/', [AdminController::class, 'login'])->name('login');
 
Route::get('/adminHome', [AdminController::class, 'getDash'])->name('admin.home');
Route::get('/userHome/{name}', [AdminController::class, 'getUserDash'])->name('user.home');
Route::post('/logout', [AdminController::class, 'logout'])->name('logout');


Route::get('/createUser', [UserController::class, 'create'])->name('user.create');
Route::post('/createUser', [UserController::class, 'store'])->name('user.create');

Route::get('/viewUsers', [UserController::class, 'index'])->name('user.index');
Route::get('/updateUser/{name}', [UserController::class, 'updateGet'])->name('user.update');
Route::post('/updateUser', [UserController::class, 'update'])->name('updateUser');

// Route::get('/deleteUser', [UserController::class, 'deleteUserView'])->name('user.delete');
Route::post('/deleteUser', [UserController::class, 'deleteUser'])->name('user.delete');


Route::get('/createInvoices', [InvoiceController::class, 'create'])->name('invoice.create');
Route::post('/createInvoices', [InvoiceController::class, 'store'])->name('invoice.create');

Route::get('/updateInvoices/{id}', [InvoiceController::class, 'updateView'])->name('invoice.updateget');
Route::post('/updateInvoices', [InvoiceController::class, 'update'])->name('invoice.update');
Route::post('/getInvoiceData', [InvoiceController::class, 'getInvoiceData'])->name('getinvoicedata');
Route::get('/invoices/{id}', [InvoiceController::class, 'show'])->name('apigetinvoicedata');

Route::get('/addItem/{id}', [InvoiceController::class, 'addItemView'])->name('invoice.addItem');
Route::post('/addItemPost', [InvoiceController::class, 'addItemPost'])->name('addItemPost');

Route::get('/viewInvoices', [InvoiceController::class, 'index'])->name('invoice.index');
Route::get('/Invoice', [InvoiceController::class, 'pageView'])->name('invoicePage');
Route::get('/Invoice/{id}', [InvoiceController::class, 'page'])->name('invoicePageView');
Route::get('/InvoiceUser/{id}/{name}', [InvoiceController::class, 'pageUser'])->name('invoicePageViewUser');



Route::get('/deleteInvoice', [InvoiceController::class, 'deleteInvoiceView'])->name('invoice.delete');
Route::post('/deleteInvoice', [InvoiceController::class, 'deleteInvoice'])->name('invoice.delete');

Route::get('/taskAllocation/{id}', [AdminController::class, 'allocateView'])->name('allocatIndex');
Route::post('/taskAllocation', [AdminController::class, 'allocate'])->name('allocate');
Route::get('/taskView', [AdminController::class, 'taskView'])->name('allocatViews');
Route::get('/revokeAllocation', [AdminController::class, 'revokeAllocationView'])->name('revokeAllocation');
Route::post('/revokeAllocation', [AdminController::class, 'deallocate'])->name('deallocate');

Route::get('/dashData', [AdminController::class, 'getDashData'])->name('dashData');
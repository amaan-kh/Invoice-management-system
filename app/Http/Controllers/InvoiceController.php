<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;
use Illuminate\Support\Facades\Gate;    


class InvoiceController extends Controller
{
    //
   public function create()
   {
    if (!Gate::allows('isAdmin')) {
        abort(403, 'Unauthorized');
    }
    return view('auth.admin.createinvoice');
}

public function index() 
{   
    if (!Gate::allows('isAdmin')) {
        abort(403, 'Unauthorized');
    }
    $invoices = Invoice::getInvoices();
    return view('auth.admin.readinvoice', compact('invoices'));
}

public function store(Request $request) 
{
    if (!Gate::allows('isAdmin')) {
        abort(403, 'Unauthorized');
    }
    \Log::info(json_encode($request->all()));


    $message = Invoice::createInvoice(
        $request->invoice_no,
        $request->supplier_info,
        $request->customer_info,
        $request->invoice_date,
        $request->due_date,
        $request->itemized_list,
        $request->subtotal,
        $request->taxes,
        $request->total_amount_due
    );
    return view('auth.admin.createinvoice')->with('err_message', $message);
}
}

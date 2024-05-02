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
        // abort(403, 'Unauthorized');
        return redirect()->route('index');
    }
    return view('auth.admin.createinvoice');
}

public function index() 
{   
    if (!Gate::allows('isAdmin')) {
        // abort(403, 'Unauthorized');
        return redirect()->route('index');
    }
    $invoices = Invoice::getInvoices();
    return view('auth.admin.readinvoice', compact('invoices'));
}

// public function page(Request $request) {
//     if (!Gate::allows('isAdmin')) {
//         // abort(403, 'Unauthorized');
//         return redirect()->route('index');
//     }
//     // dd($request->key);
//     $invoice = Invoice::where('invoice_number', $request->key)->first();
//     return view('auth.admin.singleinvoice', compact('invoice')); 
// }

public function page($id) {
    if (!Gate::allows('isAdmin')) {
        // abort(403, 'Unauthorized');
        return redirect()->route('index');
    }
    $invoice = Invoice::where('invoice_number', $id)->first();
    return view('auth.admin.singleinvoice', compact('invoice'));
}
public function pageView() {
     if (!Gate::allows('isAdmin')) {
        // abort(403, 'Unauthorized');
        return redirect()->route('index');
    }
    return redirect()->route('invoice.index');
}

public function store(Request $request) 
{
    if (!Gate::allows('isAdmin')) {
        // abort(403, 'Unauthorized');
        return redirect()->route('index');
    }
    // \Log::info(json_encode($request->all()));


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
    // \Log::info(json_encode($message));
    return view('auth.admin.createinvoice')->with('err_message', $message);
}

public function updateView(){
     if (!Gate::allows('isAdmin')) {
        // abort(403, 'Unauthorized');
        return redirect()->route('index');
    }
    $invoices = Invoice::getInvoices();
    return view('auth.admin.updateinvoice', compact('invoices'));
}

public function update(Request $request) {
     if (!Gate::allows('isAdmin')) {
        // abort(403, 'Unauthorized');
        return redirect()->route('index');
    }
    \Log::info(json_encode($request->all()));
    $message = Invoice::updateInvoice( $request->invoice_no,
        $request->supplier_info,
        $request->customer_info,
        $request->invoice_date,
        $request->due_date,
        $request->itemized_list,
        $request->subtotal,
        $request->taxes,
        $request->total_amount_due
    );
    $invoices = Invoice::getInvoices();
    return view('auth.admin.updateinvoice', compact('invoices'))->with('err_message', $message);
}

public function getInvoiceData(Request $request) {
    
    \Log::info(json_encode($request->all()));
    $invoices = Invoice::getInvoices();
    return view('auth.admin.updateinvoice', compact('invoices'));
    
}

public function deleteInvoiceView(){
    if (!Gate::allows('isAdmin')) {
        // abort(403, 'Unauthorized');
        return redirect()->route('index');
    }
    $invoices = Invoice::getInvoices();
    return view('auth.admin.deleteinvoice', compact('invoices'));
}

public function deleteInvoice(Request $request) {
    if (!Gate::allows('isAdmin')) {
        // abort(403, 'Unauthorized');
        return redirect()->route('index');
    }
    // \Log::info(json_encode($request->invoice_no));
    $exist = Invoice::where('invoice_number', $request->invoice_no)->first();
    if($exist) {
        $exist->delete();
        $message = 'deleted successfully';
        $invoices = Invoice::getInvoices();
        return view('auth.admin.deleteinvoice', compact('invoices'))->with('error_message',$message);

    }
    $message = 'Invoice does not exist ';
    $invoices = Invoice::getInvoices();
    return view('auth.admin.deleteinvoice', compact('invoices'))->with('error_message', $message);
}
}

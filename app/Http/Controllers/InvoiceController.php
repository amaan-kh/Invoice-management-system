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

public function page($id) {
    if (!Gate::allows('isAdmin')) {
        // abort(403, 'Unauthorized');
        return redirect()->route('index');
    }
    $invoice = Invoice::where('invoice_number', $id)->first();
    if (!$invoice) {
        return redirect()->back()->with('error', 'Invoice not found');
    }
    return view('auth.admin.singleinvoice', compact('invoice'));
}

public function pageUser($id, $name) {
     if (Gate::allows('isUserName', $name) && Gate::allows('belongsToUser', $id)) {
             $invoice = Invoice::where('invoice_number', $id)->first();
        return view('auth.normal_user.user_singleinvoice', compact('invoice', 'name'));
           
        } else {
            // Unauthorized action
            return redirect()->back()->with('error', 'You are not authorized to view that page.');
            //abort(403); // Or handle the unauthorized access in another way
        }
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

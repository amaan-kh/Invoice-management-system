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


    // $message = Invoice::createInvoice(
    //     $request->invoice_no,
    //     $request->supplier_info,
    //     $request->customer_info,
    //     $request->invoice_date,
    //     $request->due_date,
    //     $request->itemized_list,
    //     $request->subtotal,
    //     $request->taxes,
    //     $request->total_amount_due
    // );
        $data = [
    'invoice_number' => $request->invoice_number,
    'currency_type' => $request->currency_type,
    'conversion_rate' => $request->conversions_rate,
    'period_from' => $request->period_from,
    'period_to' => $request->period_to,
    'invoice_date' => $request->invoice_date,
    'invoice_type' => $request->invoice_type,
    'bill_to_company_name' => $request->bill_to_company_name,
    'bill_to_company_address' => $request->bill_to_company_address,
    'bill_to_company_gstin' => $request->bill_to_company_gstin,
    'company_tax_number_id' => $request->company_tax_number_id,
    'address' => $request->address,
    'gstin' => $request->gstin,
    'description' => $request->description,
    'taxable_amount' => $request->taxable_amount,
    'gst_type' => $request->gst_type,
    'tax_amount' => $request->tax_amount,
    'roundup_amount' => $request->roundup_amount,
    'total_amount' => $request->total_amount,
    'bank_name' => $request->bank_name,
    'bank_branch_name' => $request->bank_branch_name,
    'bank_account_number' => $request->bank_account_number,
    'bank_ifsc_code' => $request->bank_ifsc_code,
    'note' => $request->note,
    'status' => $request->status,
    'created_by' => auth()->user()->id, // Assuming you have authentication
    // 'updated_by' => $request->updated_by, // Uncomment if needed
    ];



     
    $exists = Invoice::where('invoice_number', $data['invoice_number'])->first();
    if ($exists) {
        $message = "Invoice number already exists";
    }
    else {
        $invoice = new Invoice;
        $invoice->fill($data);
        $invoice->save();

    $message =  "Invoice created successfully";

    }
    
    // Check if the invoice was created successfully
    if ($message === "Invoice created successfully") {
            
            // If successful, redirect to a success page or perform other actions
        return redirect()->back()->with('err_message', $message);
    } else {
        session()->flash('err_message', $message);
        return redirect()->back()->withInput();
    }
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
$data = [
    'invoice_number' => $request->invoice_no,
    'currency_type' => $request->currency_type,
    'conversion_rate' => $request->conversions_rate,
    'period_from' => $request->period_from,
    'period_to' => $request->period_to,
    'invoice_date' => $request->invoice_date,
    'invoice_type' => $request->invoice_type,
    'bill_to_company_name' => $request->bill_to_company_name,
    'bill_to_company_address' => $request->bill_to_company_address,
    'bill_to_company_gstin' => $request->bill_to_company_gstin,
    'company_tax_number_id' => $request->company_tax_number_id,
    'address' => $request->address,
    'gstin' => $request->gstin,
    'description' => $request->description,
    'taxable_amount' => $request->taxable_amount,
    'gst_type' => $request->gst_type,
    'tax_amount' => $request->tax_amount,
    'roundup_amount' => $request->roundup_amount,
    'total_amount' => $request->total_amount,
    'bank_name' => $request->bank_name,
    'bank_branch_name' => $request->bank_branch_name,
    'bank_account_number' => $request->bank_account_number,
    'bank_ifsc_code' => $request->bank_ifsc_code,
    'note' => $request->note,
    'status' => $request->status,
    //'created_by' => auth()->user()->id, // Assuming you have authentication
    'updated_by' => auth()->user()->id, // Uncomment if needed
    ];


    $invoice = Invoice::where('invoice_number', $request->invoice_no)->first();
    $message = "";   

        if (!$invoice) {
        // Handle the error, such as returning an error message
            $message = 'Invoice not found';
        }
        else{
            $invoice->fill($data);
            $invoice->save();
            $message =  "Invoice updated successfully";
        }
            
        

$invoices = Invoice::getInvoices();
return view('auth.admin.updateinvoice', compact('invoices'))->with('err_message', $message);
}

public function getInvoiceData(Request $request) {

    \Log::info(json_encode($request->all()));
    $invoices = Invoice::getInvoices();
    return view('auth.admin.updateinvoice', compact('invoices'));
    
}

public function show($id) {
    if (!Gate::allows('isAdmin')) {
        // abort(403, 'Unauthorized');
        return redirect()->route('index');
    }
    $invoice = Invoice::where('invoice_number', $id)->first();
    if ($invoice) {
        return response()->json($invoice);
    } else {
        return response()->json(['error' => 'Invoice not found'], 404);
    }
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

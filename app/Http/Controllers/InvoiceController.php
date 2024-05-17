<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;
use Illuminate\Support\Facades\Gate;    
use Illuminate\Support\Facades\Session;
use App\Models\InvoiceItem;
use Illuminate\Pagination\Paginator;



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
    // $invoices = Invoice::getInvoices();
    $invoices = Invoice::paginate(3);
    $message = Session::get('error_message');
    session()->flash('error_message', $message);


    return view('auth.admin.readinvoice', compact('invoices'))->with('error_message', $message);
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
    $invoiceItems = $invoice->invoiceItems()->get();
    
    return view('auth.admin.singleinvoice', compact('invoice', 'invoiceItems'));
}

public function pageUser($id, $name) {
 if (Gate::allows('isUserName', $name) && Gate::allows('belongsToUser', $id)) {
     $invoice = Invoice::where('invoice_number', $id)->first();
     $invoiceItems = $invoice->invoiceItems()->get();
     return view('auth.normal_user.user_singleinvoice', compact('invoice', 'name', 'invoiceItems'));

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

public function updateView($id){
 if (!Gate::allows('isAdmin')) {
        // abort(403, 'Unauthorized');
    return redirect()->route('index');
}
$invoice = Invoice::where('invoice_number', $id)->first();
if(!$invoice){
    return redirect()->route('invoice.index');
}
return view('auth.admin.updateinvoice', compact('invoice'));
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
    $message = 'Invoice not found';
}
else{
    $invoice->fill($data);
    $invoice->save();
    $message =  "Invoice updated successfully";
}



$invoices = Invoice::paginate(3);
return redirect()->route('invoice.index');
return view('auth.admin.readinvoice', compact('invoices'))->with('err_message', $message);
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

// public function deleteInvoice(Request $request) {
//     if (!Gate::allows('isAdmin')) {
//         // abort(403, 'Unauthorized');
//         return redirect()->route('index');
//     }
//     // \Log::info(json_encode($request->invoice_no));
//     $exist = Invoice::where('invoice_number', $request->invoice_no)->first();
//     if($exist) {
//         $exist->delete();
//         $message = 'deleted successfully';
//         $invoices = Invoice::getInvoices();
//         return view('auth.admin.deleteinvoice', compact('invoices'))->with('error_message',$message);

//     }
//     $message = 'Invoice does not exist ';
//     $invoices = Invoice::getInvoices();
//     return view('auth.admin.deleteinvoice', compact('invoices'))->with('error_message', $message);
// }


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
        session()->flash('error_message', $message);
        return redirect()->route('invoice.index')->with('error_message', $message);
    }
    $message = 'Invoice does not exist ';
    $invoices = Invoice::getInvoices();
    session()->flash('error_message', $message);
    return redirect()->route('invoice.index')->with('error_message', $message);
}

public function addItemView($id) {
    if (!Gate::allows('isAdmin')) {
        // abort(403, 'Unauthorized');
        return redirect()->route('index');
    }

    $invoice = Invoice::where('invoice_number', $id)->first();

    if (!$invoice) {
        return redirect()->back()->with('error', 'Invoice not found.');
    }

    $invoiceId = $invoice->id;
    $invoice_number = $invoice->invoice_number;

    return view('auth.admin.addInvoiceItem', ['invoice_id' => $invoiceId, 'invoice_number' => $invoice_number]);
}

public function addItemPost(Request $request) {
    if (!Gate::allows('isAdmin')) {
        // abort(403, 'Unauthorized');
        return redirect()->route('index');
    }

    // dd($request->all());
     // Create an associative array with the request data
    $data = [
        'invoice_id' => $request->input('invoice_id'),
        'asset_tag' => $request->input('asset_tag'),
        'part_number' => $request->input('part_number'),
        'serial_number' => $request->input('serial_number'),
        'hsn_code' => $request->input('hsn_code'),
        'sac_code' => $request->input('sac_code'),
        'description' => $request->input('description'),
        'gst_percent' => $request->input('gst_percent'),
        'taxable_amount' => $request->input('taxable_amount'),
        'cgst' => $request->input('cgst'),
        'sgst' => $request->input('sgst'),
        'igst' => $request->input('igst'),
        'tax_amount' => $request->input('tax_amount'),
        'total_amount' => $request->input('total_amount'),
    ];

    // Insert data into your table using Eloquent
    InvoiceItem::create($data);

    // Redirect the user to a success page or wherever needed
    return redirect()->route('invoice.index');
}

}



// auth.admin.readinvoice
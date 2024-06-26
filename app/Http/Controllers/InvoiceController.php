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
    //view for invoice creation
    public function create()
    {
        if (!Gate::allows('isAdmin')) {
            return redirect()->route('index');
        }
        return view('auth.admin.createinvoice');
    }

    //view for all invoices along with action links
    public function index() {

        if (!Gate::allows('isAdmin')) {
            return redirect()->route('index');
        }

        //NOTE: if don't want pagination: $invoices = Invoice::getInvoices();
        
        $invoices = Invoice::paginate(3);
        $message = Session::get('error_message');

        session()->flash('error_message', $message);
        return view('auth.admin.readinvoice', compact('invoices'))->with('error_message', $message);
    }
    

    //view for single invoice
    public function page($id) {

        if (!Gate::allows('isAdmin')) {
            return redirect()->route('index');
        }
        $invoice = Invoice::where('invoice_number', $id)->first();

        if (!$invoice) {
            return redirect()->back()->with('error', 'Invoice not found');
        }
        $invoiceItems = $invoice->invoiceItems()->get();
        
        return view('auth.admin.singleinvoice', compact('invoice', 'invoiceItems'));
    }
    

    //view for single invoice for particular user
    public function pageUser($id, $name) {

        if (Gate::allows('isUserName', $name) && Gate::allows('belongsToUser', $id)) {
            $invoice = Invoice::where('invoice_number', $id)->first();
            $invoiceItems = $invoice->invoiceItems()->get();
            return view('auth.normal_user.user_singleinvoice', compact('invoice', 'name', 'invoiceItems'));
        } 
        else {               
            return redirect()->back()->with('error', 'You are not authorized to view that page.');
        }
    }
    

    //redirects to invoice view
    public function pageView() {
    if (!Gate::allows('isAdmin')) {
        return redirect()->route('index');
    }
    return redirect()->route('invoice.index');
    }
    

    //creating new invoice
    public function store(Request $request) 
    {
        if (!Gate::allows('isAdmin')) {
            return redirect()->route('index');
        }
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
        'created_by' => auth()->user()->id, 
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
        
        if ($message === "Invoice created successfully") {
            return redirect()->back()->with('err_message', $message);
        } 
        else {
            session()->flash('err_message', $message);
            return redirect()->back()->withInput();
        }
    }
    

    //view for updating invoice
    public function updateView($id) {
        if (!Gate::allows('isAdmin')) {
            return redirect()->route('index');
        }

        $invoice = Invoice::where('invoice_number', $id)->first();
        if(!$invoice){
            return redirect()->route('invoice.index');
        }
        return view('auth.admin.updateinvoice', compact('invoice'));
    }
    

    //updating invoice
    public function update(Request $request) {
    if (!Gate::allows('isAdmin')) {
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
    
    return response()->json([
        "err_message" => $message,
    ]);
    }
    

    //NOTE: don't remember what this does
    public function getInvoiceData(Request $request) {
    
        $invoices = Invoice::getInvoices();
        return view('auth.admin.updateinvoice', compact('invoices'));
        
    }
    

    //GET API to fetch invoice data
    public function show($id) {

        if (!Gate::allows('isAdmin')) {
            return redirect()->route('index');
        }
        $invoice = Invoice::where('invoice_number', $id)->first();

        if ($invoice) {
            return response()->json($invoice);
        } 
        else {
            return response()->json(['error' => 'Invoice not found'], 404);
        }
    }
    
    //NOTE: this view isn't used now
    // public function deleteInvoiceView(){
    //     if (!Gate::allows('isAdmin')) {
    //         return redirect()->route('index');
    //     }
    //     $invoices = Invoice::getInvoices();
    //     return view('auth.admin.deleteinvoice', compact('invoices'));
    // }
    
    
    //deleting invoice
    public function deleteInvoice(Request $request) {
        if (!Gate::allows('isAdmin')) {
            return redirect()->route('index');
        }
    
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

    
    //view for adding Item details
    public function addItemView($id) {
        
        if (!Gate::allows('isAdmin')) {
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
    

    //adding Item to invoice
    public function addItemPost(Request $request) {
        
        if (!Gate::allows('isAdmin')) {
            return redirect()->route('index');
        }
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

        if(InvoiceItem::create($data)){
            return response()->json([
                "err_message" => "invoice added successfully",
            ]);
        }
        else{
            return response()->json([
                "err_message" => "some error occurred",
            ]);
        }
    }
}
    

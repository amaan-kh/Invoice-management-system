<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;

class InvoiceController extends Controller
{
    //
     public function create()
    {
        return view('auth.admin.createinvoice');
    }

    public function index() 
    {
        $invoices = Invoice::getInvoices();
        return view('auth.admin.readinvoice', compact('invoices'));
    }

    public function store(Request $request) 
    {
        // \Log::info(json_encode($request->all()));
        Invoice::createInvoice($request->title, $request->message);
        return view('auth.admin.createinvoice');
    }
}

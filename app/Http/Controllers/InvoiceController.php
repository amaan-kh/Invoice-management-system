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
        // \Log::info(json_encode($request->all()));
        Invoice::createInvoice($request->title, $request->message);
        return view('auth.admin.createinvoice');
    }
}

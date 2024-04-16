<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    //
     public function create()
    {
        return view('auth.admin.createinvoice');
    }

    public function index() 
    {
        return view('auth.admin.readinvoice');
    }
}

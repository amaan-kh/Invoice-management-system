<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    public static function createInvoice($invoiceNo, $supplierInfo, $customerInfo, $invoiceDate, $dueDate, $itemizedList, 
        $subtotal, $taxes, $totalAmountDue)         
    {    
        $exists = Invoice::where('invoice_number', $invoiceNo)->first();

        if($exists) {
            return "Invoice number already exists";
        }



        $invoice = new Invoice;
        $invoice->invoice_number = $invoiceNo;
        $invoice->supplier_info = $supplierInfo;
        $invoice->customer_info = $customerInfo;
        $invoice->invoice_date = $invoiceDate;
        $invoice->due_date = $dueDate;
        $invoice->itemized_list = $itemizedList;
        $invoice->subtotal = $subtotal;
        $invoice->taxes = $taxes;
        $invoice->total_amount_due = $totalAmountDue;
        $invoice->save();

        return "Invoice created successfully";

    }

    public static function updateInvoice($invoiceNo, $supplierInfo, $customerInfo, $invoiceDate, $dueDate, $itemizedList, 
        $subtotal, $taxes, $totalAmountDue) {

        $invoice = Invoice::where('invoice_number', $invoiceNo)->first();
        

        if (!$invoice) {
        // Handle the error, such as returning an error message
            return 'Invoice not found';
        }

            $invoice->supplier_info = $supplierInfo;
            $invoice->customer_info = $customerInfo;
            $invoice->invoice_date = $invoiceDate;
            $invoice->due_date = $dueDate;
            $invoice->itemized_list = $itemizedList;
            $invoice->subtotal = $subtotal;
            $invoice->taxes = $taxes;
            $invoice->total_amount_due = $totalAmountDue;
            $invoice->save();

            return "Invoice updated successfully";
    }

    

    public static function getInvoices() 
    {
        $invoices = Invoice::all();
        return $invoices;
    }

    public function users()
    {            
        return $this->belongsToMany(User::class, 'user__invoices', 'user_id', 'invoice_id');
    }
}

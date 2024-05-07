<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
     protected $fillable = [
    'invoice_number',
    'currency_type',
    'conversion_rate',
    'period_from',
    'period_to',
    'invoice_date',
    'invoice_type',
    'bill_to_company_name',
    'bill_to_company_address',
    'bill_to_company_gstin',
    'company_tax_number_id',
    'address',
    'gstin',
    'description',
    'taxable_amount',
    'gst_type',
    'tax_amount',
    'roundup_amount',
    'total_amount',
    'bank_name',
    'bank_branch_name',
    'bank_account_number',
    'bank_ifsc_code',
    'note',
    'status',
    'created_by',
    'updated_by',
];


    // public static function createInvoice($invoiceNo, $supplierInfo, $customerInfo, $invoiceDate, $dueDate, $itemizedList, 
    //     $subtotal, $taxes, $totalAmountDue)         
    // {    
    //     $exists = Invoice::where('invoice_number', $invoiceNo)->first();

    //     if($exists) {
    //         return "Invoice number already exists";
    //     }



    //     $invoice = new Invoice;
    //     $invoice->invoice_number = $invoiceNo;
    //     $invoice->supplier_info = $supplierInfo;
    //     $invoice->customer_info = $customerInfo;
    //     $invoice->invoice_date = $invoiceDate;
    //     $invoice->due_date = $dueDate;
    //     $invoice->itemized_list = $itemizedList;
    //     $invoice->subtotal = $subtotal;
    //     $invoice->taxes = $taxes;
    //     $invoice->total_amount_due = $totalAmountDue;
    //     $invoice->save();

    //     return "Invoice created successfully";

    // }

    public static function createInvoice(array $data)
{
    // Check if invoice number already exists
    $exists = Invoice::where('invoice_number', $data['invoice_number'])->first();
    if ($exists) {
        return "Invoice number already exists";
    }

    // Create new invoice
    $invoice = new Invoice;
    $invoice->fill($data);
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

@extends('layouts.adminlayout')

@section('title')
INVOICE
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('css/singleinvoice.css') }}">
@endsection


@section('maincontent')
<div class="container">

<div class="invoice-list">
          <h5 id="subhead">Invoice Details </h5>
                <div class="invoice-item">
    <p><b>Invoice Number:</b> {{ $invoice->invoice_number }}</p>
    <p><b>Currency Type:</b> {{ $invoice->currency_type }}</p>
    <p><b>Conversion Rate:</b> {{ $invoice->conversions_rate }}</p>
    <p><b>Period From:</b> {{ $invoice->period_from }}</p>
    <p><b>Period To:</b> {{ $invoice->period_to }}</p>
    <p><b>Invoice Date:</b> {{ $invoice->invoice_date }}</p>
    <p><b>Invoice Type:</b> {{ $invoice->invoice_type }}</p>
    <p><b>Bill To Company Name:</b> {{ $invoice->bill_to_company_name }}</p>
    <p><b>Bill To Company Address:</b> {{ $invoice->bill_to_company_address }}</p>
    <p><b>Bill To Company GSTIN:</b> {{ $invoice->bill_to_company_gstin }}</p>
    <p><b>Company Tax Number ID:</b> {{ $invoice->company_tax_number_id }}</p>
    <p><b>Address:</b> {{ $invoice->address }}</p>
    <p><b>GSTIN:</b> {{ $invoice->gstin }}</p>
    <p><b>Description:</b> {{ $invoice->description }}</p>
    <p><b>Taxable Amount:</b> {{ $invoice->taxable_amount }}</p>
    <p><b>GST Type:</b> {{ $invoice->gst_type }}</p>
    <p><b>Tax Amount:</b> {{ $invoice->tax_amount }}</p>
    <p><b>Roundup Amount:</b> {{ $invoice->roundup_amount }}</p>
    <p><b>Total Amount:</b> {{ $invoice->total_amount }}</p>
    <p><b>Bank Name:</b> {{ $invoice->bank_name }}</p>
    <p><b>Bank Branch Name:</b> {{ $invoice->bank_branch_name }}</p>
    <p><b>Bank Account Number:</b> {{ $invoice->bank_account_number }}</p>
    <p><b>Bank IFSC Code:</b> {{ $invoice->bank_ifsc_code }}</p>
    <p><b>Note:</b> {{ $invoice->note }}</p>
    <p><b>Status:</b> {{ $invoice->status }}</p>
    <p><b>Created By:</b> {{ $invoice->created_by }}</p>
     @if ($invoice->updated_by)
        <p><b>Updated By:</b> {{ $invoice->updated_by }}</p>
    @endif

    @if(isset($invoiceItems) && count($invoiceItems) > 0)
    <h5 id="subhead">Invoice Items </h5>
    @foreach ($invoiceItems as $item)
    <div>
      
        <p><b>Asset Tag:</b> {{ $item->asset_tag }}</p>
        <p><b>Part Number:</b> {{ $item->part_number }}</p>
        <p><b>Serial Number:</b> {{ $item->serial_number }}</p>
        <p><b>HSN Code:</b> {{ $item->hsn_code }}</p>
        <p><b>SAC Code:</b> {{ $item->sac_code }}</p>
        <p><b>Description:</b> {{ $item->description }}</p>
        <p><b>GST Percent:</b> {{ $item->gst_percent }}</p>
        <p><b>Taxable Amount:</b> {{ $item->taxable_amount }}</p>
        <p><b>CGST:</b> {{ $item->cgst }}</p>
        <p><b>SGST:</b> {{ $item->sgst }}</p>
        <p><b>IGST:</b> {{ $item->igst }}</p>
        <p><b>Tax Amount:</b> {{ $item->tax_amount }}</p>
        <p><b>Total Amount:</b> {{ $item->total_amount }}</p>
    </div>
    <hr> <!-- Optional: Add a horizontal line between items for clarity -->
@endforeach
   @endif

    
</div>

          
</div>



</div>
<a href="{{ route('invoice.index') }}" class="back-link">BACK</a>

@endsection
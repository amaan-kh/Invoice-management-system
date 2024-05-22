@extends('layouts.adminlayout')
@section('title')
UPDATE INVOICE
@endsection
@section('style')
<link rel="stylesheet" href="{{ asset('css/updateinvoice.css') }}">
@endsection
@section('maincontent')
<h4>Update INVOICE</h4>
<div class="create-user-container">

    <span>
     @if(isset($err_message))
     <div class="alert alert-danger">
        {{ $err_message }}
    </div>
    @endif
</span>

<div class="container"> 
    <form action="{{ route('invoice.update') }}" method="POST">
        @csrf <!-- Laravel CSRF protection token -->
        <!-- Invoice Number -->
        <div id="fsc">
        <div class="subcontainer">
        <div class="form-group">
             <label for="invoice_number">Invoice Number: {{ $invoice->invoice_number }}</label>
             <input hidden type="number" id="invoice_no" name="invoice_no" value="{{ $invoice->invoice_number }}">
        </div>
        

        <!-- Currency Type -->
        <div class="form-group">
            <label for="currency_type">Currency Type</label>
            <input type="number" id="currency_type" name="currency_type" class="form-control" value="{{ old('currency_type') }}" required>
        </div>

        <!-- Conversion Rate -->
        <div class="form-group">
            <label for="conversions_rate">Conversion Rate</label>
            <input type="number" id="conversions_rate" name="conversions_rate" step="0.01" class="form-control" value="{{ old('conversions_rate') }}"required>
        </div>

        <!-- Period From -->
        <div class="form-group">
            <label for="period_from">Period From</label>
            <input type="date" id="period_from" name="period_from" class="form-control" value="{{ old('period_from') }}" required>
        </div>

        <!-- Period To -->
        <div class="form-group">
            <label for="period_to">Period To</label>
            <input type="date" id="period_to" name="period_to" class="form-control" value="{{ old('period_to') }}" required>
        </div>

        <!-- Invoice Date -->
        <div class="form-group">
            <label for="invoice_date">Invoice Date</label>
            <input type="date" id="invoice_date" name="invoice_date" class="form-control" value="{{ old('invoice_date') }}" required>
        </div>

        <!-- Invoice Type -->
        <div class="form-group">
            <label for="invoice_type">Invoice Type</label>
            <input type="text" id="invoice_type" name="invoice_type" class="form-control" value="{{ old('invoice_type') }}" required>
        </div>

        <!-- Bill To Company Information -->
        <div class="form-group">
            <label for="bill_to_company_name">Bill To Company Name</label>
            <input type="text" id="bill_to_company_name" name="bill_to_company_name" class="form-control" value="{{ old('bill_to_company_name') }}" required>
        </div>

        <div class="form-group">
            <label for="bill_to_company_address">Bill To Company Address</label>
            <textarea id="bill_to_company_address" name="bill_to_company_address" class="form-control" rows="3"  required>{{ old('bill_to_company_address') }}</textarea>
        </div>

        <div class="form-group">
            <label for="bill_to_company_gstin">Bill To Company GSTIN</label>
            <input type="text" id="bill_to_company_gstin" name="bill_to_company_gstin" class="form-control" value="{{ old('bill_to_company_gstin') }}"required>
        </div>

        <!-- Company Tax Number ID -->
        <div class="form-group">
            <label for="company_tax_number_id">Company Tax Number ID</label>
            <input type="number" id="company_tax_number_id" name="company_tax_number_id" class="form-control" value="{{ old('company_tax_number_id') }}"required>
        </div>

        <!-- Address -->
        <div class="form-group">
            <label for="address">Address</label>
            <textarea name="address" id="address" class="form-control" rows="3" required>{{ old('address') }}</textarea>
        </div>

        <!-- GSTIN -->
        <div class="form-group">
            <label for="gstin">GSTIN</label>
            <input type="text" name="gstin" id="gstin" class="form-control" value="{{ old('gstin') }}"required>
        </div>
</div>
                    <div class="subcontainer">
        <!-- Description -->
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" rows="3">{{ old('description') }}</textarea>
        </div>

        <!-- Taxable Amount -->
        <div class="form-group">
            <label for="taxable_amount">Taxable Amount</label>
            <input type="number" id="taxable_amount" name="taxable_amount" step="0.01" class="form-control" value="{{ old('taxable_amount') }}" required>
        </div>

        <!-- GST Type -->
        <div class="form-group">
            <label for="gst_type">GST Type</label>
            <select name="gst_type" id="gst_type" class="form-control" required>
                <option value="cgst+sgst" @if(old('gst_type') == 'cgst+sgst') selected @endif>CGST + SGST</option>
                <option value="igst" @if(old('gst_type') == 'igst') selected @endif>IGST</option>
            </select>
        </div>

        <!-- Tax Amount -->
        <div class="form-group">
            <label for="tax_amount">Tax Amount</label>
            <input type="number" id="tax_amount" name="tax_amount" step="0.01" class="form-control" value="0" value="{{ old('tax_amount') }}" required>
        </div>

        <!-- Roundup Amount -->
        <div class="form-group">
            <label for="roundup_amount">Roundup Amount</label>
            <input type="number" id="roundup_amount" name="roundup_amount" step="0.01" class="form-control" value="{{ old('roundup_amount') }}" required>
        </div>

        <!-- Total Amount -->
        <div class="form-group">
            <label for="total_amount">Total Amount</label>
            <input type="number" id="total_amount" name="total_amount" step="0.01" class="form-control" value="{{ old('total_amount') }}" required>
        </div>

        <!-- Bank Information -->
        <div class="form-group">
            <label for="bank_name">Bank Name</label>
            <input type="text" id="bank_name" name="bank_name" class="form-control" value="{{ old('bank_name') }}" required>
        </div>

        <div class="form-group">
            <label for="bank_branch_name">Bank Branch Name</label>
            <input type="text" id="bank_branch_name" name="bank_branch_name" class="form-control"  value="{{ old('bank_branch_name') }}" required>
        </div>

        <div class="form-group">
            <label for="bank_account_number">Bank Account Number</label>
            <input type="text" id="bank_account_number" name="bank_account_number" class="form-control" value="{{ old('bank_account_number') }}" required>
        </div>

        <div class="form-group">
            <label for="bank_ifsc_code">Bank IFSC Code</label>
            <input type="text" id="bank_ifsc_code" name="bank_ifsc_code" class="form-control" value="{{ old('bank_ifsc_code') }}" required>
        </div>

        <!-- Note -->
        <div class="form-group">
            <label for="note">Note</label>
            <textarea name="note" id="note" class="form-control" rows="3">{{ old('note') }}</textarea>
        </div>

        <!-- Status -->
        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control" required>
                <option value="active" @if(old('status') == 'active') selected @endif>Active</option>
                <option value="pending" @if(old('status') == 'pending') selected @endif>Pending</option>
                <option value="cancelled" @if(old('status') == 'cancelled') selected @endif>Cancelled</option>
            </select>
        </div>

        <!-- transactionId -->
        <!-- <div>
        <label for="transactionId">Transaction ID:</label>
        <input type="text" name="transactionId" id="transactionId">
        </div> -->


        </div>
        </div>

        <button type="submit" class="btn btn-primary" id="updateBtn">Update </button>
    </form>
    <br>
</div>

</div>
<a href="{{ route('invoice.index') }}" id="backBtn">Back to panel</a>
@endsection

@section('scripts')
<script>
document.addEventListener("DOMContentLoaded", function() {
   const invoiceSelect = document.getElementById('invoice_no');
   const selectedInvoiceNumber = invoiceSelect.value;
   findInvoice(selectedInvoiceNumber);

   invoiceSelect.addEventListener('change', function() {

   });

   function findInvoice(invoiceNumber) {
    // Construct the URL for fetching invoice data from your server
    const url = `/invoices/${invoiceNumber}`;
    return fetch(url)   
    .then(response => {
        // Check if the response is successful
        if (!response.ok) {
            throw new Error('Failed to fetch invoice data');
        }
        // Parse the JSON response
        return response.json();
    })
    .then(data => {
        console.log(data);
        // Return the fetched invoice data
        document.getElementById('currency_type').value = data.currency_type;
        document.getElementById('conversions_rate').value = data.conversion_rate;
        document.getElementById('period_from').value = data.period_from;
        document.getElementById('period_to').value = data.period_to;

        document.getElementById('invoice_date').value = data.invoice_date;
        document.getElementById('invoice_type').value = data.invoice_type;

        document.getElementById('bill_to_company_name').value = data.bill_to_company_name;
        document.getElementById('bill_to_company_gstin').value = data.bill_to_company_gstin;
        document.getElementById('bill_to_company_address').value = data.bill_to_company_address;

        document.getElementById('company_tax_number_id').value = data.company_tax_number_id;

        document.getElementById('address').value = data.address;
        document.getElementById('gstin').value = data.gstin;
        document.getElementById('description').value = data.description;

        document.getElementById('taxable_amount').value = data.taxable_amount;
        document.getElementById('gst_type').value = data.gst_type;

        document.getElementById('tax_amount').value = data.tax_amount;
        document.getElementById('roundup_amount').value = data.roundup_amount;

        document.getElementById('total_amount').value = data.total_amount;
        document.getElementById('bank_name').value = data.bank_name;
        document.getElementById('bank_branch_name').value = data.bank_branch_name;

        document.getElementById('bank_account_number').value = data.bank_account_number;
        document.getElementById('bank_ifsc_code').value = data.bank_ifsc_code;
        document.getElementById('note').value = data.note;
        document.getElementById('status').value = data.status;
       // document.getElementById('transactionId').value = data.transactionId;








        console.log(data);



    })


    .catch(error => {
        // Handle errors
        console.error('Error fetching invoice data:', error);
        return null;
    });
}
});
</script>
@endsection



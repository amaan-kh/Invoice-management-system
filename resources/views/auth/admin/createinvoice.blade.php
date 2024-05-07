<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>NEW INVOICE</title>
    <link rel="stylesheet" href="{{ asset('css/createinvoice.css') }}">
    <style type="text/css">
        

</style>
</head>
<body>
   <h2>Create New Invoice</h2>
   <div class="create-user-container">


    @if(session()->has('err_message'))
    <div class="alert alert-danger">
        {{ session('err_message') }}
    </div>
    @endif
<br>
<br>
<div class="container"> 
    <form action="{{ route('invoice.create') }}" method="POST">
        @csrf <!-- Laravel CSRF protection token -->
        <!-- <div class="container2"> 
            <div class="column">
                <div class="form-group">
                    <label for="invoice_no">Invoice Number<span class="required">*</span>:</label>
                    <input type="text" id="invoice_no" name="invoice_no" required>
                </div>
                <div class="form-group">
                    <label for="supplier_info">Supplier Information<span class="required">*</span>:</label>
                    <input type="text" id="supplier_info" name="supplier_info" value="{{ old('supplier_info') }}" required>
                </div>
                <div class="form-group">
                    <label for="customer_info">Customer Information<span class="required">*</span>:</label>
                    <input type="text" id="customer_info" name="customer_info" value="{{ old('customer_info') }}"required>
                </div>
                <div class="form-group">
                    <label for="invoice_date">Invoice Date<span class="required">*</span>:</label>
                    <input type="date" id="invoice_date" name="invoice_date" value="{{ old('invoice_date') }}" required>
                </div>
                <div class="form-group">
                    <label for="due_date">Due Date<span class="required">*</span>:</label>
                    <input type="date" id="due_date" name="due_date" value="{{ old('due_date') }}"required>
                </div>
            </div>
            <div class="column">
                <div class="form-group">
                    <label for="itemized_list">Itemized List of Products/Services<span class="required">*</span>:</label>
                    <textarea id="itemized_list" name="itemized_list" rows="7" required>{{ old('itemized_list') }}</textarea >
                </div>
                <div class="form-group">
                    <label for="subtotal">Subtotal<span class="required">*</span>:</label>
                    <input type="number" id="subtotal" name="subtotal" step="0.01" value="{{ old('subtotal') }}"required>
                </div>
                <div class="form-group">
                    <label for="taxes">Taxes<span class="required">*</span>:</label>
                    <input type="number" id="taxes" name="taxes" step="0.01" value="{{ old('taxes') }}"required>
                </div>
                <div class="form-group">
                    <label for="total_amount_due">Total Amount Due<span class="required">*</span>:</label>
                    <input type="number" id="total_amount_due" name="total_amount_due" step="0.01" value="{{ old('total_amount_due') }}" required>
                </div>
            </div>
        </div>
         <button type="submit">Create</button> -->

         <!-- Invoice Number -->
                        <div class="form-group">
                            <label for="invoice_number">Invoice Number</label>
                            <input type="text" name="invoice_number" class="form-control" required>
                        </div>

                        <!-- Currency Type -->
                        <div class="form-group">
                            <label for="currency_type">Currency Type</label>
                            <input type="number" name="currency_type" class="form-control" value="{{ old('currency_type') }}" required>
                        </div>

                        <!-- Conversion Rate -->
                        <div class="form-group">
                            <label for="conversions_rate">Conversion Rate</label>
                            <input type="number" name="conversions_rate" step="0.01" class="form-control" value="{{ old('conversions_rate') }}"required>
                        </div>

                        <!-- Period From -->
                        <div class="form-group">
                            <label for="period_from">Period From</label>
                            <input type="date" name="period_from" class="form-control" value="{{ old('period_from') }}" required>
                        </div>

                        <!-- Period To -->
                        <div class="form-group">
                            <label for="period_to">Period To</label>
                            <input type="date" name="period_to" class="form-control" value="{{ old('period_to') }}" required>
                        </div>

                        <!-- Invoice Date -->
                        <div class="form-group">
                            <label for="invoice_date">Invoice Date</label>
                            <input type="date" name="invoice_date" class="form-control" value="{{ old('invoice_date') }}" required>
                        </div>

                        <!-- Invoice Type -->
                        <div class="form-group">
                            <label for="invoice_type">Invoice Type</label>
                            <input type="text" name="invoice_type" class="form-control" value="{{ old('invoice_type') }}" required>
                        </div>

                        <!-- Bill To Company Information -->
                        <div class="form-group">
                            <label for="bill_to_company_name">Bill To Company Name</label>
                            <input type="text" name="bill_to_company_name" class="form-control" value="{{ old('bill_to_company_name') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="bill_to_company_address">Bill To Company Address</label>
                            <textarea name="bill_to_company_address" class="form-control" rows="3"  required>{{ old('bill_to_company_address') }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="bill_to_company_gstin">Bill To Company GSTIN</label>
                            <input type="text" name="bill_to_company_gstin" class="form-control" value="{{ old('bill_to_company_gstin') }}"required>
                        </div>

                        <!-- Company Tax Number ID -->
                        <div class="form-group">
                            <label for="company_tax_number_id">Company Tax Number ID</label>
                            <input type="number" name="company_tax_number_id" class="form-control" value="{{ old('company_tax_number_id') }}"required>
                        </div>

                        <!-- Address -->
                        <div class="form-group">
                            <label for="address">Address</label>
                            <textarea name="address" class="form-control" rows="3" required>{{ old('address') }}</textarea>
                        </div>

                        <!-- GSTIN -->
                        <div class="form-group">
                            <label for="gstin">GSTIN</label>
                            <input type="text" name="gstin" class="form-control" value="{{ old('gstin') }}"required>
                        </div>

                        <!-- Description -->
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" class="form-control" rows="3">{{ old('description') }}</textarea>
                        </div>

                        <!-- Taxable Amount -->
                        <div class="form-group">
                            <label for="taxable_amount">Taxable Amount</label>
                            <input type="number" name="taxable_amount" step="0.01" class="form-control" value="{{ old('taxable_amount') }}" required>
                        </div>

                        <!-- GST Type -->
                        <div class="form-group">
                            <label for="gst_type">GST Type</label>
                            <select name="gst_type" class="form-control" required>
                                <option value="cgst+sgst" @if(old('gst_type') == 'cgst+sgst') selected @endif>CGST + SGST</option>
                                <option value="igst" @if(old('gst_type') == 'igst') selected @endif>IGST</option>
                            </select>
                        </div>

                        <!-- Tax Amount -->
                        <div class="form-group">
                            <label for="tax_amount">Tax Amount</label>
                            <input type="number" name="tax_amount" step="0.01" class="form-control" value="0" value="{{ old('tax_amount') }}" required>
                        </div>

                        <!-- Roundup Amount -->
                        <div class="form-group">
                            <label for="roundup_amount">Roundup Amount</label>
                            <input type="number" name="roundup_amount" step="0.01" class="form-control" value="{{ old('roundup_amount') }}" required>
                        </div>

                        <!-- Total Amount -->
                        <div class="form-group">
                            <label for="total_amount">Total Amount</label>
                            <input type="number" name="total_amount" step="0.01" class="form-control" value="{{ old('total_amount') }}" required>
                        </div>

                        <!-- Bank Information -->
                        <div class="form-group">
                            <label for="bank_name">Bank Name</label>
                            <input type="text" name="bank_name" class="form-control" value="{{ old('bank_name') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="bank_branch_name">Bank Branch Name</label>
                            <input type="text" name="bank_branch_name" class="form-control"  value="{{ old('bank_branch_name') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="bank_account_number">Bank Account Number</label>
                            <input type="text" name="bank_account_number" class="form-control" value="{{ old('bank_account_number') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="bank_ifsc_code">Bank IFSC Code</label>
                            <input type="text" name="bank_ifsc_code" class="form-control" value="{{ old('bank_ifsc_code') }}" required>
                        </div>

                        <!-- Note -->
                        <div class="form-group">
                            <label for="note">Note</label>
                            <textarea name="note" class="form-control" rows="3">{{ old('note') }}</textarea>
                        </div>

                        <!-- Status -->
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" class="form-control" required>
                                <option value="active" @if(old('status') == 'active') selected @endif>Active</option>
                                <option value="pending" @if(old('status') == 'pending') selected @endif>Pending</option>
                                <option value="cancelled" @if(old('status') == 'cancelled') selected @endif>Cancelled</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Create Invoice</button>
    </form>
    <br>
</div>
</div>
<a href="{{ route('admin.home') }}">Back to panel</a>
<script>
    // Function to calculate total amount due
    function calculateTotalAmountDue() {
        var subtotal = parseFloat(document.getElementById("subtotal").value);
        var taxPercentage = parseFloat(document.getElementById("taxes").value);
        var totalAmountDue = subtotal + (subtotal * (taxPercentage / 100));
        document.getElementById("total_amount_due").value = totalAmountDue.toFixed(2);
    }

    // Event listener to recalculate total amount due on input change
    document.addEventListener("DOMContentLoaded", function() {
        document.getElementById("subtotal").addEventListener("input", calculateTotalAmountDue);
        document.getElementById("taxes").addEventListener("input", calculateTotalAmountDue);
    });
</script>
</body>
</html>



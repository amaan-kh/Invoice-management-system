@extends('layouts.adminlayout')

@section('title')
	NEW INVOICE
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('css/createinvoice.css') }}">
@endsection


@section('maincontent')
   <h4 id="heading">Create New Invoice</h4>
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
         <!-- Invoice Number --><div id="fsc">
                        <div class="subcontainer">
                        <div class="form-group">
                            <label for="invoice_number">Invoice Number<span class="required">*</span>:</label>
                            <input type="text" name="invoice_number" class="form-control" required>
                        </div>

                        <!-- Currency Type -->
                        <div class="form-group">
                            <label for="currency_type">Currency Type<span class="required">*</span>:</label>
                            <input type="number" name="currency_type" class="form-control" value="{{ old('currency_type') }}" required>
                        </div>

                        <!-- Conversion Rate -->
                        <div class="form-group">
                            <label for="conversions_rate">Conversion Rate<span class="required">*</span>:</label>
                            <input type="number" name="conversions_rate" step="0.01" class="form-control" value="{{ old('conversions_rate') }}"required>
                        </div>

                        <!-- Period From -->
                        <div class="form-group">
                            <label for="period_from">Period From<span class="required">*</span>:</label>
                            <input type="date" name="period_from" class="form-control" value="{{ old('period_from') }}" required>
                        </div>

                        <!-- Period To -->
                        <div class="form-group">
                            <label for="period_to">Period To<span class="required">*</span>:</label>
                            <input type="date" name="period_to" class="form-control" value="{{ old('period_to') }}" required>
                        </div>

                        <!-- Invoice Date -->
                        <div class="form-group">
                            <label for="invoice_date">Invoice Date<span class="required">*</span>:</label>
                            <input type="date" name="invoice_date" class="form-control" value="{{ old('invoice_date') }}" required>
                        </div>

                        <!-- Invoice Type -->
                        <div class="form-group">
                            <label for="invoice_type">Invoice Type<span class="required">*</span>:</label>
                            <input type="text" name="invoice_type" class="form-control" value="{{ old('invoice_type') }}" required>
                        </div>

                        <!-- Bill To Company Information -->
                        <div class="form-group">
                            <label for="bill_to_company_name">Bill To Company Name<span class="required">*</span>:</label>
                            <input type="text" name="bill_to_company_name" class="form-control" value="{{ old('bill_to_company_name') }}" required>
                        </div>
                    
                        <div class="form-group">
                            <label for="bill_to_company_address">Bill To Company Address<span class="required">*</span>:</label>
                            <textarea name="bill_to_company_address" class="form-control" rows="3"  required>{{ old('bill_to_company_address') }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="bill_to_company_gstin">Bill To Company GSTIN<span class="required">*</span>:</label>
                            <input type="text" name="bill_to_company_gstin" class="form-control" value="{{ old('bill_to_company_gstin') }}"required>
                        </div>

                        <!-- Company Tax Number ID -->
                        <div class="form-group">
                            <label for="company_tax_number_id">Company Tax Number ID<span class="required">*</span>:</label>
                            <input type="number" name="company_tax_number_id" class="form-control" value="{{ old('company_tax_number_id') }}" min="0" required>
                        </div>
                        
                        <!-- Address -->
                        <div class="form-group">
                            <label for="address">Address<span class="required">*</span>:</label>
                            <textarea name="address" class="form-control" rows="3" required>{{ old('address') }}</textarea>
                        </div>

                        <!-- GSTIN -->
                        <div class="form-group">
                            <label for="gstin">GSTIN<span class="required">*</span>:</label>
                            <input type="text" name="gstin" class="form-control" value="{{ old('gstin') }}"required>
                        </div>
</div>
                    <div class="subcontainer">
                        <!-- Description -->
                        <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea name="description" class="form-control" rows="3">{{ old('description') }}</textarea>
                        </div>

                        <!-- Taxable Amount -->
                        <div class="form-group">
                            <label for="taxable_amount">Taxable Amount<span class="required">*</span>:</label>
                            <input type="number" name="taxable_amount" step="0.01" class="form-control" value="{{ old('taxable_amount') }}" required>
                        </div>

                        <!-- GST Type -->
                        <div class="form-group">
                            <label for="gst_type">GST Type<span class="required">*</span>:</label>
                            <select name="gst_type" class="form-control" required>
                                <option value="cgst+sgst" @if(old('gst_type') == 'cgst+sgst') selected @endif>CGST + SGST</option>
                                <option value="igst" @if(old('gst_type') == 'igst') selected @endif>IGST</option>
                            </select>
                        </div>

                        <!-- Tax Amount -->
                        <div class="form-group">
                            <label for="tax_amount">Tax Amount<span class="required">*</span>:</label>
                            <input type="number" name="tax_amount" step="0.01" class="form-control" value="0" value="{{ old('tax_amount') }}" required>
                        </div>

                        <!-- Roundup Amount -->
                        <div class="form-group">
                            <label for="roundup_amount">Roundup Amount<span class="required">*</span>:</label>
                            <input type="number" name="roundup_amount" step="0.01" class="form-control" value="{{ old('roundup_amount') }}" required>
                        </div>

                        <!-- Total Amount -->
                        <div class="form-group">
                            <label for="total_amount">Total Amount<span class="required">*</span>:</label>
                            <input type="number" name="total_amount" step="0.01" class="form-control" value="{{ old('total_amount') }}" required>
                        </div>

                        <!-- Bank Information -->
                        <div class="form-group">
                            <label for="bank_name">Bank Name<span class="required">*</span>:</label>
                            <input type="text" name="bank_name" class="form-control" value="{{ old('bank_name') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="bank_branch_name">Bank Branch Name<span class="required">*</span>:</label>
                            <input type="text" name="bank_branch_name" class="form-control"  value="{{ old('bank_branch_name') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="bank_account_number">Bank Account Number<span class="required">*</span>:</label>
                            <input type="text" name="bank_account_number" class="form-control" value="{{ old('bank_account_number') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="bank_ifsc_code">Bank IFSC Code<span class="required">*</span>:</label>
                            <input type="text" name="bank_ifsc_code" class="form-control" value="{{ old('bank_ifsc_code') }}" required>
                        </div>

                        <!-- Note -->
                        <div class="form-group">
                            <label for="note">Note</label>
                            <textarea name="note" class="form-control" rows="3">{{ old('note') }}</textarea>
                        </div>

                        <!-- Status -->
                        <div class="form-group">
                            <label for="status">Status<span class="required">*</span>:</label>
                            <select name="status" class="form-control" required>
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
                        <button type="submit" id="createbtn" class="btn btn-primary">Create </button>
    </form>
    <br>
</div>
</div>
<a id="backbtn" href="{{ route('admin.home') }}">Back to panel</a>
@endsection



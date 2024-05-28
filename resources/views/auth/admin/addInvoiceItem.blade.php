@extends('layouts.adminlayout')

@section('title')
NEW INVOICE
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('css/updateinvoice.css') }}">
@endsection

@section('maincontent')
   <h4>Add Invoice Item</h4>
   <div class="container">
    @if(session()->has('err_message'))
    <div class="alert alert-danger">
        {{ session('err_message') }}
    </div>
    @endif   
     <form id="myForm" action="{{ route('addItemPost') }}" method="POST" >
    @csrf
    <div id="fsc">
    <div class="subcontainer">
    
    <label for="invoice_id">For Invoice Number: {{$invoice_number}}</label><br>
    <input hidden type="number" id="invoice_id" name="invoice_id" value="{{$invoice_id}}" required><br>

    <label for="asset_tag">Asset Tag:</label><br>
    <input type="text" id="asset_tag" name="asset_tag" value="{{ old('asset_tag') }}"required><br>

    <label for="part_number">Part Number:</label><br>
    <input type="text" id="part_number" name="part_number"><br>

    <label for="serial_number">Serial Number:</label><br>
    <input type="text" id="serial_number" name="serial_number"><br>

    <label for="hsn_code">HSN Code:</label><br>
    <input type="text" id="hsn_code" name="hsn_code"><br>

    <label for="sac_code">SAC Code:</label><br>
    <input type="text" id="sac_code" name="sac_code"><br>

    <label for="description">Description:</label><br>
    <textarea id="description" name="description"></textarea><br>
    </div>
    <div class="subcontainer">
    <label for="gst_percent">GST Percent<span class="required">*</span>:</label><br>
    <input type="number" id="gst_percent" name="gst_percent" required><br>

    <label for="taxable_amount">Taxable Amount<span class="required">*</span>:</label><br>
    <input type="number" id="taxable_amount" name="taxable_amount" required><br>

    <label for="cgst">CGST<span class="required">*</span>:</label><br>
    <input type="number" id="cgst" name="cgst" max=99 step="0.01" required><br>

    <label for="sgst">SGST<span class="required">*</span>:</label><br>
    <input type="number" id="sgst" name="sgst" max=99 step="0.01" required><br>

    <label for="igst">IGST<span class="required">*</span>:</label><br>
    <input type="number" id="igst" name="igst" max=99 step="0.01" required><br>

    <label for="tax_amount">Tax Amount<span class="required">*</span>:</label><br>
    <input type="number" id="tax_amount" name="tax_amount" step="0.01" required><br>

    <label for="total_amount">Total Amount<span class="required">*</span>:</label><br>
    <input type="number" id="total_amount" name="total_amount" step="0.01" required><br>
    </div>
    </div>
    <input type="submit" id="addBtn" value="Add">
</form>
</div>
<a href="{{ route('invoice.index') }}">Back to panel</a>
@endsection

@section('scripts')
<script type="text/javascript">
    $(document).ready(function() {

        $("#myForm").submit(function(event){
            event.preventDefault();

            formData = $(this).serialize();
            console.log(formData);
            $.ajax({
                url: "{{ route('addItemPost') }}",
                method: "POST",
                data: formData,
                success: function(response){
                    document.documentElement.scrollTop = 0;
                    console.log(response.err_message);
                },
                error: function(xhr, status, error){
                    console.error(xhr.responseText);
                },
            });
        });
    });
</script>
@endsection


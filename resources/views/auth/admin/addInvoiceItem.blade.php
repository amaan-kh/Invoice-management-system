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
   <form action="{{ route('addItemPost') }}" method="POST" >
    @csrf
    <label for="invoice_id">Invoice Number: {{$invoice_number}}</label><br>
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

    <label for="gst_percent">GST Percent:</label><br>
    <input type="number" id="gst_percent" name="gst_percent" required><br>

    <label for="taxable_amount">Taxable Amount:</label><br>
    <input type="number" id="taxable_amount" name="taxable_amount" required><br>

    <label for="cgst">CGST:</label><br>
    <input type="number" id="cgst" name="cgst" max=99 step="0.01" required><br>

    <label for="sgst">SGST:</label><br>
    <input type="number" id="sgst" name="sgst" max=99 step="0.01" required><br>

    <label for="igst">IGST:</label><br>
    <input type="number" id="igst" name="igst" max=99 step="0.01" required><br>

    <label for="tax_amount">Tax Amount:</label><br>
    <input type="number" id="tax_amount" name="tax_amount" step="0.01" required><br>

    <label for="total_amount">Total Amount:</label><br>
    <input type="number" id="total_amount" name="total_amount" step="0.01" required><br>

    <input type="submit" value="Submit">
</form>

    <br>
</div>
</div>
<a href="{{ route('invoice.index') }}">Back to panel</a>
<script>
    
</script>
</body>
</html>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>create new INVOICE</title>
    <link rel="stylesheet" href="{{ asset('css/createinvoice.css') }}">
    <style type="text/css">
        

</style>
</head>
<body>
   <h2>Create NEW INVOICE</h2>
   <div class="create-user-container">

    <span>
       @if(isset($err_message))
       <div class="alert alert-danger">
        {{ $err_message }}
    </div>
    @endif
</span>
<br>
<br>
<div class="container"> 
    <form action="{{ route('invoice.create') }}" method="POST">
        @csrf <!-- Laravel CSRF protection token -->
        <div class="container2"> 
            <div class="column">
                <div class="form-group">
                    <label for="invoice_no">Invoice Number<span class="required">*</span>:</label>
                    <input type="text" id="invoice_no" name="invoice_no" required>
                </div>
                <div class="form-group">
                    <label for="supplier_info">Supplier Information<span class="required">*</span>:</label>
                    <input type="text" id="supplier_info" name="supplier_info" required>
                </div>
                <div class="form-group">
                    <label for="customer_info">Customer Information<span class="required">*</span>:</label>
                    <input type="text" id="customer_info" name="customer_info" required>
                </div>
                <div class="form-group">
                    <label for="invoice_date">Invoice Date<span class="required">*</span>:</label>
                    <input type="date" id="invoice_date" name="invoice_date" required>
                </div>
                <div class="form-group">
                    <label for="due_date">Due Date<span class="required">*</span>:</label>
                    <input type="date" id="due_date" name="due_date" required>
                </div>
            </div>
            <div class="column">
                <div class="form-group">
                    <label for="itemized_list">Itemized List of Products/Services<span class="required">*</span>:</label>
                    <textarea id="itemized_list" name="itemized_list" rows="7" required></textarea >
                </div>
                <div class="form-group">
                    <label for="subtotal">Subtotal<span class="required">*</span>:</label>
                    <input type="number" id="subtotal" name="subtotal" step="0.01" required>
                </div>
                <div class="form-group">
                    <label for="taxes">Taxes<span class="required">*</span>:</label>
                    <input type="number" id="taxes" name="taxes" step="0.01" required>
                </div>
                <div class="form-group">
                    <label for="total_amount_due">Total Amount Due<span class="required">*</span>:</label>
                    <input type="number" id="total_amount_due" name="total_amount_due" step="0.01" required>
                </div>
            </div>
        </div>
         <button type="submit">Create</button>
    </form>
    <br>
</div>
</div>
<a href="{{ route('admin.home') }}">Back to panel</a>
</body>
</html>



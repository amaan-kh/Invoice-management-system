<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Invoice</title>
    <link rel="stylesheet" href="{{ asset('css/deleteinvoice.css') }}">
    
    
</head>
<body>
    <h2>Delete INVOICE</h2>
<div class="container">
    <form action="{{ route('invoice.delete') }}" method="POST">
        @csrf
        <label for="invoice_no"><b>Enter the Invoice number of the invoice to delete<span class="required">*</span>:</b></label><br>
        <!-- <input type="number" id="invoice_no" name="invoice_no" required><br><br> -->
        <select id="invoice_no" name="invoice_no" required>
                <option disabled selected>Select Invoice number</option>
                @foreach ($invoices as $invoice)
                    <option value="{{ $invoice->invoice_number }}">{{ $invoice->invoice_number }}</option>
                @endforeach
            </select><br><br>
        <button type="submit">Remove</button>
    </form>
    <br>
    @if(isset($error_message))
    <div class="alert alert-danger">
        {{ $error_message }}
    </div>
    @endif
<div id="data">
       <div class="data">
        <h4>All Invoices</h4>
        <ul>
            @foreach ($invoices as $invoice)
            <li>{{ $invoice->invoice_number }}</li>
            @endforeach
        </ul>
    </div>
    <br>
    <br>
    <a href="{{ route('admin.home') }}">Back to panel</a>
    </div>
</body>
</html>

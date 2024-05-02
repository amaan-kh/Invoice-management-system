<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice List</title>
    <link rel="stylesheet" href="{{ asset('css/usersingleinvoice.css') }}">
</head>
<body>
    <div class="container">
        <div class="invoice-list">   
            <div class="invoice-item">
             <p><b>Invoice Number:</b> {{ $invoice->invoice_number }}</p>
             <p><b>Supplier Information:</b> {{ $invoice->supplier_info }}</p>
             <p><b>Customer Information:</b> {{ $invoice->customer_info }}</p>
             <p><b>Invoice Date:</b> {{ $invoice->invoice_date }}</p>
             <p><b>Due Date:</b> {{ $invoice->due_date }}</p>
             <p><b>Itemized List:</b> {{ $invoice->itemized_list }}</p>
             <p><b>Subtotal:</b> {{ $invoice->subtotal }}</p>
             <p><b>Taxes:</b> {{ $invoice->taxes }}</p>
             <p><b>Total Amount Due:</b> {{ $invoice->total_amount_due }}</p> 
         </div>        
     </div>

     <a href="{{ route('user.home',['name' => $name]) }}" class="back-link">BACK</a>

 </div>

</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice List</title>
    <script src="https://unpkg.com/htmx.org@1.9.12" integrity="sha384-ujb1lZYygJmzgSwoxRggbCHcjc0rB2XoQrxeTUQyRjrOnlCoYta87iKBWq3EsdM2" crossorigin="anonymous"></script>
    <style type="text/css">
       body {
    font-family: Arial, sans-serif;
    background-color: #f8f9fa;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
}

.invoice-list {
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    padding: 20px;
    margin-bottom: 20px;
}

.invoice-item {
    margin-bottom: 20px;
}

.invoice-item p {
    margin: 5px 0;
}

.invoice-item p b {
    color: #333;
}

.back-link {
    display: inline-block;
    text-decoration: none;
    color: #007bff;
    padding: 5px 10px;
    border: 1px solid #007bff;
    border-radius: 5px;
    background-color: transparent;
}

.back-link:hover {
    background-color: #007bff;
    color: #fff;
}

    </style>
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
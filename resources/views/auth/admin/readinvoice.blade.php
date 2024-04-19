<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>All Invoices</title>
	<style type="text/css">
		/* Resetting default margin and padding for all elements */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Body styles */
body {
    font-family: Arial, sans-serif;
    background-color: #f0f0f0;
    padding: 20px;
}

/* Heading styles */
h1, p {
    color: #333;
    text-align: center;
    margin-bottom: 20px;
}

/* Invoice list styles */
.invoice-list {
    width: 80%;
    margin: 0 auto;
}

/* List styles */
ul {
    list-style: none;
    padding-left: 0;
}

/* List item styles */
.invoice-list li {
    margin-bottom: 20px;
}

/* Horizontal rule styles */
.invoice-list hr {
    border: 0;
    border-top: 1px solid #ccc;
    margin: 10px 0;
}

/* Link styles */
a {
    display: block;
    text-align: center;
    margin-top: 20px;
    color: #007bff;
    text-decoration: none;
}

a:hover {
    text-decoration: underline;
}

	</style>
</head>
<body>

	<h1>All issued invoices available on platform</h1>
	<!-- <p> available on platform</p> -->

	<div class="invoice-list">
	<ul>
		@foreach ($invoices as $invoice) 
		 <li>
		 	<hr>
		<p><b><u>Invoice Number:</b> {{ $invoice->invoice_number}}</u> </p>
        <p><b>Supplier Information:</b>  {{ $invoice->supplier_info }}</p>
        <p><b>Customer Information:</b>  {{ $invoice->customer_info }}</p>
        <p><b>Invoice Date:</b>  {{ $invoice->invoice_date }}</p>
        <p><b>Due Date:</b>  {{ $invoice->due_date }}</p>
        <p><b>Itemized List:</b>  {{ $invoice->itemized_list }}</p>
        <p><b>Subtotal:</b>  {{ $invoice->subtotal }}</p>
        <p><b>Taxes:</b>  {{ $invoice->taxes }}</p>
        <p><b>Total Amount Due:</b>  {{ $invoice->total_amount_due }}</p>
        <br>
        <hr>
    </li>
		@endforeach
	</ul>
	</div>

	<a href="{{ route('admin.home') }}">BACK</a>

</body>
</html>
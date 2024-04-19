<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>All Invoices</title>
</head>
<body>

	<h1>All issued invoices</h1>
	<p> available on platform</p>

	<div class="invoice-list">
	<ul>
		@foreach ($invoices as $invoice) 
		 <li>
		 	<hr>
		<p>Invoice Number: {{ $invoice->invoice_number}} </p>
        <p>Supplier Information: {{ $invoice->supplier_info }}</p>
        <p>Customer Information: {{ $invoice->customer_info }}</p>
        <p>Invoice Date: {{ $invoice->invoice_date }}</p>
        <p>Due Date: {{ $invoice->due_date }}</p>
        <p>Itemized List: {{ $invoice->itemized_list }}</p>
        <p>Subtotal: {{ $invoice->subtotal }}</p>
        <p>Taxes: {{ $invoice->taxes }}</p>
        <p>Total Amount Due: {{ $invoice->total_amount_due }}</p>
        <br>
        <hr>
    </li>
		@endforeach
	</ul>
	</div>

	<a href="{{ route('admin.home') }}">BACK</a>

</body>
</html>
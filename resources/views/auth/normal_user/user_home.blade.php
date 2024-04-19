<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>User invoice account</title>
</head>
<body>

	<h1>User invoice account </h1>

	@if($invoices->isNotEmpty())
    <ul>
        @foreach($invoices as $invoice)
        <li>
            <hr>
            <p>Invoice Number: {{ $invoice->invoice_number }}</p>
            <p>Supplier Information: {{ $invoice->supplier_info }}</p>
            <p>Customer Information: {{ $invoice->customer_info }}</p>
            <p>Invoice Date: {{ $invoice->invoice_date }}</p>
            <p>Due Date: {{ $invoice->due_date }}</p>
            <p>Itemized List: {{ $invoice->itemized_list }}</p>
            <p>Subtotal: {{ $invoice->subtotal }}</p>
            <p>Taxes: {{ $invoice->taxes }}</p>
            <p>Total Amount Due: {{ $invoice->total_amount_due }}</p>
            <hr>
        </li>
        @endforeach
    </ul>
    @else
    <p>No invoices found.</p>
    @endif


    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Logout</button>
    </form>


</body>
</html>
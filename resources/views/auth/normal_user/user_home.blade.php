<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>User invoice account</title>
    <style>
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
h1 {
    color: #333;
    text-align: center;
    margin-bottom: 20px;
}

/* List styles */
ul {
    list-style: none;
    padding-left: 0;
}

/* List item styles */
ul li {
    margin-bottom: 20px;
}

/* Horizontal rule styles */
hr {
    border: 0;
    border-top: 1px solid #ccc;
    margin: 10px 0;
}

/* Logout button styles */
button[type="submit"] {
    background-color: #dc3545;
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    margin-top: 20px;
}

button[type="submit"]:hover {
    background-color: #c82333;
}

    </style>
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
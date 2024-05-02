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

.invoice-item {
    background-color: #ffffff;
    padding: 20px;
    border-radius: 5px;
    margin-bottom: 20px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
}
.invoice-item p {
    margin: 5px 0;
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
form {
            position: fixed;
            bottom: 30px;
            right: 30px;
        }
 #logout {
            padding: 10px 20px;
            background-color: #f52525; /* Blue color for the button background */
            color: #fff; /* White color for the button text */
            border: none;
            border-radius: 5px; /* Rounded corners */
            cursor: pointer;
            transition: background-color 0.3s ease; /* Smooth transition for hover effect */
        }
        #logout:hover {
            background-color: #910000; /* Darker blue color on hover */
        }

</style>
</head>
<body>

	<h1>User invoice account </h1>

	@if($invoices->isNotEmpty())
    <div class="invoice-list">
        <ul>
            @foreach ($invoices as $invoice)
            <li class="invoice-item">
                <p><b>Invoice Number:</b> {{ $invoice->invoice_number }}</p>
                <!-- <p><b>Supplier Information:</b> {{ $invoice->supplier_info }}</p>
                <p><b>Customer Information:</b> {{ $invoice->customer_info }}</p>
                <p><b>Invoice Date:</b> {{ $invoice->invoice_date }}</p>
                <p><b>Due Date:</b> {{ $invoice->due_date }}</p>
                <p><b>Itemized List:</b> {{ $invoice->itemized_list }}</p>
                <p><b>Subtotal:</b> {{ $invoice->subtotal }}</p>
                <p><b>Taxes:</b> {{ $invoice->taxes }}</p>
                <p><b>Total Amount Due:</b> {{ $invoice->total_amount_due }}</p> -->
            </li>
            @endforeach
        </ul>
    </div>
    @else
    <p>No invoices found.</p>
    @endif


    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" id="logout">Logout</button>
    </form>


</body>
</html>
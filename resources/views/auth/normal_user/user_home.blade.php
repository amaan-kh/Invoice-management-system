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
h1,h4 {
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
    padding: 5px;
    border-radius: 5px;
    margin-bottom: 5px;
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
.invoice-details {
        display: flex;
        align-items: center;
        margin-right: 10px;
    }

</style>
</head>
<body>

	<h1>User invoice account </h1>
    <h3> Welcome {{$name}} </h3>


    @if($invoices->isNotEmpty())
    <h4>All Issued Invoices</h4>

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
    <!-- <div class="invoice-list"> -->
        <ul>
            @foreach ($invoices as $invoice)
            <li class="invoice-item">
                <div class="invoice-details">
                    <p><b>Invoice Number:</b> {{ $invoice->invoice_number }} &nbsp </p>
                    <a href="{{ route('invoicePageViewUser', ['id' => $invoice->invoice_number, 'name' => $name]) }}">View</a>

                </div>
            </li>
            @endforeach
        </ul>
        <!-- </div> -->
    @else
    <p>No invoices found.</p>
    @endif 

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" id="logout">Logout</button>
        </form>


    </body>
    </html>
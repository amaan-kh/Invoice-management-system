<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>YOUR INVOICES</title>
    <link rel="stylesheet" href="{{ asset('css/userhome.css') }}">
</head>
<body>
    <nav>
            <h1>User invoice account </h1>

    </nav>
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
                    <a href="{{ route('invoicePageViewUser', ['id' => $invoice->invoice_number, 'name' => $name]) }}">Payment</a>

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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice List</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/readinvoice.css')}}">
</head>
<body>
        <h1>All Issued Invoices</h1>
            <ol>
                @foreach ($invoices as $invoice)
                <li class="invoice-item">
                    <div class="invoice-details">
                    <p><b>Invoice Number:</b> {{ $invoice->invoice_number }} &nbsp </p>
                    <a href="{{ route('invoicePageView', ['id' => $invoice->invoice_number]) }}">View</a>
                    </div>
                </li>
                @endforeach
            </ol>
        <a href="{{ route('admin.home') }}" class="back-link">BACK</a>
</body>
</html>

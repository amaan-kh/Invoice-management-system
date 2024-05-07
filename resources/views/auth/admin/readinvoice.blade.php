
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ALL INVOICES</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/readinvoice.css')}}">
</head>
<body>
        <h1>All Issued Invoices</h1>
        @if(session()->has('err_message'))
    <div class="alert alert-danger">
        {{ session('err_message') }}
    </div>
    @endif
            <ol>
                @foreach ($invoices as $invoice)
                <li class="invoice-item">
                    <div class="invoice-details">
                    <p><b>Invoice Number:</b> {{ $invoice->invoice_number }} &nbsp </p>
                    <a href="{{ route('invoicePageView', ['id' => $invoice->invoice_number]) }}">View</a>
                     &nbsp
                      <a href="{{ route('invoice.updateget', ['id' => $invoice->invoice_number]) }}">Update</a>&nbsp 
                      <form action="{{ route('invoice.delete') }}" method="POST">
                        @csrf
                        <input type="hidden" name="invoice_no" value="{{ $invoice->invoice_number }}">
                        <button type="submit">Remove</button>
                        </form>
                    </div>
                </li>
                @endforeach
            </ol>
        <a href="{{ route('admin.home') }}" class="back-link">BACK</a>
</body>
</html>



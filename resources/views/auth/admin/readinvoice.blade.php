
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice List</title>
    <script src="https://unpkg.com/htmx.org@1.9.12" integrity="sha384-ujb1lZYygJmzgSwoxRggbCHcjc0rB2XoQrxeTUQyRjrOnlCoYta87iKBWq3EsdM2" crossorigin="anonymous"></script>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        .invoice-item {
            background-color: #ffffff;
            padding: 1px;
            border-radius: 5px;
            margin-bottom: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }
        .invoice-item p {
            margin: 5px 0;
        }
         .invoice-details {
        display: flex;
        align-items: center;
        margin-right: 10px;
    }
        .back-link {
            display: block;
            text-align: center;
            margin-top: 20px;
        }
        .back-link {
            display: block;
            text-align: center;
            position: fixed;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            padding: 10px 20px;
            background-color: #007bff; /* Blue color for the link background */
            color: #fff; /* White color for the link text */
            text-decoration: none; /* Remove underline */
            border-radius: 5px; /* Rounded corners */
            transition: background-color 0.3s ease; /* Smooth transition for hover effect */
        }
        .back-link:hover {
            background-color: #0056b3; /* Darker blue color on hover */
        }
    </style>
</head>
<body>

    <!-- <div class="container"> -->

        <h1>All Issued Invoices</h1>

        <!-- <div class="invoice-list"> -->
            <ul>
                @foreach ($invoices as $invoice)
                <li class="invoice-item">
                    <div class="invoice-details">
                    <p><b>Invoice Number:</b> {{ $invoice->invoice_number }} &nbsp </p>
                    <form action="{{ route('invoicePage') }}" method="POST">
                        @csrf <!-- CSRF protection token -->
                        <!-- Hidden input to store the desired data value -->
                        <input type="hidden" name="key" value="{{ $invoice->invoice_number}}">
                        <!-- Button to submit the form -->
                        <button type="submit">View</button>
                    </form>
                    </div>
                </li>
                @endforeach
            </ul>
        <!-- </div> -->

        <a href="{{ route('admin.home') }}" class="back-link">BACK</a>

    <!-- </div> -->

</body>
</html>

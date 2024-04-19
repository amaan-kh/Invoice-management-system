<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice Form</title>
    <style >
        #data{
            display: flex;
        }
        .data{
            padding: 15px;

        }
    </style>
</head>
<body>
    <h1>Invoice Form</h1>
    <form action="{{ route('allocate') }}" method="POST">
        @csrf <!-- Laravel CSRF protection token -->
        <label for="name">Username:</label><br>
        <input type="text" id="name" name="name" required><br><br>

        <label for="invoice_number">Invoice Number:</label><br>
        <input type="number" id="invoice_number" name="invoice_number" required>
        <br>
        <span>@if(isset($err_message))
            <div class="alert alert-danger">
                {{ $err_message }}
            </div>
            @endif
        </span>
        <br>    
        <button type="submit">Submit</button>
    </form>
    <br>
    <div id="data">
     <div class="data">
        <h4>List of Users</h4>
        <ul>
            @foreach ($users as $user)
            <li>{{ $user->name }}</li>
            @endforeach
        </ul>
    </div>
    <div class="data">
       <h4>List of Invoices</h4>
       <ul>
        @foreach ($invoices as $invoice)
        <li>{{ $invoice->invoice_number }}</li>
        @endforeach
    </ul>
</div>
</div>
<br>
<br>
<a href="{{ route('admin.home') }}">Back to panel</a>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Invoice</title>

    <style>
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
}

.container {
    width: 50%;
    margin: 50px auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
}

h2 {
    text-align: center;
}

form {
    text-align: center;
}

label {
    display: block;
    margin-bottom: 10px;
}

input[type="number"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 20px;
    box-sizing: border-box;
    border: 1px solid #ccc;
    border-radius: 5px;
}

button {
    padding: 10px 20px;
    background-color: #b50f0d;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

button:hover {
    background-color: #f50a07;
}

.alert {
    padding: 10px;
    margin-bottom: 20px;
    border-radius: 5px;
}

.alert-danger {
    background-color: #f8d7da;
    color: #721c24;
    border: 1px solid #f5c6cb;
}

a {
    display: block;
    text-align: center;
    text-decoration: none;
    color: #007bff;
}

a:hover {
    text-decoration: underline;
}
/* Select styles */
select#invoice_no {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #fff;
    font-size: 14px;
    color: #333;
    appearance: none;
    -webkit-appearance: none;
    -moz-appearance: none;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'%3E%3Cpath d='M7 10l5 5 5-5H7z' fill='%23333'/%3E%3C/svg%3E");
    background-repeat: no-repeat;
    background-position: right 10px center;
    background-size: 12px;
    cursor: pointer;
}

/* Select hover styles */
select#invoice_no:hover {
    border-color: #007bff;
}

/* Select focus styles */
select#invoice_no:focus {
    outline: none;
    border-color: #007bff;
    box-shadow: 0 0 0 2px rgba(0, 123, 255, 0.2);
}
.required {
    color: red;
    font-size: 18px; /* Adjust the size as needed */
}


    </style>
    
</head>
<body>
    <h2>Delete INVOICE</h2>
<div class="container">
    <form action="{{ route('invoice.delete') }}" method="POST">
        @csrf
        <label for="invoice_no"><b>Enter the Invoice number of the invoice to delete<span class="required">*</span>:</b></label><br>
        <!-- <input type="number" id="invoice_no" name="invoice_no" required><br><br> -->
        <select id="invoice_no" name="invoice_no" required>
                <option disabled selected>Select Invoice number</option>
                @foreach ($invoices as $invoice)
                    <option value="{{ $invoice->invoice_number }}">{{ $invoice->invoice_number }}</option>
                @endforeach
            </select><br><br>
        <button type="submit">Remove</button>
    </form>
    <br>
    @if(isset($error_message))
    <div class="alert alert-danger">
        {{ $error_message }}
    </div>
    @endif
<div id="data">
       <div class="data">
        <h4>All Invoices</h4>
        <ul>
            @foreach ($invoices as $invoice)
            <li>{{ $invoice->invoice_number }}</li>
            @endforeach
        </ul>
    </div>
    <br>
    <br>
    <a href="{{ route('admin.home') }}">Back to panel</a>
    </div>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice Form</title>
    <style >
        
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

/* Form styles */
form {
    width: 300px;
    margin: 0 auto;
}

/* Label styles */
label {
    color: #333;
    font-weight: bold;
}

/* Input styles */
input[type="text"],
input[type="number"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

/* Button styles */
button[type="submit"] {
    width: 100%;
    background-color: #007bff;
    color: #fff;
    border: none;
    padding: 10px 0;
    border-radius: 5px;
    cursor: pointer;
}

button[type="submit"]:hover {
    background-color: #0056b3;
}

/* Error message styles */
.alert {
    background-color: #f8d7da;
    color: #721c24;
    padding: 10px;
    border-radius: 5px;
    margin-bottom: 20px;
}

/* Data section styles */
#data {
    display: flex;
    justify-content: center;
    margin-top: 20px;
}

/* Data container styles */
.data {
    padding: 15px;
    background-color: #fff;
    border: 1px solid #ccc;
    border-radius: 5px;
    margin: 0 10px;
}

/* Data heading styles */
.data h4 {
    color: #333;
    margin-bottom: 10px;
}

/* Data list styles */
.data ul {
    list-style: none;
    padding-left: 0;
}

/* Link styles */
a {
    display: block;
    text-align: center;
    margin-top: 20px;
    color: #007bff;
    text-decoration: none;
}

a:hover {
    text-decoration: underline;
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

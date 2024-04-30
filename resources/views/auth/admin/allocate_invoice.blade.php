<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice Form</title>
    <style type="text/css">
  /* General reset and default styles */
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

/* Container styles */
.container {
    width: 400px;
    margin: 0 auto;
    background-color: #fff;
    border-radius: 5px;
    padding: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
}

/* Form styles */
form {
    width: 100%;
}

/* Label styles */
label {
    color: #333;
    font-weight: bold;
    margin-bottom: 5px;
}

/* Input and select styles */
input[type="text"],
input[type="number"],
select {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #fff;
    font-size: 14px;
    color: #333;
}

/* Select styles */
select {
    appearance: none;
    -webkit-appearance: none;
    -moz-appearance: none;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'%3E%3Cpath d='M7 10l5 5 5-5H7z' fill='%23333'/%3E%3C/svg%3E");
    background-repeat: no-repeat;
    background-position: right 10px center;
    background-size: 12px;
    cursor: pointer;
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
    transition: background-color 0.3s ease;
}

button[type="submit"]:hover {
    background-color: #0056b3;
}
a {
    display: block;
    text-align: center;
    text-decoration: none;
    color: #007bff;
}

/* Error message styles */
.alert {
    background-color: #f8d7da;
    color: #721c24;
    padding: 10px;
    border-radius: 5px;
    margin-bottom: 20px;
}


    </style>
</head>
<body>
    <h1>Invoice Sharing</h1>
    <div class="container">
        <div class="data">
        <form action="{{ route('allocate') }}" method="POST">
            @csrf
            <div class="userdata">
           <label for="name">Username:</label><br>
               <!--   <input type="text" id="name" name="name" > -->
                <select id="dropdown-select-name" onchange="updateInput1()" required>
                    <option disabled selected>Select a username</option>
                   @foreach ($users as $user)
                   <option value="{{ $user->name }}">{{ $user->name }}</option>
                   @endforeach
               </select>
                <br><br>
               <!-- Hidden input field to store the selected value -->
               <input type="hidden" id="selected-value-name" name="name" >
               
               <label for="invoice_number">Invoice Number:</label><br>
               <select id="dropdown-select-number" onchange="updateInput2()" required>
                <option disabled selected>Select an invoice number</option>
                   @foreach ($invoices as $invoice)
                   <option value="{{ $invoice->invoice_number }}">{{ $invoice->invoice_number }}</option>
                   @endforeach
               </select>
               <input type="hidden" id="selected-value-number" name="invoice_number" >
               <!-- <input type="number" id="invoice_number" name="invoice_number" required> -->
               <br>
               <span>@if(isset($err_message))
                <div class="alert alert-danger">
                    {{ $err_message }}
                </div>
                @endif
            </span>
            <br>    
            <button type="submit">Submit</button>
            </div>
        </form>
    </div>
        <br>
        <!-- <div id="data">
            <div class="data">
            <h4>List of Users</h4>
            <ul>
                @foreach ($users as $user)
                <li>{{ $user->name }}</li>
                @endforeach
            </ul>
            Dropdown select element

        </div>
        <div class="data">
         <h4>List of Invoices</h4>
         <ul>
            @foreach ($invoices as $invoice)
            <li>{{ $invoice->invoice_number }}</li>
            @endforeach
        </ul>
    </div> -->
<a href="{{ route('admin.home') }}">Back to panel</a>
</div>

<br>
<br>
</div>


<script>
    // Function to update the hidden input field with the selected value
    function updateInput1() {
        var selectedValue = document.getElementById('dropdown-select-name').value;
        document.getElementById('selected-value-name').value = selectedValue;
    }
    function updateInput2() {
        var selectedValue2 = document.getElementById('dropdown-select-number').value;
        document.getElementById('selected-value-number').value = selectedValue2;
    }
</script>
</body>
</html>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>create new INVOICE</title>
    <style type="text/css">
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

/* Container styles */
.create-user-container {
/*    width: 400px;*/
margin: 0 auto;
background-color: #fff;
border-radius: 5px;
padding: 20px;
box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
}

/* Heading styles */
h2 {
    text-align: center;
    margin-bottom: 20px;
    color: #333;
}

/* Error message styles */
.alert {
    background-color: #f8d7da;
    color: #721c24;
    padding: 10px;
    border-radius: 5px;
    margin-bottom: 20px;
}

/* Form styles */
form {
    display: flex;
    flex-direction: column;
}

/* Form group styles */
.form-group {
    margin-bottom: 20px;
}

.container2 {
    display: flex;
    justify-content: space-around;
}

/* Label styles */
label {
    font-weight: bold;
    color: #333;
}

/* Input styles */
input[type="text"],
input[type="date"],
input[type="number"],
textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

/* Button styles */
button[type="submit"] {
    background-color: #007bff;
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    margin-top: 20px;
    width: 20%;
    align-self: center;


}

button[type="submit"]:hover {
    background-color: #0056b3;
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

#itemized_list{
    height: 150px; 
    overflow-y: auto;
    resize: none;
}
.required {
    color: red;
    font-size: 18px; /* Adjust the size as needed */
}


</style>
</head>
<body>
   <h2>Create NEW INVOICE</h2>
   <div class="create-user-container">

    <span>
       @if(isset($err_message))
       <div class="alert alert-danger">
        {{ $err_message }}
    </div>
    @endif
</span>
<br>
<br>
<div class="container"> 
    <form action="{{ route('invoice.create') }}" method="POST">
        @csrf <!-- Laravel CSRF protection token -->
        <div class="container2"> 
            <div class="column">
                <div class="form-group">
                    <label for="invoice_no">Invoice Number<span class="required">*</span>:</label>
                    <input type="text" id="invoice_no" name="invoice_no" required>
                </div>
                <div class="form-group">
                    <label for="supplier_info">Supplier Information<span class="required">*</span>:</label>
                    <input type="text" id="supplier_info" name="supplier_info" required>
                </div>
                <div class="form-group">
                    <label for="customer_info">Customer Information<span class="required">*</span>:</label>
                    <input type="text" id="customer_info" name="customer_info" required>
                </div>
                <div class="form-group">
                    <label for="invoice_date">Invoice Date<span class="required">*</span>:</label>
                    <input type="date" id="invoice_date" name="invoice_date" required>
                </div>
                <div class="form-group">
                    <label for="due_date">Due Date<span class="required">*</span>:</label>
                    <input type="date" id="due_date" name="due_date" required>
                </div>
            </div>
            <div class="column">
                <div class="form-group">
                    <label for="itemized_list">Itemized List of Products/Services<span class="required">*</span>:</label>
                    <textarea id="itemized_list" name="itemized_list" rows="7" required></textarea >
                </div>
                <div class="form-group">
                    <label for="subtotal">Subtotal<span class="required">*</span>:</label>
                    <input type="number" id="subtotal" name="subtotal" step="0.01" required>
                </div>
                <div class="form-group">
                    <label for="taxes">Taxes<span class="required">*</span>:</label>
                    <input type="number" id="taxes" name="taxes" step="0.01" required>
                </div>
                <div class="form-group">
                    <label for="total_amount_due">Total Amount Due<span class="required">*</span>:</label>
                    <input type="number" id="total_amount_due" name="total_amount_due" step="0.01" required>
                </div>
            </div>
        </div>
         <button type="submit">Create</button>
    </form>
    <br>
</div>
</div>
<a href="{{ route('admin.home') }}">Back to panel</a>
</body>
</html>



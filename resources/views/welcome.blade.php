<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>IMS</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- Styles -->
    <style>

        /* Resetting default margin and padding for all elements */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Body styles */
body {
    font-family: 'figtree', sans-serif;
    background-color: #f0f0f0;
/*
    background-image: url('i1.jpg'); 
    background-size: cover; 
    background-repeat: no-repeat;*/
}

/* Heading styles */
h1 {
    text-align: center;
    margin-top: 25px;
    color: #333;
}
h2 {
    text-align: center;
    margin-top: 25px;
    color: #333;
}

/* Login container styles */
.login-container {
    width: 300px;
    margin: 0 auto;
     background-color: rgba(255, 255, 255, 0.4);
    border-radius: 5px;
    padding: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    margin-top: 50px;
}

/* Form styles */
form {
    display: flex;
    flex-direction: column;
    margin-top: 20px;
}

/* Form group styles */
.form-group {
    margin-bottom: 20px;
}

/* Label styles */
label {
    font-weight: bold;
    color: #333;
}

/* Input styles */
input[type="text"],
input[type="password"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    margin-top: 10px;
}

/* Error message styles */
.invalid-feedback {
    color: #dc3545;
}

/* Login button styles */
button[type="submit"] {
    background-color: #fff;
    color: #007bff;
    border: 2px solid;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
}

button[type="submit"]:hover {
    background-color: #007bff;
    color:#fff;
}

    </style>
</head>
<body>

    <h1>INVOICE MANAGEMENT SYSTEM</h1>

    <div class="login-container">
        <h2>Login</h2>
        <form action="" method="POST">
            @csrf <!-- Laravel CSRF protection token -->
            <div class="form-group">
                <label for="name">UserName:</label>
                <!-- <input type="text" id="name" name="name" required> -->
                <input type="text" name="name" value="{{ old('name') }}" required>
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <br>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <br>
            <button type="submit">Login</button>
        </form>

    </div>
    

</body>
</html>

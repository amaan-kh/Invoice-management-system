<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>create new user</title>
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
    width: 300px;
    margin: 0 auto;
    background-color: #fff;
    border-radius: 5px;
    padding: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

/* Heading styles */
h2 {
    text-align: center;
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

/* Label styles */
label {
    font-weight: bold;
    color: #333;
}

/* Input styles */
input[type="text"],
input[type="password"],
input[type="checkbox"] {
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

/* Back link styles */
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
    <div class="create-user-container">
        <h2>Create NEW USER</h2>
        <form action=" {{ route('user.create') }}" method="POST">
            @csrf <!-- Laravel CSRF protection token -->
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <br>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <br>
            <div class="form-group">
               <input type="hidden" name="is_admin" value="0"> <!-- Hidden input with value 0 -->
               <label for="is_admin">Is Admin:</label>
               <input type="checkbox" id="is_admin" name="is_admin" value="1"><br><br>

           </div>
           <br>
           <button type="submit">ADD</button>
       </form>
       @if(isset($error_message))
       <div class="alert alert-danger">
        {{ $error_message }}
    </div>
    @endif

    <br>
    <br>
    <a href="{{ route('admin.home') }}">Back to panel</a>
</div>


</body>
</html>
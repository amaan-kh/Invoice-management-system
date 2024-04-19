<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete User</title>

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
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
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

input[type="text"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 20px;
    box-sizing: border-box;
    border: 1px solid #ccc;
    border-radius: 5px;
}

button {
    padding: 10px 20px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

button:hover {
    background-color: #0056b3;
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

    </style>
    
</head>
<body>
    <h2>Delete User</h2>
<div class="container">
    <form action="{{ route('user.delete') }}" method="POST">
        @csrf
        <label for="username"><b>Enter the name of the user to delete:</b></label><br>
        <input type="text" id="username" name="username" required><br><br>
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
        <h4>List of Users</h4>
        <ul>
            @foreach ($users as $user)
            <li>{{ $user->name }}</li>
            @endforeach
        </ul>
    </div>
    <br>
    <br>
    <a href="{{ route('admin.home') }}">Back to panel</a>
    </div>
</body>
</html>

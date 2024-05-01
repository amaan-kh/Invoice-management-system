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
select {
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
select:hover {
    border-color: #007bff;
}

/* Select focus styles */
select:focus {
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
    <h2>Delete USER</h2>
<div class="container">
    <form action="{{ route('user.delete') }}" method="POST">
        @csrf
        <label for="username"><b>Enter the name of the user to delete<span class="required">*</span>:</b></label><br>
        <!-- <input type="text" id="username" name="username" required><br><br> -->
        <select id="username" name="username" required>
                <option disabled selected>Select User name</option>
                @foreach ($users as $user)
                    <option value="{{ $user->name }}">{{ $user->name }}</option>
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
        <h4>All Users</h4>
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

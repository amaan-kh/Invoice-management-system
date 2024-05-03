<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DELETE USER</title>
    <link rel="stylesheet" href="{{ asset('css/deleteuser.css') }}">
</head>
<body>
    <h2>Delete User</h2>
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

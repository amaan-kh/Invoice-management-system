<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>create new user</title>
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
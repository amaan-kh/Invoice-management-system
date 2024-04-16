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
        <form action="" method="POST">
            @csrf <!-- Laravel CSRF protection token -->
            <div class="form-group">
                <label for="name">Username:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <br>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <br>
            <button type="submit">ADD</button>
        </form>
    </div>


</body>
</html>
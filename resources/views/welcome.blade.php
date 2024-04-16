<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>IMS</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <style>

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
                <input type="text" id="name" name="name" required>
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

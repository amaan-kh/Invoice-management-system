<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice Form</title>
</head>
<body>
    <h1>Invoice Form</h1>
    <form action="{{ route('allocate') }}" method="POST">
        @csrf <!-- Laravel CSRF protection token -->
        <label for="name">Username:</label><br>
        <input type="text" id="name" name="name" required><br><br>

        <label for="title">Invoice Title:</label><br>
        <input type="text" id="title" name="title" required><br><br>

        <button type="submit">Submit</button>
    </form>
</body>
</html>

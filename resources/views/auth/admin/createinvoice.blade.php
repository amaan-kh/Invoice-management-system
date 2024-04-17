<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>create new INVOICE</title>
</head>
<body>
    <div class="create-user-container">
        <h2>Create NEW INVOICE</h2>
        <form action="{{ route('invoice.create') }}" method="POST">
            @csrf <!-- Laravel CSRF protection token -->
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" required>
            </div>
            <br>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea id="message" name="message" rows="4" cols="50"></textarea><br>
            </div>
            <br>
            <button type="submit">ADD</button>
        </form>
        <br>
        <br>
        <a href="{{ route('admin.home') }}">Back to panel</a>
    </div>
</body>
</html>
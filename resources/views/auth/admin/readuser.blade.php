<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
    <link rel="stylesheet" href="{{ asset('css/readuser.css') }}">
</head>
<body>
    <div class="container">
        <h1>All Current Users</h1>
        <div class="user-list">
            <h3>Admins</h3>
            <ul>
                @foreach ($admin_users as $user)
                <li>
                    <p>{{ $user->name }}</p>
                </li>
                @endforeach
            </ul>
        </div>
        <div class="user-list">
            <h3>Users</h3>
            <ul>
                @foreach($non_admin_users as $user)
                <li>
                    <p>{{ $user->name }}</p>
                </li>
                @endforeach
            </ul>	
        </div>	
        <div class="back-button">
            <a href="{{ route('admin.home') }}" id="back">BACK</a>
        </div>
    </div>
</body>
</html>

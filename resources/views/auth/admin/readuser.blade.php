<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa; /* Light gray background */
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        .user-list {
            background-color: #ffffff; /* White background */
            padding: 20px;
            border-radius: 5px;
            margin-bottom: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3); /* Box shadow for depth */
        }
        h3 {
            margin-top: 0;
        }
        .user-list p {
            margin: 5px 0;
        }
        .back-button {
            text-align: center;
            margin-top: 20px;
        }

         #back {
            padding: 10px 20px;
            background-color: #007bff; /* Blue color for the button background */
            color: #fff; /* White color for the button text */
            text-decoration: none; /* Remove underline */
            border-radius: 5px; /* Rounded corners */
            transition: background-color 0.3s ease; /* Smooth transition for hover effect */
        }
        #back:hover {
            background-color: #0056b3; /* Darker blue color on hover */
        }
        
    </style>
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

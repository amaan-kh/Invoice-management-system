<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>All Current Users</title>
	<style>/* Resetting default margin and padding for all elements */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Body styles */
body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: #f8f9fa; /* Light gray background */
    padding: 20px;
}

/* Heading styles */
h1 {
    color: #343a40; /* Dark gray for headings */
    text-align: center;
    margin-bottom: 20px; /* Increased margin for better spacing */
}

h3 {
    color: #6c757d; /* Medium gray for subheadings */
    text-align: center;
    margin-bottom: 15px; /* Adjusted margin for better spacing */
}

p {
    text-align: center;
    margin-bottom: 20px;
}

/* Container styles */
.container {
    display: flex;
    justify-content: center;
    margin-top: 30px; /* Increased margin for better spacing */
}

/* User list styles */
.user-list {
    width: 45%;
    margin-left: 5%; /* Adjusted margin for better alignment */
    background-color: #fff; /* White background for user lists */
    border-radius: 10px; /* Rounded corners for better appearance */
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Shadow for depth */
    padding: 20px; /* Increased padding for better spacing */
}

/* List styles */
ul {
    list-style: none;
    padding-left: 0;
}

/* List item styles */
.user-list li {
    margin-bottom: 15px; /* Increased margin for better spacing */
}

/* Back button styles */
.back-button {
    text-align: center;
    margin-top: 30px; /* Increased margin for better spacing */
}

#back {
    display: inline-block;
    padding: 10px 20px;
    background-color: #007bff;
    color: #fff;
    text-decoration: none;
    border: 2px solid transparent;
    border-radius: 5px;
    transition: background-color 0.3s ease; /* Smooth transition */
}

#back:hover {
    background-color: #0056b3; /* Darker blue on hover */
}


    </style>
</head>
<body>

	<h1>All current Users available on platform</h1>
	<!-- <p> available on platform</p> -->

	<div class="container">
	<div class="user-list">
	<h3> Admin Users </h3>
	<ul>
		@foreach ($admin_users as $user) 
		<li>
			<p>{{ $user->name }}</p>
		</li>
		@endforeach
	</ul>
	</div>

	<div class="user-list">
	<h3> Not Admin Users</h3>
	<ul>
		@foreach($non_admin_users as $user)
		<li>
			<p>{{ $user->name }}</p>
		</li>
		@endforeach
	</ul>	
	</div>	
	</div>
	<br>
	<div class="back-button">
			<a href="{{ route('admin.home') }}" id="back">BACK</a>

	</div>

</body>
</html>
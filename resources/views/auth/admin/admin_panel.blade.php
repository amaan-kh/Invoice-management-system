<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>admin panel</title>
	<style type="text/css">
		/* Resetting default margin and padding for all elements */
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

/* Container for the admin panel */
.crud-links {
    display: flex;
    justify-content: space-around;
    margin-top: 30px; /* Increased margin for better spacing */
}

/* Styles for each column */
.column {
    flex: 1;
    background-color: #fff; /* White background for each column */
    border-radius: 10px; /* Rounded corners for better appearance */
    padding: 20px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Shadow for depth */
    transition: transform 0.3s ease; /* Smooth transition */
}

.column:hover {
    transform: translateY(-5px); /* Move up on hover for interaction */
}

/* Heading styles */
h1 {
    color: #343a40; /* Dark gray for headings */
    text-align: center;
    margin-bottom: 20px; /* Increased margin for better spacing */
}

h3 {
    color: #6c757d; /* Medium gray for subheadings */
    margin-bottom: 15px; /* Adjusted margin for better spacing */
}

/* List styles */
ul {
    list-style: none;
    padding-left: 0;
}

/* Link styles */
a {
    text-decoration: none;
    color: #007bff; /* Blue for links */
    transition: color 0.3s ease; /* Smooth transition */
}

a:hover {
    color: #0056b3; /* Darker blue on hover */
}

/* Logout button styles */
button[type="submit"] {
    background-color: #dc3545; /* Red background for logout button */
    color: #fff; /* White text color */
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    margin-top: 30px; /* Increased margin for better spacing */
    transition: background-color 0.3s ease; /* Smooth transition */
}

button[type="submit"]:hover {
    background-color: #c82333; /* Darker red on hover */
}

</style>
</head>
<body>
	<h1>admin dashboard</h1>
	<div class="crud-links">
		<div class="column">
			<h3>User Actions</h3>
			<ul>
				<li><a href="{{ route('user.index') }}">View Users</a></li>
				<li><a href="{{ route('user.create') }}">Create User</a></li>
				<li><a href="{{ route('user.delete') }}">Delete User(under development)</a></li>
				<!-- Add links for updating and deleting users if needed -->
			</ul>
		</div>
		<div class="column">
			<h3>Invoice Actions</h3>
			<ul>
				<li><a href="{{ route('invoice.index') }}">View Invoices</a></li>
				<li><a href="{{ route('invoice.create') }}">Create Invoice</a></li>
				<!-- Add links for updating and deleting invoices if needed -->
			</ul>
		</div>
		<div class="column">
			<h3>Allocate Invoices</h3>
			<ul>
				<li><a href="{{ route('allocatIndex') }}">Allocate Invoices</a></li>
			</ul>
		</div>
	</div>
	<form method="POST" action="{{ route('logout') }}">
		@csrf
		<button type="submit">Logout</button>
	</form>

</body>
</html>
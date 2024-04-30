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
	text-align: center;
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
	transform: translateY(-1px); /* Move up on hover for interaction */
}

/* Heading styles */
h1 {
	color: #343a40; /* Dark gray for headings */
	text-align: center;
	margin-bottom: 20px; /* Increased margin for better spacing */
}

h3 {
	color: #053680; /* Medium gray for subheadings */
	margin-bottom: 15px; /* Adjusted margin for better spacing */
}

/* List styles */
ul {
	list-style: none;
	padding-left: 0;
}

li {
	border: 1px solid #ccc; /* Border around each list item */
	border-radius: 5px; /* Rounded corners for the border */
	margin-bottom: 10px; /* Space between list items */
	padding: 10px; /* Padding inside each list item */
	transition: box-shadow 0.3s; /* Smooth transition for box-shadow */
}

li:hover {
	box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); /* Glow effect on hover */
	background-color: #a9e3f5;
}

/* Link styles */
a {
	text-decoration: none;
	color: darkcyan;  /* Blue for links #007bff; */
	transition: color 0.3s ease; /* Smooth transition */
}
li a {
	text-decoration: none; /* Remove underline from links */
	color: #333; /* Link color */
	font-weight: bold; /* Make the font heavier */
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
	<h1>Admin Dashboard</h1>
	<div class="crud-links">
		<div class="column">
			<h3>User Actions</h3>
			<ul>
				<li><a href="{{ route('user.index') }}">View Users</a></li>
				<li><a href="{{ route('user.create') }}">Create User</a></li>
				<li><a href="{{ route('user.delete') }}">Delete User</a></li>
				<!-- Add links for updating and deleting users if needed -->
			</ul>
		</div>
		<div class="column">
			<h3>Invoice Actions</h3>
			<ul>
				<li><a href="{{ route('invoice.index') }}">View Invoices</a></li>
				<li><a href="{{ route('invoice.create') }}">Create Invoice</a></li>
				<li><a href="{{ route('invoice.delete') }}">Delete Invoice</a></li>
				<!-- Add links for updating and deleting invoices if needed -->
			</ul>
		</div>
		<div class="column">
			<h3>Allocate Invoices</h3>
			<ul>
				<li><a href="{{ route('allocatIndex') }}">Allocate Invoices</a></li>
				<li><a href="{{ route('allocatViews') }}">View Allocations</a></li>
			</ul>
		</div>
	</div>
	<form method="POST" action="{{ route('logout') }}">
		@csrf
		<button type="submit">Logout</button>
	</form>

</body>
</html>
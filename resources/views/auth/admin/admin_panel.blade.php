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
    font-family: Arial, sans-serif;
    background-color: #f0f0f0;
    padding: 20px;
}

/* Container for the admin panel */
.crud-links {
    display: flex;
    justify-content: space-around;
    margin-top: 20px;
}

/* Styles for each column */
.column {
    flex: 1;
    background-color: #fff;
    border-radius: 5px;
    padding: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

/* Heading styles */
h1, h3 {
    color: #333;
    margin-bottom: 10px;
}

/* List styles */
ul {
    list-style: none;
}

/* Link styles */
a {
    text-decoration: none;
    color: #007bff;
}

a:hover {
    color: #0056b3;
}

/* Logout button styles */
button[type="submit"] {
    background-color: #dc3545;
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    margin-top: 20px;
}

button[type="submit"]:hover {
    background-color: #c82333;
}

	</style>
</head>
<body>
	<h1>admin dashboard</h1>
	<p>admin services</p>
	<div class="crud-links">
		<div class="column">
			<h3>User Actions</h3>
			<ul>
				<li><a href="{{ route('user.index') }}">View Users</a></li>
				<li><a href="{{ route('user.create') }}">Create User</a></li>
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
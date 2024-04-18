<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>admin panel</title>
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
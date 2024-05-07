<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ADMIN PANEL</title>
	<link rel="stylesheet" href="{{ asset('css/adminpanel.css')}}">
	 
</head>
<body>
	<h1>Admin Dashboard</h1>
	<div class="crud-links">
		<div class="column">
			<h3>User Actions</h3>
			<ul>
				<li><a href="{{ route('user.index') }}">Users Actions</a></li>
				<li><a href="{{ route('user.create') }}">Create User</a></li>
				<!-- <li><a href="{{ route('user.delete') }}">Delete User</a></li> -->
			</ul>
		</div>
		<div class="column">
			<h3>Invoice Actions</h3>
			<ul>
				<li><a href="{{ route('invoice.index') }}">Manage Invoice</a></li>
				<li><a href="{{ route('invoice.create') }}">Create Invoice</a></li>
				<!-- <li><a href="{{ route('invoice.delete') }}">Delete Invoice</a></li> -->
				<!-- <li><a href="{{ route('invoice.update') }}">Update Invoice</a></li> -->
			</ul>
		</div>
		<div class="column">
			<h3>Allocate Invoices</h3>
			<ul >
				<li><a href="{{ route('allocatIndex') }}">Allocate Invoices</a></li>
				<li><a href="{{ route('allocatViews') }}">View Allocations</a></li>
				<li><a href="{{ route('revokeAllocation') }}">Revoke Access</a></li>
			</ul>
		</div>
	</div>
	<form method="POST" action="{{ route('logout') }}">
		@csrf
		<button type="submit">Logout</button>
	</form>

</body>
</html>
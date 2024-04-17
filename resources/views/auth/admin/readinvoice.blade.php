<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>All Invoices</title>
</head>
<body>

	<h1>All issued invoices</h1>
	<p> available on platform</p>

	<div class="invoice-list">
	<ul>
		@foreach ($invoices as $invoice) 
		<li>
			<p>title: {{ $invoice->title }}</p>
			<p>description: {{ $invoice->description }}</p>
			<br>

		</li>
		@endforeach
	</ul>
	</div>

	<a href="{{ route('admin.home') }}">BACK</a>

</body>
</html>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>User invoice account</title>
</head>
<body>

	<h1>User invoice account </h1>

	@if($invoices->isNotEmpty())
    <ul>
        @foreach($invoices as $invoice)
            <li>{{ $invoice->title }} - {{ $invoice->description }}</li>
        @endforeach
    </ul>
@else
    <p>No invoices found.</p>
@endif

	<a href="{{ route('index') }}">LOGOUT</a>

</body>
</html>
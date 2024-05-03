<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SHARED INVOICES</title>
    <link rel="stylesheet" href="{{ asset('css/readallocations.css') }}">
</head>
<body>
    <h1>All Shared Invoices</h1>
    <div class="container">
        <div class="invoice-list">
            <div class="user-list">
                <ol>
                    @foreach($dataArray as $key => $values)
                    <li class="invoice-item">
                        <div class="list-items"><div><b>User:</b> {{ $key }}</div>     
                        <div><b> &nbsp Invoice:</b>
                            @foreach($values as $value)
                            <span>{{ $value }} &nbsp</span>
                            @endforeach
                        </div>
                    </div>
                </li>
                @endforeach
            </ol>   
        </div>          
    </div>
    <a href="{{ route('admin.home') }}" class="back-link">Back to Panel</a>
</div>
</body>
</html>

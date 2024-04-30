
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
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
        .invoice-item {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 5px;
            margin-bottom: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }
        .invoice-item p {
            margin: 5px 0;
        }
        .back-link {
            display: block;
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>

<div class="container">

    <h1>All Invoice Allocations</h1>

    <div class="invoice-list">

    <div class="user-list">
        
        <ul>
            @foreach($dataArray as $data)
                <li>
                    <p>{{ \Log::info(json_encode($data)) }}</p>
                </li>
            @endforeach
        </ul>   
    </div>          
    </div>

    <a href="{{ route('admin.home') }}" class="back-link">BACK</a>

</div>

</body>
</html>

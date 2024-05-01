<!-- 
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
                    @foreach($dataArray as $key => $values)
                    <p>{{ $key }}:</p>
                    <ul>
                        @foreach($values as $value)
                        <li>{{ $value }}</li>
                        @endforeach
                    </ul>
                    @endforeach
                </ul>   
            </div>          
        </div>

        <a href="{{ route('admin.home') }}" class="back-link">BACK</a>

    </div>

</body>
</html>
 -->

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
            color: #333; /* Dark text color for better readability */
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff; /* White background for the container */
            border-radius: 10px; /* Rounded corners */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); /* Soft shadow effect */
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #181947; /* Blue color for the heading */
        }
        .invoice-item {
            background-color: #f1f1f1; /* Light gray background */
            padding: 20px;
            border-radius: 5px;
            margin-bottom: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3); /* Lighter shadow */
        }
        .invoice-item p {
            margin: 5px 0;
        }
        .invoice-list {
            list-style-type: none; /* Remove bullet points */
            padding: 0;
        }
        .user-list {
            margin-bottom: 30px; /* Add some space between user lists */
        }
        .back-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #007bff; /* Blue color for the link */
            text-decoration: none; /* Remove underline */
        }
        .back-link:hover {
            text-decoration: underline; /* Underline on hover */
        }
    </style>
</head>
<body>
<h1>All Shared Invoices</h1>
    <div class="container">

        

        <div class="invoice-list">

            <div class="user-list">
                
                <ul>
                    @foreach($dataArray as $key => $values)
                    <li class="invoice-item">
                        <p>User: {{ $key }} -</p>
                        <ul>
                            @foreach($values as $value)
                            <li>Invoice Number: {{ $value }}</li>
                            @endforeach
                        </ul>
                    </li>
                    @endforeach
                </ul>   
            </div>          
        </div>

        <a href="{{ route('admin.home') }}" class="back-link">Back to Panel</a>

    </div>

</body>
</html>

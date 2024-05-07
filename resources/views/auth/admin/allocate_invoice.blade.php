<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INVOICE SHARING</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/allocateinvoice.css')}}">
</head>
<body>
    <h1>Invoice Sharing</h1>
    <div class="container">
        <div class="data">
            <form action="{{ route('allocate') }}" method="POST">
                @csrf
                <div class="userdata">
                 <label for="name">Username<span class="required">*</span>:</label><br>
                 <select id="dropdown-select-name" onchange="updateInput1()" required>
                    <option disabled selected>Select a username</option>
                    @foreach ($users as $user)
                    <option value="{{ $user->name }}">{{ $user->name }}</option>
                    @endforeach
                </select>
                <input type="hidden" id="selected-value-name" name="name" required>
                <br><br>
                
                <label for="invoice_number">Invoice Number<span class="required">*</span>:{{$invoice->invoice_number}}</label><br>

                <input type="hidden" id="selected-value-number" name="invoice_number" value="{{$invoice->invoice_number}}"required>
                <!-- <input type="number" id="invoice_number" name="invoice_number" required> -->
                <br>
                <span>@if(isset($err_message))
                    <div class="alert alert-danger">
                        {{ $err_message }}
                    </div>
                    @endif
                </span>
                <br>    
                <button type="submit">Share </button>
                </div>
            </form>
        </div>
        <br>
        
<br>
<br>
  
    <a href="{{ route('invoice.index') }}" id="back">Back to panel</a>

    </div>

    


<script>
    // Function to update the hidden input field with the selected value
    function updateInput1() {
        var selectedValue = document.getElementById('dropdown-select-name').value;
        document.getElementById('selected-value-name').value = selectedValue;
    }
    function updateInput2() {
        var selectedValue2 = document.getElementById('dropdown-select-number').value;
        document.getElementById('selected-value-number').value = selectedValue2;
    }
</script>
</body>
</html>

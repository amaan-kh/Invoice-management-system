@extends('layouts.adminlayout')

@section('title')
INVOICE SHARING
@endsection

@section('style')
<link rel="stylesheet" type="text/css" href="{{ asset('css/allocateinvoice.css')}}">
@endsection

@section('maincontent')
<h4>Invoice Sharing</h4>
<div class="container">
    <div class="data">
        <div id="msg"></div>
        
        <form id="myForm" action="{{ route('allocate') }}" method="POST">
            @csrf
            <div class="userdata">
                <br>
                <label for="invoice_number">Invoice Number<span class="required">*</span>:{{$invoice->invoice_number}}</label><br>
                <input type="hidden" name="invoice_number" value="{{$invoice->invoice_number}}" required>
                
                <br>
                <label for="name">Username<span class="required">*</span>:</label><br>
                <select id="dropdown-select-name" name="name" required>
                    <option disabled selected>Select a username</option>
                    @foreach ($users as $user)
                    <option value="{{ $user->name }}">{{ $user->name }}</option>
                    @endforeach
                </select>
                
                
                <br><br>
                <button type="submit">Share </button>
            </div>
        </form>
    </div>
    <br>
</div>
<a href="{{ route('invoice.index') }}" id="back">Back to panel</a>
@endsection

@section('scripts')
<script type="text/javascript">
 $(document).ready(function() {
    let msg = document.getElementById("msg");
    $("#myForm").submit(function(event){
        event.preventDefault();
            
        if ($("#dropdown-select-name").val() == null) {
            $("#msg").text("Please select a username.");
            return false;
        }
       
        formData = $(this).serialize();

        $.ajax({
            url: "{{ route('allocate')}}",
            method: "POST",
            data: formData,
            success: function(response) {
                console.log(response.err_message);
                $("#msg").text(response.err_message);
                $("html, body").animate({ scrollTop: 0 }, "slow");

            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            },  

        });

    });
});
</script>

@endsection


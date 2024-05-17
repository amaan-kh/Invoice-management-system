@extends('layouts.adminlayout')

@section('title')
Revoke Access
@endsection

@section('style')
<link rel="stylesheet" type="text/css" href="{{ asset('css/allocateinvoice.css')}}">

@endsection

@section('maincontent')
<h4>Revoking Access</h4>
<div class="container">
    <div class="data">
        <form id="myForm">
            @csrf
            <div class="userdata">
               <label for="dropdown-select-name">Username<span class="required">*</span>:</label><br>
               <select id="dropdown-select-name"  name = "name" required autocomplete="off">
                <option disabled selected>Select a username</option>
                @foreach ($users as $user)
                <option  value="{{ $user->name }}">{{ $user->name }}</option>
                @endforeach
               </select>
            <br><br>

            <label for="dropdown-select-number" >Invoice Number<span class="required">*</span>:</label><br>
            <select id="dropdown-select-number" name="invoice_number" required  autocomplete="off">
                <option disabled selected >Select an invoice number</option>
                @foreach ($invoices as $invoice)
                <option  value="{{ $invoice->invoice_number }}">{{ $invoice->invoice_number }}</option>
                @endforeach
            </select>
            <br>
            
            
            <div id="msg" class="alert alert-danger">
            </div>
     
            <br>    
            <button type="submit" id="revoke-button">Revoke</button>
        </div>
    </form>
</div>
</div>
<a href="{{ route('admin.home') }}" id="back">Back to panel</a>
@endsection

@section('scripts')
<script type="text/javascript">
    $(document).ready(function(){

        $("#myForm").submit(function(event){
            event.preventDefault();

            let formData = $(this).serialize();


            $.ajax({
                url: "{{ route('deallocate') }}",
                method: "POST",
                
                data: formData,
                success: function(response) {
                $("#msg").text(response.err_message);
                console.log(response.err_message);
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }

            });

        });

    }); 
</script>
@endsection
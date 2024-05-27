@extends('layouts.adminlayout')

@section('title')
	UPDATE USER
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('css/createuser.css') }}">
@endsection

@section('maincontent')
    <h3 id="heading">Update User</h3>
    <div class="create-user-container">
        @if(isset($error_message))
       <div class="alert alert-danger">
        {{ $error_message }}
    </div>
    @endif
    <div id="msg"> </div>
    <br>      
        <form id="upUForm" >
            @csrf <!-- Laravel CSRF protection token -->
            <div class="form-group">
                <label for="fullname">Full Name<span class="required">*</span>:</label>
                <input type="text" id="fullname" name="fullname" value="{{ $user->fullname}}" required>
            </div>
            <br>
            <div class="form-group">
                <label for="username">Username<span class="required">*</span>:{{$user->name}}</label>
                <input hidden type="text" id="username" name="username" value="{{$user->name}}" required>
            </div>
            <br>
           
            <div class="form-group">
                <label for="phone">Phone Number:</label>
                <input type="tel" id="phone" name="phone" pattern="[0-9]{10}" title="Phone number must be 10 digit number" value="{{$user->phone}}">
            </div>
            <br>
            <div class="form-group">
                <label for="address">Address:</label>
                <textarea id="address" name="address" >{{$user->address}}</textarea>
            </div>
            <br>
            <div class="form-group">
               <input type="hidden" name="is_admin" value="0"> <!-- Hidden input with value 0 -->
               <label for="is_admin">Is Admin:</label>
               <input type="checkbox" id="is_admin" name="is_admin" value="1"><br><br>
           </div>    
           <button type="submit">Update </button>
       </form>
       
</div>
<a id="backbtn" href="{{ route('user.index') }}">Back to panel</a>

@endsection

@section('scripts')
<script>

    $(document).ready(function() {
        
        // Select the message element
        var msg = document.getElementById("msg");
        setTimeout(function() {
        msg.style.display = "none";
        }, 5000); 
        

        $("#upUForm").submit(function(event){
            event.preventDefault();
            let formData = $(this).serialize();
            //console.log(data);
            $.ajax({
                url: "{{ route('updateUser') }}",
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
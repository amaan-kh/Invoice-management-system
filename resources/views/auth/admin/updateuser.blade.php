@extends('layouts.adminlayout')

@section('title')
	UPDATE USER
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('css/createuser.css') }}">
@endsection

@section('maincontent')
    <h2 id="heading">Update User</h2>
    <div class="create-user-container">
        @if(isset($error_message))
       <div class="alert alert-danger">
        {{ $error_message }}
    </div>
    @endif
    <br>
        
        <form id="upUForm" action=" {{ route('updateUser') }}" method="POST">
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
<a id="backbtn" href="{{ route('admin.home') }}">Back to panel</a>

@endsection
@extends('layouts.adminlayout')

@section('title')
	NEW USER
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('css/createuser.css') }}">
@endsection

@section('maincontent')
    <h4 id="heading">Create New User</h4>
    <div class="create-user-container">
        @if(isset($error_message))
        <div class="alert alert-danger">
        {{ $error_message }}
        </div>
        @endif
        <br>
        
        <form action=" {{ route('user.create') }}" method="POST">
            @csrf <!-- Laravel CSRF protection token -->
            <div id="fsc">
                <div class="subcontainer">
                    <div class="form-group">
                    <label for="fullname">Full Name<span class="required">*</span>:</label>
                    <input type="text" id="fullname" name="fullname" required>
                    </div>
                <br>
                    <div class="form-group">
                    <label for="username">Username<span class="required">*</span>:</label>
                    <input type="text" id="username" name="username" required>
                    </div>
                <br>
                    <div class="form-group">
                    <label for="password">Password<span class="required">*</span>:</label>
                    <input type="password" id="password" name="password"  required>
                    </div>
                <br>
                </div>
            
            <div class="subcontainer"> 
                <div class="form-group">
                <label for="phone">Phone Number:</label>
                <input type="tel" id="phone" name="phone" pattern="[0-9]{10}" title="Phone number must be 10 digit number">
                </div>
            <br>
                <div class="form-group">
                <label for="address">Address:</label>
                <textarea id="address" name="address"></textarea>
                </div>
            <br>
                <div class="form-group" id="chek-box">
                <input type="hidden" name="is_admin" value="0"> <!-- Hidden input with value 0 -->
                <label for="is_admin">Is Admin:</label> &nbsp &nbsp &nbsp
                <input type="checkbox" id="is_admin" name="is_admin" value="1"><br><br>
                </div>    
           </div>
            </div>
           <button id="createUserBtn" type="submit">Create </button>
       </form>
      

<a id="backbtn" href="{{ route('user.index') }}">Back to panel</a>

@endsection
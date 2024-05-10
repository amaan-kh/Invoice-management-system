@extends('layouts.adminlayout')

@section('title')
	NEW USER
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('css/createuser.css') }}">
@endsection

@section('maincontent')
    <h2>Create New User</h2>
    <div class="create-user-container">
        
        <form action=" {{ route('user.create') }}" method="POST">
            @csrf <!-- Laravel CSRF protection token -->
            <div class="form-group">
                <label for="username">Username<span class="required">*</span>:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <br>
            <div class="form-group">
                <label for="password">Password<span class="required">*</span>:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <br>
            <div class="form-group">
               <input type="hidden" name="is_admin" value="0"> <!-- Hidden input with value 0 -->
               <label for="is_admin">Is Admin:</label>
               <input type="checkbox" id="is_admin" name="is_admin" value="1"><br><br>

           </div>
     
           <button type="submit">Create </button>
       </form>
       @if(isset($error_message))
       <div class="alert alert-danger">
        {{ $error_message }}
    </div>
    @endif
    <br>
</div>
<a id="backbtn" href="{{ route('admin.home') }}">Back to panel</a>

@endsection
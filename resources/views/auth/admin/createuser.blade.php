<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>NEW USER</title>
    <link rel="stylesheet" href="{{ asset('css/createuser.css') }}">
</head>
<body>
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
     
           <button type="submit">Create New User</button>
       </form>
       @if(isset($error_message))
       <div class="alert alert-danger">
        {{ $error_message }}
    </div>
    @endif
    <br>
</div>
<a href="{{ route('admin.home') }}">Back to panel</a>


</body>
</html>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>All Current Users</title>
	<style>
        .container {
            display: flex;
            justify-content: space-between;
        }
        .user-list {
            /*border: 1px solid #ccc;
            padding: 10px;
*/            width: 45%;
        	  margin-left: 20%;
        }
        .user-list h2 {
            margin-bottom: 10px;
        }
        .user-list ul {
        }
        .user-list li {
            margin-bottom: 5px;
        }
        .back-button {
        	text-align: center;
        }
        #back {
        	border: 2px solid black;
        }
    </style>
</head>
<body>

	<h1>All current Users</h1>
	<p> available on platform</p>

	<div class="container">
	<div class="user-list">
	<h3> Admin Users </h3>
	<ul>
		@foreach ($admin_users as $user) 
		<li>
			<p>{{ $user->name }}</p>
		</li>
		@endforeach
	</ul>
	</div>

	<div class="user-list">
	<h3> Not Admin Users</h3>
	<ul>
		@foreach($non_admin_users as $user)
		<li>
			<p>{{ $user->name }}</p>
		</li>
		@endforeach
	</ul>	
	</div>	
	</div>
	<br>
	<div class="back-button">
			<a href="{{ route('admin.home') }}" id="back">BACK</a>

	</div>

</body>
</html>
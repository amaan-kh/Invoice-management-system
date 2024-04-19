<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>All Current Users</title>
	<style>
      /* /* .container {
            display: flex;
            justify-content: space-between;
        }
        .user-list {
            /*border: 1px solid #ccc;
            padding: 10px;
            width: 45%;
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
        }*/
*/
        /* Resetting default margin and padding for all elements */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Body styles */
body {
    font-family: Arial, sans-serif;
    background-color: #f0f0f0;
    padding: 20px;
}

/* Heading styles */
h1, h3 {
    color: #333;
    text-align: center;
    margin-bottom: 10px;
}

p {
    text-align: center;
    margin-bottom: 20px;
}

/* Container styles */
.container {
    display: flex;
    justify-content: space-between;
    margin-top: 20px;
}

/* User list styles */
.user-list {
    width: 45%;
    margin-left: 20%;
}

/* List styles */
ul {
    list-style: none;
    margin-top: 0;
    padding-left: 0;
}

/* List item styles */
.user-list li {
    margin-bottom: 10px;
}

/* Back button styles */
.back-button {
    text-align: center;
    margin-top: 20px;
}

#back {
    display: inline-block;
    padding: 10px 20px;
    background-color: #007bff;
    color: #fff;
    text-decoration: none;
    border: 2px solid transparent;
    border-radius: 5px;
}

#back:hover {
    background-color: #0056b3;
}

    </style>
</head>
<body>

	<h1>All current Users available on platform</h1>
	<!-- <p> available on platform</p> -->

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
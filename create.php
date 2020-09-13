<?php
session_start();
ob_start();
?>

<html>
<head>
<title>Admin Panel - Create</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type ="text/css" href="styles/global.css" />
<link href="dist/css/bootstrap.css" rel="stylesheet">

<!-- Insert this line above script imports  -->
<script>if (typeof module === 'object') {window.module = module; module = undefined;}</script>

<!-- normal script imports etc  -->
<script src="scripts/jquery-1.12.3.min.js"></script>
<script src="scripts/jquery.backstretch.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<!-- Insert this line after script imports -->
<script>if (window.module) module = window.module;</script>
</head>
<body>

	<div id = "login1">
		<form class = "form-inline" action="verf.php" method="post">
			<div class="logo"></div>
			<div class="login-block">
			    <h1>Setup Server</h1>

				<div class="panel panel-info">
				    <div class="panel-heading">Database Settings</div>
				    <div class="panel-body">
					<input type="text" value="" placeholder="DB User" id="username1" name="user"/>
					<input type="password" value="" placeholder="DB Pass" id="password1" name="pass"/>
					<input type="text" value="" placeholder="DB Host" id="host" name="host"/>
					<input type="text" value="" placeholder="DB Name" id="name" name="name"/>
					<input type="text" value="" placeholder="DB Port (Leave blank for 3306)" id="port" name="port"/>
				    </div>
				</div>

				<div class="panel panel-info">
				    <div class="panel-heading">General Settings</div>
				    <div class="panel-body">
					<input type="text" value="" placeholder="Server ip" id="ServerIp" name="ServerIp"/>
					<input type="text" value="" placeholder="Deadmatter patch" id="DM_Dir" name="DM_Dir"/>
				    </div>
				</div>

				<button>Submit</button>
			</div>
		</form>
	</div>
</body>

</html>

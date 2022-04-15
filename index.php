<!DOCTYPE html>
<html>
<head>
	<title>LMS</title>
	<meta charset="utf-8" name="viewport" content="width=device-width,intial-scale=1">
	<link rel="stylesheet" type="text/css" href="bootstrap-4.4.1/css/bootstrap.min.css">
  	<script type="text/javascript" src="bootstrap-4.4.1/js/juqery_latest.js"></script>
  	<script type="text/javascript" src="bootstrap-4.4.1/js/bootstrap.min.js"></script>
  	<style type="text/css">
  		#side_bar{
  			background-color: yellow;
  			padding: 50px;
  			width: 300px;
  			height: 450px;
  		}
  	</style>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-success">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="index.php">St. Joseph's High School Library</a>
			</div>
			<ul class="nav navbar-nav navbar-right">
				<li class="nav-item">
					<a class="nav-link" href="admin/index.php">Admin Login</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="index.php">User Login</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="signup.php">Register</a>
				</li>
			</ul>
		</div>
	</nav><br>
	<span><marquee>When I Got My Library Card, Thats When My Life Began - Rita Mae Brown</marquee></span><br><br>
	<div class="row">
		<div class="col-md-4" id="side_bar">
			<h5>Library Schedule</h5>
			<ul>
				<li>Open at: 8:00 AM</li>
				<li>Close at: 10:00 PM</li>
				<li>(Friday off)</li>
			</ul>
			<h5>Our Services ?</h5>
			<ul>
				<li>Peacefull Environment</li>
				<li>Free Wi-fi</li>
				<li>News Papers(Bangla & English)</li>
				<li>Discussion Room</li>
				<li>Mineral Water</li>
				<li>All of the furniture</li>
				<li>AC Service</li>
			</ul>
		</div>		
		<div class="col-md-8" id="main_content">
			<center><h3>User Login Form</h3></center>
			<form action="" method="post">
				<div class="form-group">
					<label for="name">Email ID:</label>
					<input type="text" name="email" class="form-control" required>
				</div>
				<div class="form-group">
					<label for="name">Password:</label>
					<input type="password" name="password" class="form-control" required>
				</div>
				<button type="submit" name="login" class="btn btn-primary">Login</button>
			</form>

			<?php
				session_start();
				if(isset($_POST['login'])){
					$connection = mysqli_connect("localhost","root","");
					$db = mysqli_select_db($connection,"lms");
					$query = "select * from users where email = '$_POST[email]'";
					$query_run = mysqli_query($connection,$query);
					while($row = mysqli_fetch_assoc($query_run)){
						if($row['email'] == $_POST['email']){
							if($row['password'] == $_POST['password']){
								$_SESSION['name'] = $row['name'];
								$_SESSION['email'] = $row['email'];
								$_SESSION['id'] = $row['id'];
								header("Location:user_dashboard.php");
							}
							else{
								?>
								<br><br><center><span class="alert-danger">Wrong Password</span></center>
								<?php
							}
						}
					}
				}
			?>
	</div>
	</div>
</body>
</html>
	<!DOCTYPE html>
	<html>
	<head>
		<title>Register</title>
		<link rel="stylesheet" type="text/css" href="/assets/css/bootstrap.css">
		<style type="text/css">
		.errors{
			color:red;
		}
		</style>
	</head>
	<body>
		<nav class="navbar navbar-default">	
			<div class="container">	
					<a class="navbar-brand" href="#">User Dashboard</a>
				<div class="navbar-collapse collapse">
					<ul class="nav navbar-nav">
						<li class="active"><a href="#">Home</li>
					</ul>
					<a class="pull-right" href="/signin/index">Sigin</a>
				</div>
			</div>
			
		</nav>
	<div class="container">
		<div class="errors">
		<?php echo validation_errors(); ?>	
		</div>
	<h1>Register</h1>
		<form class="col-lg-6" method="post" action="/register/create">
		  <div class="form-group">
		    <label for="email">Email address:</label>
		    <input type="email" class="form-control" value="<?php echo set_value('email'); ?>" name="email" placeholder="Enter email">
		  </div>
		  <div class="form-group">
		    <label for="first_name">First Name:</label>
		    <input type="text" class="form-control" name="first_name" value="<?php echo set_value('first_name'); ?>" placeholder="Enter First Name">
		  </div>
		   <div class="form-group">
		    <label for="last_name">Last Name:</label>
		    <input type="text" class="form-control" name="last_name" value="<?php echo set_value('last_name'); ?>" placeholder="Enter Last Name">
		  </div>
		  <div class="form-group">
		    <label for="password">Password:</label>
		    <input type="password" class="form-control" name="password" value="<?php echo set_value('password'); ?>" placeholder="Password">
		  </div>
		  <div class="form-group">
		    <label for="password">Confirm Password:</label>
		    <input type="password" class="form-control" name="confirm_password" value="<?php echo set_value('confirm_password'); ?>" placeholder="Confirm Password">
		  </div>
		  <button type="submit" class="pull-right" class="btn btn-default">Register</button>
		  
		</form>
		
		</div>
		<footer>
			<div class="container">
			<p><a class="pull-right" href="/signin/index">Already have an account? Login..</a></p>
		</div>
		</footer>
	</body>
	</html>
<!DOCTYPE html>
<html>
<head>
	<title>Signin</title>
	</style>
	<link rel="stylesheet" type="text/css" href="/assets/css/bootstrap.css">
	<style type="text/css">
	.success{
		color:green;
	}
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
				<a class="pull-right" href="#">Sigin</a>
			</div>
		</div>
		
	</nav>

<div class="container">
	<div class="errors">
		<?php echo validation_errors(); ?>	
		</div>
	<div class="success">
	<?= $this->session->flashdata("success");?>
	</div>
<h1>Signin</h1>
	<form class="col-lg-6" method="post" action="/signin/login">
	  <div class="form-group">
	    <label for="email">Email address:</label>
	    <input type="email" class="form-control" name="email" placeholder="Enter email">
	  </div>
	  <div class="form-group">
	    <label for="password">Password:</label>
	    <input type="password" class="form-control" name="password" placeholder="Password">
	  </div>
	  <button class="pull-right" type="submit" class="btn btn-default">Submit</button>
	</form>
</div>
	<footer>
		<div class="container">
		<p><a class="pull-right" href="/register/index">Dont have an account? Register..</a></p>
	</div>
	</footer>
</body>
</html>
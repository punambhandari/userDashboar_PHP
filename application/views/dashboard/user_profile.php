	<!DOCTYPE html>
	<html>
	<head>
		<title>User Profile</title>
		<link rel="stylesheet" type="text/css" href="/assets/css/bootstrap.css">
		<style type="text/css">
		.errors{
			color:red;
		}
		form{
			padding: 5px;
			margin:10px;
		}
		</style>
	</head>
	<body>
		<nav class="navbar navbar-default">	
			<div class="container">	
					<a class="navbar-brand" href="#">User Dashboard</a>
				<div class="navbar-collapse collapse">
					<ul class="nav navbar-nav">
						<li ><a href="/dashboard/index">Dashboard</a></li>
						<li class="active"><a href="">Profile</a></li>
					</ul>
					<a class="pull-right" href="/main/logout">Logoff</a>
				</div>
			</div>
			
		</nav>
	<div class="container">
		<div class="errors">
		<?php echo validation_errors(); ?>	
		</div>
	<h3>Edit Profile for : <?php echo $profile['first_name']; ?> </h3>
		<form class="panel panel-default col-lg-5" method="post" action="/dashboard/update_profile_info">
			<h4>Edit Information</h4>
			<input type="hidden" name="user_id" value="<?php echo $profile['id']; ?>">
		  <div class="form-group">
		    <label for="email">Email address:</label>
		    <input type="email" class="form-control" value="<?php echo $profile['email']; ?>" name="email" placeholder="Enter email">
		  </div>
		  <div class="form-group">
		    <label for="first_name">First Name:</label>
		    <input type="text" class="form-control" name="first_name" value="<?php echo $profile['first_name']; ?>" placeholder="Enter First Name">
		  </div>
		   <div class="form-group">
		    <label for="last_name">Last Name:</label>
		    <input type="text" class="form-control" name="last_name" value="<?php echo $profile['last_name']; ?>" placeholder="Enter Last Name">
		  </div>
		   <div class="form-group">
		    <label for="user_level">User Level:</label>
		    <select name="user_level" class="form-control">
		    	<?php if ($profile['user_level'] ==1)
		    	{ ?>
		    	<option selected value="1">Normal</option>
		    	<option value="9">Admin</option>	
		    	<?php } else { ?>
		    	<option selected value="9">Admin</option>
		    	<option value="1">Normal</option>
		    	}
		    	<? }; ?>
		    	
		    </select>
		  </div>
		 
		  <button type="submit" class="pull-right" class="btn btn-default">Save</button>
		  
		</form>
		
		<form class="panel panel-default col-lg-5" method="post" action="/dashboard/update_profile_password">
			<h4>Change Password</h4>
		  <div class="form-group">
		  	<input type="hidden" name="user_id" value="<?php echo $profile['id']; ?>">
		    <label for="password">Password:</label>
		    <input type="password" class="form-control" name="password" placeholder="Password">
		  </div>
		  <div class="form-group">
		    <label for="password">Confirm Password:</label>
		    <input type="password" class="form-control" name="confirm_password"  placeholder="Confirm Password">
		  </div>
		  <button type="submit" class="pull-right" class="btn btn-default">Update Password</button>
		  
		</form>
		</div>
	</body>
	</html>
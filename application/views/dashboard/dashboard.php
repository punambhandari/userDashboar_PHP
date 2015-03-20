<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	</style>
	<link rel="stylesheet" type="text/css" href="/assets/css/bootstrap.css">
	<script src="//code.jquery.com/jquery-2.1.3.min.js"></script>
	<script type="text/javascript">
	$(document).ready(function(){
		$(document).on('click','#btnRemove',function(event){
			
			if( !confirm('Are you sure that you want to remove this user') ) 
			{
            event.preventDefault();
			}
			else
			{
				return true;
			}
		});
	});
	</script>

</head>
<body>
<?php //include_once ($_SERVER["DOCUMENT_ROOT"]."/application/views/common/nav.php");?>

<nav class="navbar navbar-default">	
		<div class="container">	
				<a class="navbar-brand" href="#">User Dashboard</a>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li class="active"><a href="">Dashboard</a></li>
					<li ><a href="/dashboard/edit_profile">Profile</a></li>
				</ul>
				<a class="pull-right" href="/main/logout">Logout</a>
			</div>
		</div>
		
	</nav>
<div class="container">
<h6 class="pull-right"><?php if($this->session->userdata('logged_user'))
{
	$data=$this->session->userdata('logged_user');
	echo "Welcome ".$data['username'];
		if($data['user_level']==9)
			{
			echo "(your role - Admin)";	
			}

};?></h6>
<h3>Manage Users</h3>

	<table class="table table-striped ">
		<thead>
			<th>
				ID
			</th>
			<th>
				Name
			</th>
			<th>
				email
			</th>
			<th>
				created date
			</th>
			<th>
				user level
			</th>
			<?php if ($this->session->userdata('logged_user')['user_level']==9)
			{
			echo "<th>
				actions
			</th>";
			} ?>
		</thead>
		<tbody>
			<?php foreach ($users as $user) {?>
			<tr>
				<td><?= $user['id']; ?></td>
				<td><a href="/dashboard/show/<?= $user['id']; ?>"><?= $user['first_name']." ".$user['last_name']; ?></a></td>
				<td><?= $user['email']; ?></td>
				<td><?= date_format(date_create($user['created_at']),'M d Y'); ?></td>
				<td><?php if($user['user_level']==9)
					{
						echo "Admin";
					}
					else
					{
						echo "normal";
					} ?></td>
				<td>
					<?php if ($this->session->userdata('logged_user')['user_level']==9)
					{?>
						<a class="btn btn-default" href="/dashboard/destroy/<?= $user['id']; ?>" id="btnRemove" role="button">Remove</a>
						<a class="btn btn-default" id="btnEdit" href="/dashboard/edit_user_profile/<?= $user['id']; ?>" role="button">Edit</a>
					<?php } ?>
					
					
				</td>
			</tr>
				<?php };?>
			
		</tbody>
  
	</table>
	
</div>
</div>
</body>
</html>
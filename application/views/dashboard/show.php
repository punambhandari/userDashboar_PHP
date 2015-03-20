<!DOCTYPE html>
<html>
<head>
	<title>User Dashboard</title>
	<link rel="stylesheet" type="text/css" href="/assets/css/bootstrap.css">
	<style type="text/css">
	.message{
		border:solid 1px silver;
		padding: 10px;
		border-radius: 5px;
		margin-bottom: 20px;
		background-color: #E5E4E2;
	}
	.comment{
		border:solid 1px silver;
		padding: 10px;
		border-radius: 5px;
		margin-left: 20px;
		background-color: #E5E4E2;
		
		margin-bottom: 40px;
		color: grey;
	}
	.align{
	margin-left: 20px;
	font-style: italic;	
	}
	</style>
</head>
<body>
	<nav class="navbar navbar-default">	
		<div class="container">	
				<a class="navbar-brand" href="#">User Dashboard</a>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li class="active"><a href="/dashboard/">Dashboard</a></li>
					<li ><a href="/dashboard/edit_profile">Profile</a></li>
				</ul>
				<a class="pull-right" href="/main/logout">Logoff</a>
			</div>
		</div>
		
	</nav>
	<div class="container">		
		<h3><?php echo $user['first_name']." ".$user['last_name'];?></h3>
		<div class="row">
			<div class="col-lg-3">
				<p>Registered at:</p>
			</div>
			<div class="col-lg-4">
				<p><?php echo $user['created_at'];?></p>
			</div>	
		</div>
		<div class="row">
			<div class="col-lg-3">
				<p>User Id:</p>
			</div>
			<div class="col-lg-4">
				<p><?php echo $user['id'];?></p>
			</div>	
		</div>
		<div class="row">
			<div class="col-lg-3">
				<p>Email address:</p>
			</div>
			<div class="col-lg-4">
				<p><?php echo $user['email'];?></p>
			</div>	
		</div>
		<div class="row">
			<div class="col-lg-3">
				<p>Description</p>
			</div>
			<div class="col-lg-4">
				<p><?php echo $user['description'];?></p>
			</div>	
		</div>
</div>
<div class="container">
	<h4>Leave a message for <?php echo $user['first_name'];?> </h4>
	
<form  method="post" action="/dashboard/create_message">
		  <div class="form-group">
		    <textarea class="form-control"  name="message" placeholder="Enter your message"></textarea>
		  </div>
		  <input type="hidden" name="to_user_id" value="<?=$user['id'];?>">
		   <button type="submit" class="pull-right" class="btn btn-default">Post</button>
</form>
</div>
<div class="container">
<?php 

	foreach ($messages as $message) { ?>
	
	<?php echo $message["message_from_user"]."   (". calculateInterval($message["message_date"]);?>)
	<div class="message">
	<?php echo $message['message'];?>
	</div>
	<?php foreach ($comments as $comment) 
	{
		if($message['message_id']===$comment['message_id'])
		{?>
			<span class="align"><?php if($comment["comment_from_user"]!=null)
			{
			echo $comment["comment_from_user"]."  (". calculateInterval($comment["comment_created"]);?>)</span>
			<div class="comment">	
			<?php echo $comment['comment'];?>
			</div>
			<?php } } }?>
			<form  method="post" action="/dashboard/create_comment">
				  <div class="form-group">
				    <textarea class="form-control"  name="comment" placeholder="Enter your comment"></textarea>
				  </div>
				  <input type="hidden" name="message_id" value="<?=$message['message_id'];?>">
				   <input type="hidden" name="to_user_id" value="<?=$user['id'];?>">
				   <button type="submit" class="pull-right" class="btn btn-default">Post</button>
			</form>
	<br>
<?php } ?>
</div>

<?php
function calculateInterval($messagePostedTime)
{
	$datetime_messagecreated = date_create($messagePostedTime);
    $datetime_now=new DateTime("now");
    $interval = date_diff($datetime_now, $datetime_messagecreated);
	$interval= $interval->format('%d days %h hours %i minutes')." Ago";
	return $interval;
}

?>

	
</body>
</html>
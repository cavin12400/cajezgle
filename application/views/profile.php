<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">

  <link rel="shortcut icon" href="<?php echo base_url().'assets/img/shortcut-icon.png'?>" />
	<title>CaJezgle User</title>

	<link rel="stylesheet" href="<?php echo base_url().'assets/css/mystyle.css'?>">
	<link rel="stylesheet" href="<?php echo base_url().'assets/css/less/bootstrap-less/css/bootstrap.css'?>">
	
	<link rel="stylesheet" href="<?php echo base_url().'assets/css/sidebar.css'?>">
	<link href="<?php echo base_url().'assets/css/font-awesome.css'?>" rel="stylesheet">
</head>
<body>
	<nav class="navbar navbar-inverse sidebar" role="navigation">
	    <div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-sidebar-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">CaJezGle User</a>
			</div>
			<div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li class="active"><a href="../profile/<?php echo $ProfileInfo->username; ?>">Profile<span style="font-size:16px;" class="pull-right fa fa-user"></span></a>
					</li>
					<li ><a href="../editProfile/<?php echo $ProfileInfo->username; ?>">Edit Profile<span style="font-size:16px;" class="pull-right   fa fa-pencil"></span></a>
					</li>
					<li ><a href="../editPassword/<?php echo $ProfileInfo->username; ?>">Change Password<span style="font-size:16px;" class="pull-right   fa fa-key"></span></a>
					</li>
					<li><a href="<?php echo base_url();?>index.php/my_controller/logout">Log out<span style="font-size:16px;" class="pull-right   fa fa-sign-out"></span></a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="main ">
		<center>
			<div class="col-md-12">
			<img class="img-circle img-responsive" width="200" height="40" id="profile" src="<?php echo base_url().'assets/img/default.jpg'?>" alt="profile"><br>
			<h2>Welcome back, <?php echo $ProfileInfo->username; ?>!</h2>
			<h4>Full Name: <?php echo $ProfileInfo->firstname; ?> <?php echo $ProfileInfo->lastname; ?></h4>
			<h4>Email: <?php echo $ProfileInfo->email; ?></h4>
			<h4>Bio: <?php echo $ProfileInfo->bio; ?></h4>
			<h4>Account Type: <?php echo $ProfileInfo->type; ?></h4>
			</div>
		</center>
	</div>

	<script src="<?php echo base_url().'assets/libs/jquery/jquery-2.2.4.js'?>"></script>
	<script src="<?php echo base_url().'assets/js/bootstrap.js'?>"></script>
	

</body>
</html>
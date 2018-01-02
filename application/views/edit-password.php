<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">

  <link rel="shortcut icon" href="<?php echo base_url().'assets/img/shortcut-icon.png'?>" />
	<title>CaJezgle User</title>

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
					<li ><a href="../profile/<?php echo $UserInfo->username; ?>">Profile<span style="font-size:16px;" class="pull-right fa fa-user"></span></a>
					</li>
					<li ><a href="../editProfile/<?php echo $UserInfo->username; ?>">Edit Profile<span style="font-size:16px;" class="pull-right   fa fa-pencil"></span></a>
					</li>
					<li class="active"><a href="../editPassword/<?php echo $UserInfo->username; ?>">Change Password<span style="font-size:16px;" class="pull-right   fa fa-key"></span></a>
					</li>
					<li><a href="<?php echo base_url();?>index.php/my_controller/logout">Log out<span style="font-size:16px;" class="pull-right   fa fa-sign-out"></span></a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="main">
		<div class="col-md-5 col-md-offset-1">
			<h1>Change Password</h1>
			<h6>Minimun length: 8 characters.</h6>
    		<form action="" method="POST">
    			
    			<div class="form-group" >
    				<label>Old Password:</label>
    				<input type="password"  class="form-control" name="password" placeholder="Old Password" required>
    			</div>
    			<div class="form-group" >
    				<label>New Password</label>
    				<input type="password" class="form-control" name="newpass" placeholder="New Password" required>
    			</div>
    			<div class="form-group" >
    				<label>Confirm Password</label>
    				<input type="password" class="form-control"  name="confpass" placeholder="Confirm Password" required>
    			</div>
    			
				<?php if(isset($_SESSION['fail-pass'])){?>
		        <div class="alert alert-danger" style="color:red;"> <?php echo $_SESSION['fail-pass']; ?></div><br>
		        <?php 
		        } ?>
		        <?php if(isset($_SESSION['succeed-pass'])){?>
		        <div class="alert alert-success" style="color:green;"> <?php echo $_SESSION['succeed-pass']; ?></div><br>
		        <?php 
		        } ?>
    			<button class="btn btn-success" name="save-pass">Update Password</button>
    		</form>
		</div>	
	</div>

	<script src="<?php echo base_url().'assets/libs/jquery/jquery-2.2.4.js'?>"></script>
	<script src="<?php echo base_url().'assets/js/bootstrap.js'?>"></script>
	

</body>
</html>
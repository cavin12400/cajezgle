<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">

  <link rel="shortcut icon" href="<?php echo base_url().'assets/img/shortcut-icon.png'?>" />
	<title>CaJezgle Admin</title>

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
				<a class="navbar-brand" href="#">CaJezGle Admin</a>
			</div>
			<div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li class="active"><a href="<?php echo base_url();?>admin_controller/admin">Dashboard<span style="font-size:16px;" class="pull-right fa fa-tachometer"></span></a>
					</li>
					
					<li><a href="<?php echo base_url();?>index.php/my_controller/logout">Log out<span style="font-size:16px;" class="pull-right   fa fa-sign-out"></span></a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="main">
		<div class="col-md-5 col-md-offset-1">
			<h1>Delete User</h1>
    		<form action="" method="POST">
    			
    			<h3>Are you sure you want to delete <?php echo $deleteinfo->username; ?>?</h3>
    			<button class="btn btn-danger" name="delete">Delete</button>

    			<a href="<?php echo base_url();?>/admin_controller/admin" class="btn btn-primary" name="saves">Cancel</a>
    		</form>
		</div>	
	</div>

	<script src="<?php echo base_url().'assets/libs/jquery/jquery-2.2.4.js'?>"></script>
	<script src="<?php echo base_url().'assets/js/bootstrap.js'?>"></script>
	

</body>
</html>
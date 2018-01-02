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
	
		<div class="col-md-10 col-md-offset-1">
			<h1>User Management</h1>
			<table class="table table-hover text-center table-responsive table-bordered">
			<thead>
				<tr>
					<th>User name</th>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Status</th>
					<th>Actions</th>
				</tr>
			</thead>
			<?php foreach ($information as $queries): ?>
				<tr>
					<td><?php echo $queries->username; ?></td>
					<td><?php echo $queries->firstname ?></td>
					<td><?php echo $queries->lastname; ?></td>
					<td><?php echo $queries->status; ?></td>
					<td>
						<a href="<?php echo base_url();?>admin_controller/edit/<?php echo $queries->username; ?>"><button class="btn btn-sm btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
						<a href="<?php echo base_url();?>admin_controller/delete/<?php echo $queries->username; ?>"><button class="btn btn-sm btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
						<a href="<?php echo base_url();?>admin_controller/deactivate/<?php echo $queries->username; ?>"><button class="btn btn-sm btn-danger"><i class="fa fa-power-off" aria-hidden="true"></i></button>
						<a href="<?php echo base_url();?>admin_controller/activate/<?php echo $queries->username; ?>"><button class="btn btn-sm btn-success"><i class="fa fa-power-off" aria-hidden="true"></i></button>
					</td>

				</tr>
			<?php endforeach;?>
			</table>
			<?php if(isset($_SESSION['success-change'])){?>
		    <div class="alert alert-success" style="color:green;"> <?php echo $_SESSION['success-change']; ?></div><br>
		    <?php 
		    } ?>
		    <?php if(isset($_SESSION['fail-change'])){?>
		    <div class="alert alert-danger" style="color:red;"> <?php echo $_SESSION['success-change']; ?></div><br>
		    <?php 
		    } ?>
		</div>
	</div>
	<script src="<?php echo base_url().'assets/libs/jquery/jquery-2.2.4.js'?>"></script>
	<script src="<?php echo base_url().'assets/js/bootstrap.js'?>"></script>
	

</body>
</html>
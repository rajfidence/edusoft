<!DOCTYPE html>
<html lang="en">
<head>
		<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="shortcut icon" href="images/favicon.png">

	<title>Change Password | R&D Medicare  </title>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,400italic,700,800' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Raleway:300,200,100' rel='stylesheet' type='text/css'>

	<!-- Bootstrap core CSS -->
	<link href="<?php echo base_url();?>/themes/cleanzone/backend/js/bootstrap/dist/css/bootstrap.css" rel="stylesheet">

	<link rel="stylesheet" href="<?php echo base_url();?>/themes/cleanzone/backend/fonts/font-awesome-4/css/font-awesome.min.css">

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	  <script src="../../assets/js/html5shiv.js"></script>
	  <script src="../../assets/js/respond.min.js"></script>
	<![endif]-->

	<!-- Custom styles for this template -->
	<link href="<?php echo base_url();?>/themes/cleanzone/backend/css/style.css" rel="stylesheet" />	
		
</head>

<body class="texture">

<div id="cl-wrapper" class="login-container">

	<div class="middle-login">
		<div class="block-flat">
			<!--<div class="header">							
				<h3 class="text-center"><img class="logo-img" src="<?php echo base_url();?>/themes/cleanzone1_3/images/logo1.png" alt="logo" width="134" height="27" style="margin-top:10px;"/></h3>
			</div>-->
			<div>
				<form class="form-horizontal" action="" method="post" parsley-validate novalidate>
					<div class="content">
                 <?php /*?>   <?php if(@$error){ ?>
                    <div class="alert alert-danger alert-white rounded">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<div class="icon"><i class="fa fa-times-circle"></i></div>
								<strong>Error!</strong> <?php echo $error; ?>
							 </div>
                        <?php } ?>
                        <?php if(@$success){ ?>
                        <div class="alert alert-success alert-white rounded">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<div class="icon"><i class="fa fa-check"></i></div>
								<strong>Success!</strong> <?php echo $success; ?>
							 </div>
                        <?php } ?><?php */?>
						<h2 class="title" style="text-align:center;">Change Password </h2><hr>
							<div class="form-group">                              
                               <div class="col-sm-12">
                               <label>New Password</label>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input id="pass1" type="password" placeholder="New Password"  autocomplete="off" required class="form-control">
                                        <!--<input id="pass1" type="password" placeholder="New Password"  autocomplete="off" required class="form-control" size="60">-->
							</div>
                            </div>	
							</div>
							<div class="form-group"> 
                            
							 <div class="col-sm-12">
                             <label>Confirm Password</label>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input name="NewPassword" parsley-equalto="#pass1" type="password"  autocomplete="off" required placeholder="Confirm Password" class="form-control">
										<!--<input name="password" placeholder="Confirm New Password" parsley-equalto="#pass1" autocomplete="off" type="password" required placeholder="Password" class="form-control" size="60">-->
									</div>
                                    </div>
							</div>
                                       
					</div>
					<div class="foot">
						<!--<button class="btn btn-default" data-dismiss="modal" type="button">Register</button>-->
						<button class="btn btn-primary" data-dismiss="modal" type="submit">Save</button><div class="text-center out-links"><font size="1px" color="#000">&copy; 2015 - 3 Cube Services</font><br><a href="mailto:info@3cubeservices.com" style="color:#000; font-weight:inherit; " >info@3cubeservices.com </a><br>&nbsp;</div>
					</div>
				</form>
			</div>
		</div>
		
	</div> 
	
</div>

<script src="<?php echo base_url();?>/themes/cleanzone/backend/js/jquery.js"></script>
  <script src="<?php echo base_url();?>/themes/cleanzone/backend/js/jquery.select2/select2.min.js" type="text/javascript"></script>
 <script src="<?php echo base_url();?>/themes/cleanzone/backend/js/jquery.parsley/parsley.js" type="text/javascript"></script>

  <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script type="text/javascript">
      $(document).ready(function(){
        //initialize the javascript

   });
    </script>
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="<?php echo base_url();?>/themes/cleanzone/backend/js/bootstrap/dist/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>/themes/cleanzone/backend/js/jquery.flot/jquery.flot.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>/themes/cleanzone/backend/js/jquery.flot/jquery.flot.pie.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>/themes/cleanzone/backend/js/jquery.flot/jquery.flot.resize.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>/themes/cleanzone/backend/js/jquery.flot/jquery.flot.labels.js"></script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
		<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="shortcut icon" href="images/favicon.png">

	<title>Verify Email | R&D Medicare </title>
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
				<form class="form-horizontal" action="" method="post">
					<div class="content">
                    <?php if(@$error){ ?>
                    <div class="alert alert-danger alert-white rounded" style="margin-left:-7px; margin-right:-7px;">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<div class="icon" ><i class="fa fa-times-circle" ></i></div>
								<?php echo $error; ?>
							 </div>
                        <?php } ?>
                        <?php if(@$success){ ?>
                        <div class="alert alert-success alert-white rounded" style="margin-left:-7px; margin-right:-7px;">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<div class="icon"  ><i class="fa fa-check" ></i></div>
								 <?php echo $success; ?>
							 </div>
                        <?php } ?>
						<h2 class="title" style="text-align:center;">Forgot Password?</h2><hr>
							<div class="form-group">
								<div class="col-sm-12"><u>Please enter your registered email address</u> :-<br><br>
									<div class="input-group"> 
										<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
										<input name="user_email" type="email" placeholder="Enter your Email Id" value="<?php echo (@$address)?$address:'' ?>" autocomplete="off" id="username" class="form-control"><span class="input-group-btn">
                    <button class="btn btn-primary" type="submit" style="height:39px;">Send</button>
                    </span>
									</div>
								</div>
							</div>					</div>
					<div class="foot">
                     <?php if(@$success){ ?>
                     
                      <a href="<?php echo base_url();?>/users/signin"><button class="btn btn-block btn-primary btn-rad btn-lg" type="button" style="margin-left:-0.5px;">Login</button></a>
					<!--<div class="col-sm-1"><a href="<?php echo base_url();?>/users/signin">	<button class="btn btn-primary" data-dismiss="modal" type="button" style="text-align:center; width:100%;">Login </button></a></div>--><br>
                    <?php } ?>
						<!--<button class="btn btn-primary" data-dismiss="modal" type="submit">Send</button>--><br>
						<div class="text-center out-links"><font size="1px" color="#000">&copy; 2015 - 3 Cube Services</font><br><a href="mailto:info@3cubeservices.com" style="color:#000; font-weight:inherit; " >info@3cubeservices.com </a></div><br>
					</div>
				</form>
			</div>
		</div>
		
	</div> 
	
</div>

<script src="<?php echo base_url();?>/themes/cleanzone/backend/js/jquery.js"></script>

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

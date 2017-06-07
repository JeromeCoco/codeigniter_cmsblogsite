<!DOCTYPE html>
<html>
	<head>
		<title>writer</title>
		<link rel="icon" href="#" type="image/x-icon">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/font-awesome.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/font-awesome.min.css">
		<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">
		<script src="<?php echo base_url(); ?>js/jquery-3.1.1.min.js"></script>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/styles.css">
		<script type="text/javascript">
			$(document).ready(function(){
				$('#btnLogs').click(function(){
					var uname = $("#uname").val();
					var pword = $("#pword").val();
					$.ajax({
						url: "login",
				        type: "POST",
				        data: { uname:uname, pword:pword },
				        dataType: "json",
				        success: function(data)
				        {
				        	if (data.length == 1)
				        	{
				        		window.location.assign("../../cms/dashboard");
				        	}
				        	else
				        	{
				        		$("#logInFooter").html("<br/><div class='alert alert-danger' role='alert'><center>Account does not exist. <b>Please try again.</b></center></div>");
				        	}
				        }
				    });
				});
			});
		</script>
	</head>
	<body>
		<div id="logInHeader">
		
		</div>
		<div class="logInContainer">	
			<div id="logInContent">
				<div id="cmsHeader">
					writer
					<br/>
				</div>
				<div id="logInForm">
					<div class="input-group">
						<span class="input-group-addon">
						<i class="fa fa-user" aria-hidden="true"></i>
						</span>
						<input type="text" id="uname" class="form-control" placeholder="Username...">
					</div>
					<br/>
					<input type="password" id="pword" class="form-control" placeholder="Password..."/>
					<br/>
					<input type="button" id="btnLogs" style="float:right;" class="btn btn-primary" value="Log In"/>
					<br/>
					<a href="#">Forgot password?</a>
				</div>
				<br/><br/><hr/>
			</div>
			<div id="logInFooter">
			</div>
		</div>
	</body>
</html>
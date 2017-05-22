<!DOCTYPE html>
<html>
	<head>
		<title>Web Name</title>
		<link rel="icon" href="#" type="image/x-icon">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/styles.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/font-awesome.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/font-awesome.min.css">
		<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
		<style type="text/css">
			div.sidenavtago{
				width: 40px;
				transition: .325s;
			}
			span.linkLabelTago{
				display: none;
				transition: .325s;
			}
			div.activeLiit{
				width: 40px;
				transition: .325s;
			}
			div.containerko1{
				transition: .325s;
				position: relative;
				top: 60px;
				left: 55px;
				font-size: 13px;
				width: 1260px;
			}
			@media (max-width: 1300px){
				div.containerko1{
					width: 1000px;
					transition: .325s;
				}
			}
			@media (max-width: 1200px){
				div.containerko1{
					width: 800px;
					transition: .325s;
				}
			}
			@media (max-width: 1000px){
				div.containerko1{
					width: 545px;
					transition: .325s;
				}
			}
			#updPass{
				display: none;
			}
		</style>
		<script src='<?php echo base_url(); ?>js/tinymce/tinymce.min.js'></script>
		<script src="<?php echo base_url(); ?>js/Chart.js"></script>
		<script src="<?php echo base_url(); ?>js/jquery-3.1.1.min.js"></script>
		<script type="text/javascript">
		$(document).ready(function(){
			$.ajax({
				url: "retrievesession",
		        type: "POST",
		        data: { },
		        dataType: "json",
		        success: function(data)
		        {
		        	$("#activeuser").html(data["uname"]);
		        }
			});
			$.ajax({
				url: "loaduser",
		        type: "POST",
		        data: { },
		        dataType: "json",
		        success: function(data)
		        {
		        	$('#id').val(data[0]['id']);
		        	$('#uname').val(data[0]['username']);
		        	$('#fname').val(data[0]['first_name']);
		        	$('#lname').val(data[0]['last_name']);
		        	$('#emailadd').val(data[0]['email_address']);
		        	$('#contactnum').val(data[0]['mobile_number']);
		        }
	    	});
	    	$("#btnlogout").click(function(){
				$.ajax({
					url: "removesession",
			        type: "POST",
			        data: { },
			        dataType: "json",
			        success: function(data)
			        {
			        	
			        }
				});
			});
			$("#btnKolaps").click(function(){
				$(".sidenav").toggleClass('sidenavtago');
				$(".linkLabel").toggleClass('linkLabelTago');
				$(".active").toggleClass('activeLiit');
				$(".containerko").toggleClass('containerko1');
			});
			$("#btnmin").click(function(){
				$(".col-sm-4").fadeOut('slow');
				$(".col-sm-5").fadeOut('slow');
				$(".col-sm-3").fadeOut('slow');
			});
			$("#btnmax").click(function(){
				$(".col-sm-4").fadeIn('slow');
				$(".col-sm-5").fadeIn('slow');
				$(".col-sm-3").fadeIn('slow');
			});
			var updpassword = false;
			$("#btnupdshow").click(function(){
				$("#updPass").fadeIn('fast');
				$(this).after("<button id='btncancel' style='float:right;' class='btn btn-danger'>Cancel</button>");
				$(this).fadeOut('fast');
				$(".errmess").remove();
				updpassword = true;
			});	
			$(document).on( 'click', '#btncancel', function(){
				$("#updPass").fadeOut('fast');
				$(this).fadeOut('fast');
				$("#btnupdshow").fadeIn('fast');
				$(".errmess").remove();
				updpassword = false;
			});
			$("#currPass").change(function(){
				var id = $('#id').val();
				var current = $(this).val();
				$.ajax({
					url: "checkcurrentpass",
			        type: "POST",
			        data: { 
			        	id:id,
			        	current:current
			        },
			        dataType: "json",
			        success: function(data)
			        {
			        	if (data.length === 0)
			        	{
			        		$("#errpass").html("<font color='red'>This is not your password!</font>");
			        		$("#currPass").css("border-color", "red");
			        	}
			        	else
			        	{
			        		$("#errpass").html("<font color='green'>Password matched!</font>");
			        		$("#currPass").css("border-color", "green");
			        		
			        	}
			        }
			    });
			});
			$("#confirmPass").keyup(function(){
				if ($("#confirmPass").val() == $("#newPass").val()) 
				{
					$("#confirmPass").css("border-color", "green");
					$("#newPass").css("border-color", "green");
				}
				else
				{
					$("#confirmPass").css("border-color", "red");
					$("#newPass").css("border-color", "red");
				}
			});
			$("#btnupdusers").click(function(){
				var id = $('#id').val();
	        	var fname = $('#fname').val();
	        	var lname = $('#lname').val();
	        	var emailadd = $('#emailadd').val();
	        	var contactnum = $('#contactnum').val();
	        	if (fname == "" || lname == "" || emailadd == "" || contactnum == "")
	        	{
	        		$("#err").html("<br/><div class='alert alert-danger errmess' role='alert'><center>Please enter complete information. <b>Try again.</b></center></div>");
	        	}
	        	else
	        	{
	        		if (updpassword)
					{
						if ($("font").html() == "Password matched!" && $("#newPass").val() == $("#confirmPass").val())
						{
							var id = $('#id').val();
				        	var fname = $('#fname').val();
				        	var lname = $('#lname').val();
				        	var emailadd = $('#emailadd').val();
				        	var contactnum = $('#contactnum').val();
				        	var pass = $('#newPass').val();
							$.ajax({
								url: "updatepasswordwithcred",
						        type: "POST",
						        data: {
						        	id:id,
						        	fname:fname,
						        	lname:lname,
						        	emailadd:emailadd,
						        	contactnum:contactnum,
						        	pass:pass
						        },
						        dataType: "json",
						        success: function(data)
						        {
						        	$("#err").html("<br/><div class='alert alert-success errmess' role='alert'><center>Successfully saved.</center></div>");
						        }
						    });
						}
						else
						{	
							$("#err").html("<br/><div class='alert alert-danger errmess' role='alert'><center>Please check your password details. <b>Try again.</b></center></div>");
						}
					}
					else
					{
						$.ajax({
							url: "updateuserdetails",
					        type: "POST",
					        data: {
					        	id:id,
					        	fname:fname,
					        	lname:lname,
					        	emailadd:emailadd,
					        	contactnum:contactnum
					        },
					        dataType: "json",
					        success: function(data)
					        {
					        	$("#err").html("<br/><div class='alert alert-success errmess' role='alert'><center>Successfully saved.</center></div>");
					        }
					    });
					}
	        	}
			});
		});
		</script>
	</head>
	<body>
		<nav>
			<ul id="topnavs">
				<a href="#" id="webname">
					<li>
						<i class="fa fa-eercast" aria-hidden="true"></i> Web Name
					</li>
				</a>
				<a href="#" class="toplink">
					<li>
						<i class="fa fa-user-circle" aria-hidden="true"></i> <span id="activeuser"></span>
					</li>
				</a>
			</ul>
			<div class="sidenav">
				<a id="btnKolaps">
					<div class="sidelink">
						<span class="linkIcons">
							<i class="fa fa-bars" aria-hidden="true"></i>
						</span>
						<span class="linkLabel">
							Collapse Menu
						</span>
					</div>
				</a>
				<a href="<?php echo base_url(); ?>index.php/cms/dashboard">
					<div class="sidelink">
						<span class="linkIcons">
							<i class="fa fa-dashboard" aria-hidden="true"></i>
						</span>
						<span class="linkLabel">
							Dashboard
						</span>
					</div>
				</a>
				<a href="<?php echo base_url(); ?>index.php/cms/posts">
					<div class="sidelink">
						<span class="linkIcons">
							<i class="fa fa-bookmark-o" aria-hidden="true"></i>
						</span>
						<span class="linkLabel">
							Posts
						</span>
					</div>
				</a>
				<a href="<?php echo base_url(); ?>index.php/cms/comments">
					<div class="sidelink">
						<span class="linkIcons">
							<i class="fa fa-comment-o" aria-hidden="true"></i> 
						</span>
						<span class="linkLabel">
							Comments
						</span>
					</div>
				</a>
				<a href="<?php echo base_url(); ?>index.php/cms/pages">
					<div class="sidelink">
						<span class="linkIcons">
							<i class="fa fa-map-o" aria-hidden="true"></i>
						</span>
						<span class="linkLabel">
							Pages
						</span>
					</div>
				</a>
				<a href="<?php echo base_url(); ?>index.php/cms/panels">
					<div class="sidelink">
						<span class="linkIcons">
							<i class="fa fa-th-large" aria-hidden="true"></i>
						</span>
						<span class="linkLabel">
							Panels
						</span>
					</div>
				</a>
				<a href="<?php echo base_url(); ?>index.php/cms/files">
					<div class="sidelink">
						<span class="linkIcons">
							<i class="fa fa-folder-open-o" aria-hidden="true"></i>
						</span>
						<span class="linkLabel">
							Files
						</span>
					</div>
				</a>
				<a href="<?php echo base_url(); ?>index.php/cms/settings">
					<div class="sidelink">
						<span class="linkIcons">
							<i class="fa fa-cogs" aria-hidden="true"></i>
						</span>
						<span class="linkLabel">
							Settings
						</span>
					</div>
				</a>
				<a href="<?php echo base_url(); ?>index.php/cms/accounts">
					<div class="active" class="sidelink">
						<span class="linkIcons">
							<i class="fa fa-user-o" aria-hidden="true"></i>
						</span>
						<span class="linkLabel">
							Accounts
						</span>
					</div>
				</a>
				<a id="btnlogout" href="<?php echo base_url(); ?>index.php/cms/admin">
					<div class="sidelink">
						<span class="linkIcons">
							<i class="fa fa-sign-out" aria-hidden="true"></i>
						</span>
						<span class="linkLabel">
							Log out
						</span>
					</div>
				</a>
			</div>
		</nav>
		<div class="containerko">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="#">Home</a></li>
				<li class="breadcrumb-item active">Accounts</li>
			</ol>
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<h4>Account Settings</h4>
						<hr/>
						<div class="">
							<h5>Personal Info</h5>
							<input id="id" type="hidden" class="form-control"/>
							First Name:
							<input id="fname" type="text" class="form-control" placeholder="First name..."/>
							<br/>
							Last Name:
							<input id="lname" type="text" class="form-control" placeholder="Last name..."/>
							<br/>
							<h5>Contact Info</h5>
							Email Address:
							<input id="emailadd" type="email" class="form-control" placeholder="example@sample.com"/>
							<br/>
							Mobile Number:
							<div class="input-group">
								<span class="input-group-addon">+63</span>
								<input id="contactnum" type="number" class="form-control" placeholder="**********" maxlength="10">
							</div>
							<br/>
							<h5>Account Management</h5>
							New Password<br/>
							<input type="button" id="btnupdshow" class="btn btn-default" value="Update Password" />
							<br/><br/>
							<div id="updPass">
								Username:
								<input id="uname" type="text" class="form-control" placeholder="Username..." disabled/>
								<br/>
								Current Password:
								<input id="currPass" type="password" class="form-control"/>
								<span id="errpass"></span>
								<br/>
								Enter New Password:
								<input id="newPass" type="password" class="form-control"/>
								<br/>
								Confirm New Password:
								<input id="confirmPass" type="password" class="form-control"/>
								<br/>
							</div>
							<input id="btnupdusers" type="button" class="btn btn-primary" value="Save Changes..."/>
							<div id="err"></div>
						</div>
					</div>
					<div class="col-sm-6">
						<a href="<?php echo base_url();?>index.php/cms/addnewuser">
							<input style="float:right;" type="button" class="btn btn-primary" value="Add New User"/>
						</a>
					</div>
				</div>
			</div>
			<br/>
		</div>
	</body>
</html>
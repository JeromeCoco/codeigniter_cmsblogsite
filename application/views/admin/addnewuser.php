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
				url: "loaddatetime",
		        type: "POST",
		        data: { },
		        dataType: "json",
		        success: function(data)
		        {
		        	var dateform = data[0]['date_format'];
		        	var timeform = data[0]['time_format'];
		        	$("#date").val(dateform);
		        	$("#time").val(timeform);
		        }
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
			$("#btnAddNew").click(function(){
				var fname = $("#fname").val();
				var lname = $("#lname").val();
				var emailadd = $("#emailadd").val();
				var contactnum = $("#contactnum").val();
				var uname = $("#uname").val();
				var role = $("#role").val();
				var pass = $("#pass").val();
				var confirmpass = $("#confirmpass").val();
				var date = $("#date").val();
				var time = $("#time").val();
				if (fname != "" && lname != "" && emailadd != "" && contactnum != "" && uname != "" && pass != "" && confirmpass != "")
				{
					if (contactnum.length == 10)
					{
						if (pass == confirmpass)
						{
							$.ajax({
								url: "addnewuseraccount",
						        type: "POST",
						        data: {
						        	fname:fname,
									lname:lname,
									emailadd:emailadd,
									contactnum:contactnum,
									uname:uname,
									role:role,
									pass:pass,
									date:date,
									time:time
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
							$("#err").html("<br/><div class='alert alert-warning errmess' role='alert'><center>Please check your password.</center></div>");
						}
					}
					else
					{
						$("#err").html("<br/><div class='alert alert-warning errmess' role='alert'><center>Please check your contact number.</center></div>");
					}
				}
				else
				{
					$("#err").html("<br/><div class='alert alert-warning errmess' role='alert'><center>Please enter the valid information needed.</center></div>");
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
				<a href="<?php echo base_url(); ?>index.php/cms/admin">
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
			<a href="<?php echo base_url();?>index.php/cms/accounts"><button class="btn btn-default">
				<i class="fa fa-chevron-left" aria-hidden="true"></i>
			</button></a>
			<br/><br/>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="#">Home</a></li>
				<li class="breadcrumb-item active"><a href="<?php echo base_url();?>index.php/cms/accounts">Accounts</a></li>
				<li class="breadcrumb-item active">Add New</li>
			</ol>
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<h4>Account Settings</h4>
						<hr/>
						<div class="">
							<h5>Personal Info</h5>
							<input id="date" type="hidden" />
							<input id="time" type="hidden" />
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
								<input id="contactnum" type="number" class="form-control" placeholder="**********">
							</div>
							<br/>
							<h5>Account Management</h5>
							Username:
							<input id="uname" type="text" class="form-control" placeholder="Username..."/>
							<br/>
							Role:
							<select id="role" class="form-control">
								<option>Admin</option>
								<option>Staff</option>
							</select>
							<br/>
							Password:
							<input id="pass" type="password" class="form-control"/>
							<br/>
							Confirm Password:
							<input id="confirmpass" type="password" class="form-control"/>
							<br/>
							<input id="btnAddNew" type="button" class="btn btn-primary" value="Add Account"/>
							<div id="err"></div>
						</div>
					</div>
				</div>
			</div>
			<br/>
		</div>
	</body>
</html>
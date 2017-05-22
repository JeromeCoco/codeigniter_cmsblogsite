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
		<script src='<?php echo base_url(); ?>js/tinymce/tinymce.min.js'></script>
		<script src="<?php echo base_url(); ?>js/Chart.js"></script>
		<script src="<?php echo base_url(); ?>js/jquery-3.1.1.min.js"></script>
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
				url: "loadsettings",
		        type: "POST",
		        data: {  },
		        dataType: "json",
		        success: function(data)
		        {
		        	$("#sitename").val(data[0]['site_title']);
		        	$("#tagline").val(data[0]['site_tagline']);
		        	$("#emailadd").val(data[0]['email_address']);
		        	$("#dateformat").val(data[0]['date_format']);
		        	$("#timeformat").val(data[0]['time_format']);
		        	
		        	if (data[0]["date_format_custom"] == "Yes")
		        	{
		        		$("#datecustselected")[0].checked = true;
		        		$("#dateformat").val("F j, Y");
		        		$("#dateformat").attr("disabled", "disabled");
		        		$("#setcustomdate").val(data[0]['date_format']);
		        	}
		        	else
		        	{
		        		$("#setcustomdate").attr("disabled", "disabled"); 
		        		$("#dateoptselected")[0].checked = true;
		        	}

		        	if (data[0]["time_format_custom"] == "Yes")
		        	{
		        		$("#timecustselected")[0].checked = true;
		        		$("#timeformat").val("g:i A");
		        		$("#timeformat").attr("disabled", "disabled");
		        		$("#setcustomtime").val(data[0]['time_format']);
		        	}
		        	else
		        	{
		        		$("#setcustomtime").attr("disabled", "disabled"); 
		        		$("#timeoptselected")[0].checked = true;
		        	}
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
			$("#dateoptselected").change(function(){
				$("#setcustomdate").attr("disabled", "disabled");
				$("#dateformat").removeAttr("disabled");
				
			});
			$("#datecustselected").change(function(){
				$("#setcustomdate").removeAttr("disabled");
				$("#dateformat").attr("disabled", "disabled");
			});
			$("#timeoptselected").change(function(){
				$("#setcustomtime").attr("disabled", "disabled");
				$("#timeformat").removeAttr("disabled");
			});
			$("#timecustselected").change(function(){
				$("#setcustomtime").removeAttr("disabled");
				$("#timeformat").attr("disabled", "disabled");
			});
		    $("#dateformat").change(function(){
		    	var dateformat = $("#dateformat").val();
		    	$.ajax({
					url: "passdateformat",
			        type: "POST",
			        data: { dateformat:dateformat },
			        dataType: "json",
			        success: function(data)
			        {
			        	$("#datePrev").html(data);
			        }
		    	});
		    });
		    $("#setcustomdate").change(function(){
		    	var dateformat = $("#setcustomdate").val();
		    	$.ajax({
					url: "passdateformat",
			        type: "POST",
			        data: { dateformat:dateformat },
			        dataType: "json",
			        success: function(data)
			        {
			        	$("#datePrev").html(data);
			        }
		    	});
		    });
		    $("#timeformat").change(function(){
		    	var timeformat = $("#timeformat").val();
		    	$.ajax({
					url: "passtimeformat",
			        type: "POST",
			        data: { timeformat:timeformat },
			        dataType: "json",
			        success: function(data)
			        {
			        	$("#timePrev").html(data);
			        }
		    	});
		    });
		    $("#setcustomtime").change(function(){
		    	var timeformat = $("#setcustomtime").val();
		    	$.ajax({
					url: "passtimeformat",
			        type: "POST",
			        data: { timeformat:timeformat },
			        dataType: "json",
			        success: function(data)
			        {
			        	$("#timePrev").html(data);
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
			$("#btnsavechanges").click(function(){
				var sitename = $("#sitename").val();
				var tagline = $("#tagline").val();
				var emailadd = $("#emailadd").val();
				var dateformat = $("#dateformat").val();
				var setcustomdate = $("#setcustomdate").val();
				var timeformat = $("#timeformat").val();
				var setcustomtime = $("#setcustomtime").val();
				var finaldate;
				var finaltime;
				var datecustom;
				var timecustom;
				if ($('#dateoptselected').is(':checked'))
				{
					finaldate = dateformat;
					datecustom = "No";
				}
				else
				{
					finaldate = setcustomdate;
					datecustom = "Yes";
				}
				
				if ($('#timeoptselected').is(':checked'))
				{
					finaltime = timeformat;
					timecustom = "No";
				}
				else
				{
					finaltime = setcustomtime;
					timecustom = "Yes";
				}
				
				if (sitename == "" || tagline == "" || emailadd == "" || finaldate == "" || finaltime == "")
				{
					$("#err").html("<br/><div class='alert alert-danger' role='alert'><center>Please enter complete information. <b>Try again.</b></center></div>");
				}
				else
				{
					$.ajax({
						url: "updatesettingschanges",
				        type: "POST",
				        data: {
				        	sitename:sitename,
				        	tagline:tagline,
				        	emailadd:emailadd,
				        	finaldate:finaldate,
				        	finaltime:finaltime,
				        	datecustom:datecustom,
				        	timecustom:timecustom
				        },
				        dataType: "json",
				        success: function(data)
				        {
				        	$("#err").html("<br/><div class='alert alert-success' role='alert'><center>Successfully saved.</center></div>");
				        }
				    });
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
					<div class="active" class="sidelink">
						<span class="linkIcons">
							<i class="fa fa-cogs" aria-hidden="true"></i>
						</span>
						<span class="linkLabel">
							Settings
						</span>
					</div>
				</a>
				<a href="<?php echo base_url(); ?>index.php/cms/accounts">
					<div class="sidelink">
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
				<li class="breadcrumb-item active">Settings</li>
			</ol>
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<h4>General Settings</h4>
						<hr/>
						<div class="">
							Site Title:
							<input id="sitename" type="text" class="form-control" placeholder="Site name here..."/>
							<br/>
							Tagline:
							<input id="tagline" type="text" class="form-control" placeholder="Site tagline here..."/>
							<br/>
							Email Address:
							<input id="emailadd" type="email" class="form-control" placeholder="example@sample.com"/>
							<i><span style="color:gray;">This address is used for admin purposes, like new user notification.</span></i>
							<hr/>
							Date Format:
							<div class="input-group">
								<span class="input-group-addon">
						        	<input id="dateoptselected" name="datefrmt" type="radio" aria-label="">
						      	</span>
						      	<select id="dateformat" class="form-control">
						      		<option>F j, Y</option>
						      		<option>Y-m-d</option>
						      		<option>m/d/Y</option>
						      		<option>d/m/Y</option>
						      	</select>
						    </div>
						    <br/>
							<div class="input-group">
								<span class="input-group-addon">
						        	<input id="datecustselected" name="datefrmt" type="radio" aria-label="">
						      	</span>
						      	<input id="setcustomdate" type="text" class="form-control" placeholder="Custom Date Format...">
						    </div>
						    Preview - <span id="datePrev"></span>
						    <hr/>
						    Time Format:
							<div class="input-group">
								<span class="input-group-addon">
						        	<input id="timeoptselected" name="timefrmt" type="radio" aria-label="">
						      	</span>
						      	<select id="timeformat" class="form-control">
						      		<option>g:i a</option>
						      		<option>g:i A</option>
						      		<option>H:i</option>
						      	</select>
						    </div>
						    <br/>
							<div class="input-group">
								<span class="input-group-addon">
						        	<input id="timecustselected" name="timefrmt" type="radio" aria-label="">
						      	</span>
						      	<input id="setcustomtime" type="text" class="form-control" placeholder="Custom Time Format...">
						    </div>
						    Preview - <span id="timePrev"></span>
							<br/><br/>
							<input id="btnsavechanges" type="button" class="btn btn-success" value="Save Changes..."/>
							<div id="err"></div>
						</div>
					</div>
				</div>
			</div>
			<br/>
		</div>
	</body>
</html>
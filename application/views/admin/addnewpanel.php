<!DOCTYPE html>
<html>
	<head>
		<title>writer</title>
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
			$("#btnaddpanel").click(function(){
				var panelname = $("#panelname").val();
				var mytextarea = tinyMCE.activeEditor.getContent();
				if (panelname == "" || mytextarea == "")
				{
					$("#err").html("<br/><div class='alert alert-danger errmess' role='alert'><center>Please enter the needed information.</center></div>");
				}
				else
				{
					$.ajax({
						url: "addpanel",
				        type: "POST",
				        data: {
				        	panelname:panelname,
				        	mytextarea:mytextarea
				        },
				        dataType: "json",
				        success: function(data)
				        {
				        	$("#err").html("<br/><div class='alert alert-success errmess' role='alert'><center>New panel was successfully saved.</center></div>");
				        	tinyMCE.activeEditor.setContent(" ");
				        	$("#panelname").val(" ");
				        }
					});
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
		});
		</script>
		<script type="text/javascript">
			tinymce.init({
				selector: 'textarea',
				height: 500,
				theme: 'modern',
				plugins:
				[
					'advlist autolink lists link image charmap print preview hr anchor pagebreak',
					'searchreplace wordcount visualblocks visualchars code fullscreen',
					'insertdatetime media nonbreaking save table contextmenu directionality',
					'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc help'
				],
				toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
				toolbar2: 'print preview media | forecolor backcolor emoticons | codesample help',
				image_advtab: true,
				templates:
				[
					{ title: 'Test template 1', content: 'Test 1' },
					{ title: 'Test template 2', content: 'Test 2' }
				],
				content_css:
				[
					'//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
					'//www.tinymce.com/css/codepen.min.css'
				]
			});
			$(document).ready(function(){
				$("#collapseMenu").click(function(){
					$("#sidenav").fadeOut('fast');	
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
				<a href="<?php echo base_url(); ?>cms/dashboard">
					<div class="sidelink">
						<span class="linkIcons">
							<i class="fa fa-dashboard" aria-hidden="true"></i>
						</span>
						<span class="linkLabel">
							Dashboard
						</span>
					</div>
				</a>
				<a href="<?php echo base_url(); ?>cms/posts">
					<div class="sidelink">
						<span class="linkIcons">
							<i class="fa fa-bookmark-o" aria-hidden="true"></i>
						</span>
						<span class="linkLabel">
							Posts
						</span>
					</div>
				</a>
				<a href="<?php echo base_url(); ?>cms/comments">
					<div class="sidelink">
						<span class="linkIcons">
							<i class="fa fa-comment-o" aria-hidden="true"></i> 
						</span>
						<span class="linkLabel">
							Comments
						</span>
					</div>
				</a>
				<a href="<?php echo base_url(); ?>cms/pages">
					<div class="sidelink">
						<span class="linkIcons">
							<i class="fa fa-map-o" aria-hidden="true"></i>
						</span>
						<span class="linkLabel">
							Pages
						</span>
					</div>
				</a>
				<a href="<?php echo base_url(); ?>cms/panels">
					<div class="active" class="sidelink">
						<span class="linkIcons">
							<i class="fa fa-th-large" aria-hidden="true"></i>
						</span>
						<span class="linkLabel">
							Panels
						</span>
					</div>
				</a>
				<a href="<?php echo base_url(); ?>cms/links">
					<div class="sidelink">
						<span class="linkIcons">
							<i class="fa fa-external-link" aria-hidden="true"></i>
						</span>
						<span class="linkLabel">
							Links
						</span>
					</div>
				</a>
				<a href="<?php echo base_url(); ?>cms/files">
					<div class="sidelink">
						<span class="linkIcons">
							<i class="fa fa-folder-open-o" aria-hidden="true"></i>
						</span>
						<span class="linkLabel">
							Files
						</span>
					</div>
				</a>
				<a href="<?php echo base_url(); ?>cms/settings">
					<div class="sidelink">
						<span class="linkIcons">
							<i class="fa fa-cogs" aria-hidden="true"></i>
						</span>
						<span class="linkLabel">
							Settings
						</span>
					</div>
				</a>
				<a href="<?php echo base_url(); ?>cms/accounts">
					<div class="sidelink">
						<span class="linkIcons">
							<i class="fa fa-user-o" aria-hidden="true"></i>
						</span>
						<span class="linkLabel">
							Accounts
						</span>
					</div>
				</a>
				<a id="btnlogout" href="<?php echo base_url(); ?>cms/admin">
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
			<a href="<?php echo base_url();?>cms/panels"><button class="btn btn-default">
					<i class="fa fa-chevron-left" aria-hidden="true"></i>
			</button></a>
			<br/><br/>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="#">Home</a></li>
				<li class="breadcrumb-item"><a href="<?php echo base_url();?>cms/panels">Panels</a></li>
				<li class="breadcrumb-item active">Add New</li>
			</ol>
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<input id="panelname" type="text" class="form-control" placeholder="Panel Name..."/><br/>
						<textarea id="mytextarea">
						    	
						</textarea>
						</form>
					</div>
					<div class="col-sm-5">
						<br/>
						<input id="btnaddpanel" type="button" value="Add Panel" class="btn btn-success">
						<div id="err"></div>
					</div>
				</div>
			</div>
			<br/>
		</div>
	</body>
</html>
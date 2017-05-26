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
			  selector: '#mytextarea',
			  skin: 'lightgray',
			  theme: 'modern',
			  schema: 'html5',
			  plugin: 'a_tinymce_plugin advlink',
			  browser_spellcheck: true,
			  contextmenu: false,
			  toolbar: 'link separator anchor unlink justifyleft justifycenter justifyrighht undo redo styleselect bold italic alignleft aligncenter alignright bullist numlist outdent indent code',
			  a_plugin_option: true,
			  a_configuration_option: 400
			});

			$(document).ready(function(){
				$("#collapseMenu").click(function(){
					$("#sidenav").fadeOut('fast');	
				});
				$("#btnshowjs").click(function(){
					$("#jslist").fadeIn('slow');
				});
				$("#btnhidejs").click(function(){
					$("#jslist").fadeOut('slow');
				});
				$("#btnshowcss").click(function(){
					$("#csslist").fadeIn('slow');
				});
				$("#btnhidecss").click(function(){
					$("#csslist").fadeOut('slow');
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
					<div class="active" class="sidelink">
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
				<a href="<?php echo base_url(); ?>index.php/cms/links">
					<div class="sidelink">
						<span class="linkIcons">
							<i class="fa fa-external-link" aria-hidden="true"></i>
						</span>
						<span class="linkLabel">
							Links
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
			<a href="<?php echo base_url();?>index.php/cms/pages"><button class="btn btn-default">
					<i class="fa fa-chevron-left" aria-hidden="true"></i>
			</button></a>
			<br/><br/>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="#">Home</a></li>
				<li class="breadcrumb-item"><a href="<?php echo base_url();?>index.php/cms/pages">Pages</a></li>
				<li class="breadcrumb-item active">Add New</li>
			</ol>
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<input type="text" class="form-control" placeholder="Page Name..."/><br/>
					</div>
					<div class="col-sm-4">
						<input type="text" class="form-control" placeholder="Page Title..."/><br/>
					</div>
					<div class="col-sm-4">
						<b>JavaScript</b> - <a style="color:blue;" id="btnshowjs">Add New</a><br/>
						<span id="jslist">
							<select style="padding:3px;">
								<?php
									$dir = FCPATH."/js/";
									$files1 = scandir($dir);
									for ($i=0; $i < count($files1); $i++)
									{ 
										echo "<option>".$files1[$i]."</option>";
									}
								?>
							</select>
							<input type="button" value="Add"/>
							<input id="btnhidejs" type="button" value="Cancel"/>
						</span>
						<hr/>
					</div>
					<div class="col-sm-4">
						Page Description:
						<textarea class="form-control">
								
						</textarea><br/>
					</div>
					<div class="col-sm-4">
						Page Keywords:
						<textarea class="form-control">
								
						</textarea><br/>
					</div>
					<div class="col-sm-4">
						<b>CSS</b> - <a style="color:blue;" id="btnshowcss">Add New</a><br/>
						<span id="csslist">
							<select style="padding:3px;">
								<?php
									$dir = FCPATH."/css/";
									$files1 = scandir($dir);
									for ($i=0; $i < count($files1); $i++)
									{ 
										echo "<option>".$files1[$i]."</option>";
									}
								?>
							</select>
							<input type="button" value="Add"/>
							<input id="btnhidecss" type="button" value="Cancel"/>
						</span>
						<hr/>
					</div>
					<div class="col-sm-4">
						Layout:
						<select class="form-control">
							<?php
								$dir = FCPATH."/application/views/users";
								$files1 = scandir($dir);
								for ($i=0; $i < count($files1); $i++)
								{ 
									echo "<option>".$files1[$i]."</option>";
								}
							?>
						</select>
						<br/>
					</div>
					<div class="col-sm-12">
						<b>Layout Panels</b>
						<hr/>
						<div class="layoutPanels">
							Please select a layout...
							<br/><br/>
						</div>
					</div>
					<div class="col-sm-5">
						<div id="publishSettings">
							<b>Publish</b>
							<hr/>
							Status: 
							<select class="form-control">
								<option>Immediate</option>
								<option>Pending Page</option>
							</select>
							<br/>
							<input type="button" value="Add Page" class="btn btn-success">
						</div>
					</div>
				</div>
			</div>
			<br/>
		</div>
	</body>
</html>
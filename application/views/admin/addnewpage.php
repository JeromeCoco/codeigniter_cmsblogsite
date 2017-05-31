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
		<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
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
				$(function(){
					$("#listofjs, #listofcss").sortable({
						revert: true
					});
				});
				$("#collapseMenu").click(function(){
					$("#sidenav").fadeOut('fast');	
				});

				var js = new Array();
				var css = new Array();

				$("#btnshowjs").click(function(){
					$("#jslist").fadeIn('slow');
				});
				$("#btnhidejs").click(function(){
					$("#jslist").fadeOut('slow');
					$("#listofjs").fadeOut('slow');
					$("#listofjs").html("");
					js = [];
				});

				$("#btnshowcss").click(function(){
					$("#csslist").fadeIn('slow');
				});
				$("#btnhidecss").click(function(){
					$("#csslist").fadeOut('slow');
					$("#listofcss").fadeOut('slow');
					$("#listofcss").html("");
					css = [];
				});

				var num = 0;

				$("#btnaddjs").click(function(){
					$("#jslist").fadeIn('slow');
					$("#listofjs").fadeIn('slow');
					num++;
					$("#listofjs").append("<li id='"+num+"' value='"+$("#jsname").val()+"'><i class='fa fa-arrows-v' aria-hidden='true'></i> "+$("#jsname").val()+" <input id='removejs' class='btn btn-sm btn-danger' type='button' value='x' data-yes='"+$("#jsname").val()+"' data-id='"+num+"'> </li>");
					js.push($("#jsname").val());
				});
				$(document).on( "click", "#removejs", function(){
					var id = $(this).attr("data-id");
					var val = $(this).attr("data-yes");
					$("#"+id).remove();
					var index = js.indexOf(val);
					if (index > -1)
					{
					    js.splice(index, 1);
					}
				});

				$("#btnaddcss").click(function(){
					$("#csslist").fadeIn('slow');
					$("#listofcss").fadeIn('slow');
					num++;
					$("#listofcss").append("<li id='"+num+"' value='"+$("#cssname").val()+"'><i class='fa fa-arrows-v' aria-hidden='true'></i> "+$("#cssname").val()+" <input id='removecss' class='btn btn-sm btn-danger' type='button' value='x' data-yes='"+$("#cssname").val()+"' data-id='"+num+"'> </li>");
					css.push($("#cssname").val());
				});
				$(document).on( "click", "#removecss", function(){
					var id = $(this).attr("data-id");
					var val = $(this).attr("data-yes");
					$("#"+id).remove();
					var index = css.indexOf(val);
					if (index > -1)
					{
					    css.splice(index, 1);
					}
				});
				$("#layoutname").change(function(){
					var layout = $("#layoutname").val();
					$.ajax({
						url: "getsections",
				        type: "POST",
				        data: { layout:layout },
				        dataType: "json",
				        success: function(data)
				        {
				        	$("#hint").remove();
				        	$(".layoutPanels").html("");
				        	for (var i = 0; i < data.sections.length; i++)
				        	{
				        		$(".layoutPanels").append("<div class='panel-item"+i+" panel-item-container'></div>");
				        		$(".panel-item"+i).append("<div class='panel-name'>"+data.sections[i]['section']+"</div>");
				        		$(".panel-item"+i).append("<select id='panel-option' class='form-control panel-option'></select>");
				        	}
				        	for (var j = 0; j < data.query.length; j++)
				        	{
				        		$("select#panel-option").append("<option value='"+data.query[j]['id']+"'>"+data.query[j]['panel_name']+"</option>");
				        	}
				        }
				    });
				});
				$("#btnaddpage").click(function(){
					panellist = new Array();

					$('.panel-item-container').each(function(){
						var data = {
							panel : $(this).children('.panel-name').html(),
							panel_id : $(this).children('.panel-option').val()
						}
						panellist.push(data);
					});

					// To get values of list css and js
					var jslist = $( "#listofjs" ).sortable("toArray", {attribute: 'value'});
					var csslist = $( "#listofcss" ).sortable("toArray", {attribute: 'value'});

					console.log(panellist);
					console.log(jslist);
					console.log(csslist);
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
					<div class="col-sm-6">
						<input type="text" class="form-control" placeholder="Page Name..."/><br/>
					</div>
					<div class="col-sm-6">
						<input type="text" class="form-control" placeholder="Page Title..."/><br/>
					</div>
					<div class="col-sm-6">
						Page Description:
						<textarea class="form-control">
								
						</textarea><br/>
					</div>
					<div class="col-sm-6">
						Page Keywords:
						<textarea class="form-control">
								
						</textarea><br/>
					</div>
					<div class="col-sm-4">
						<b>JavaScript</b> - <a style="color:blue;" id="btnshowjs">Add New</a><br/>
						<span id="jslist">
							<select id="jsname" style="padding:3px;">
								<?php
									$dir = FCPATH."/js/";
									$files1 = scandir($dir);
									for ($i=0; $i < count($files1); $i++)
									{
										echo "<option>".$files1[$i]."</option>";
									}
								?>
							</select>
							<input id="btnaddjs" type="button" value="Add"/>
							<input id="btnhidejs" type="button" value="Cancel"/>
							<br/><br/>
							<ul id="listofjs">
								
							</ul>
						</span>
						<hr/>
					</div>
					<div class="col-sm-4">
						<b>CSS</b> - <a style="color:blue;" id="btnshowcss">Add New</a><br/>
						<span id="csslist">
							<select id="cssname" style="padding:3px;">
								<?php
									$dir = FCPATH."/css/";
									$files1 = scandir($dir);
									for ($i=0; $i < count($files1); $i++)
									{ 
										echo "<option>".$files1[$i]."</option>";
									}
								?>
							</select>
							<input id="btnaddcss" type="button" value="Add"/>
							<input id="btnhidecss" type="button" value="Cancel"/>
							<br/><br/>
							<ul id="listofcss">
								
							</ul>
						</span>
						<hr/>
					</div>
					<div class="col-sm-5">
						Layout:
						<select id="layoutname" class="form-control">
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
						<div id="hint">Please select a layout...</div>
						<div class="layoutPanels col-sm-6">
							
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
							<input id="btnaddpage" type="button" value="Add Page" class="btn btn-success">
						</div>
					</div>
				</div>
			</div>
			<br/>
		</div>
	</body>
</html>
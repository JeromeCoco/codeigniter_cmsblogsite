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
		<script src="https://npmcdn.com/tether@1.2.4/dist/js/tether.min.js"></script>
		<script src='<?php echo base_url(); ?>js/tinymce/tinymce.min.js'></script>
		<script src="<?php echo base_url(); ?>js/Chart.js"></script>
		<script src="<?php echo base_url(); ?>js/jquery-3.1.1.min.js"></script>
		<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
		<script src="<?php echo base_url(); ?>js/bootstrap.js"></script>
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
			$(function(){
				$("#listofjs, #listofcss").sortable({
					revert: true
				});
			});
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
			$("#txtsearch").keyup(function(){
				var txtsearch = $(this).val();
				$.ajax({
					url: "searchpage",
			        type: "POST",
			        data: { txtsearch:txtsearch },
			        dataType: "json",
			        success: function(data)
			        {
			        	$("tr").remove();
			        	$("tbody").append("<tr> <th>Page ID</th> <th>Page Name</th> <th>Actions</th> </tr> ");
			        	for (var i = 0; i < data.length; i++)
			        	{
			        		$("tbody").append("<tr id='page"+data[i]['id']+"'> <td>"+data[i]['id']+"</td> <td>"+data[i]['page_name']+"</td> <td> <input id='btneditpage' data-id='"+data[i]['id']+"' type='button' class='btn btn-sm btn-default' value='Edit'/> &nbsp; <input id='btnremovepage' data-id='"+data[i]['id']+"' type='button' class='btn btn-sm btn-danger' value='Remove'/> &nbsp; </td> </tr> ");
			        	}
			        }
				});
			});
			$(document).on( "click", "#btnremovepage", function(){
				var id = $(this).attr("data-id");
				var check = confirm("Are you sure you want to delete this page?");
				if (check == true)
				{
					$.ajax({
						url: "removepage",
				        type: "POST",
				        data: { id:id },
				        dataType: "json",
				        success: function(data)
				        {
				        	$("#page"+id).fadeOut('slow');
				        }
					});
				}
			});
			$(document).on( "click", "#btneditpage", function(){
				$("#pagename").val("");
	        	$("#pagetitle").val("");
	        	$("#pagedesc").val("");
	        	$("#pagekeywords").val("");
	        	js = [];
	        	css = [];
	        	panel = [];
	        	section = [];
	        	panellist = [];
	        	$("#listofcss").html("");
	        	$("#listofjs").html("");
	        	$(".layoutPanels").html("");
				var id = $(this).attr("data-id");
				$('#myModal').modal('toggle');
				$.ajax({
					url: "getpagedetails",
			        type: "POST",
			        data: { id:id },
			        dataType: "json",
			        success: function(data)
			        {
			        	$("#pageid").val(data.info[0]['id']);
			        	$("#pagename").val(data.info[0]['page_name']);
			        	$("#pagetitle").val(data.info[0]['page_title']);
			        	$("#pagedesc").val(data.info[0]['page_desc']);
			        	$("#pagekeywords").val(data.info[0]['page_keywords']);
			        	for (var i = 0; i < data.css.length; i++)
			        	{
			        		num++;
			        		$("#listofcss").append("<li id='"+num+"' value='"+data.css[i]['css_name']+"'><i class='fa fa-arrows-v' aria-hidden='true'></i> "+data.css[i]['css_name']+" <input id='removecss' class='btn btn-sm btn-danger' type='button' value='x' data-yes='"+data.css[i]['css_name']+"' data-id='"+num+"'> </li>");
			        		css.push(data.css[i]['css_name']);
			        	}
			        	for (var j = 0; j < data.js.length; j++)
			        	{
			        		num++;
			        		$("#listofjs").append("<li id='"+num+"' value='"+data.js[j]['js_name']+"'><i class='fa fa-arrows-v' aria-hidden='true'></i> "+data.js[j]['js_name']+" <input id='removejs' class='btn btn-sm btn-danger' type='button' value='x' data-yes='"+data.js[j]['js_name']+"' data-id='"+num+"'> </li>");
			        		js.push(data.js[j]['js_name']);
			        	}
			        	$("#layoutname").html(data.layout[0]['layout']);
			        	
			        	for (var i = 0; i < data.layout.length; i++)
			        	{
			        		panel.push(data.layout[i]['panel_name']);
							section.push(data.layout[i]['section_label']);
			        	}
			        	
			        	for (var k = 0; k < panel.length; k++)
			        	{
			        		$(".layoutPanels").append("<div class='panel-item"+k+" panel-item-container'></div>");
			        		$(".panel-item"+k).append("<div class='panel-name'>"+section[k]+"</div>");
			        		$(".panel-item"+k).append("<select id='panel-option' class='form-control panel-option"+k+" panels'></select>");
			        		for (var j = 0; j < data.panels.length; j++) {
			        			$(".panel-option"+k).append("<option>"+data.panels[j]['panel_name']+"<option>");
			        		};
			        		$(".panel-option"+k).val(panel[k]);
			        	}
			        }
				});
			});

			$("#btnupdatepage").click(function(){
				console.log($( "#listofcss" ).sortable("toArray", {attribute: 'value'}));
				console.log($( "#listofjs" ).sortable("toArray", {attribute: 'value'}));
				console.log($('#pageid').val());
				console.log($('#pagename').val());
				console.log($('#pagetitle').val());
				console.log($('#pagedesc').val());
				console.log($('#pagekeywords').val());
				panellist = new Array();
				$('.panel-item-container').each(function(){
					var data = {
						panel : $(this).children('.panel-name').html(),
						panel_id : $(this).children('.panels').val()
					}
					panellist.push(data);
				});
				console.log(panellist);
			});

			var panel = new Array();
			var section = new Array();
			var js = new Array();
			var css = new Array();
			var num = 0;

			$("#btnaddjs").click(function(){
				$("#jslist").fadeIn('slow');
				$("#listofjs").fadeIn('slow');
				num++;
				$("#listofjs").append("<li id='"+num+"' value='"+$("#jsname").val()+"'><i class='fa fa-arrows-v' aria-hidden='true'></i> "+$("#jsname").val()+" <input id='removejs' class='btn btn-sm btn-danger' type='button' value='x' data-yes='"+$("#jsname").val()+"' data-id='"+num+"'> </li>");
				js.push($("#jsname").val());
			});
			$("#btnaddcss").click(function(){
				$("#csslist").fadeIn('slow');
				$("#listofcss").fadeIn('slow');
				num++;
				$("#listofcss").append("<li id='"+num+"' value='"+$("#cssname").val()+"'><i class='fa fa-arrows-v' aria-hidden='true'></i> "+$("#cssname").val()+" <input id='removecss' class='btn btn-sm btn-danger' type='button' value='x' data-yes='"+$("#cssname").val()+"' data-id='"+num+"'> </li>");
				css.push($("#cssname").val());
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
			$('#btncss').click(function(){
				$("#pagestable").css("display","none");
			});
		});
		</script>
	</head>
	<body>
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document">
		    	<div class="modal-content">
		      		<div class="modal-header">
			        	<h5 class="modal-title" id="exampleModalLabel">
			        		Edit Page
			        	</h5>
			        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          		<span aria-hidden="true">&times;</span>
			        	</button>
		      		</div>
		      		<div class="modal-body">
		      			<div class="container">
			      			<div class="row">
			      				<div class="col-sm-6">
			      					<input type="hidden" id="pageid"/>
									<input id="pagename" type="text" class="form-control" placeholder="Page Name..."/><br/>
								</div>
								<div class="col-sm-6">
									<input id="pagetitle" type="text" class="form-control" placeholder="Page Title..."/><br/>
								</div>
								<div class="col-sm-6">
									Page Description:
									<textarea id="pagedesc" class="form-control">
											
									</textarea><br/>
								</div>
								<div class="col-sm-6">
									Page Keywords:
									<textarea id="pagekeywords" class="form-control">
											
									</textarea><br/>
								</div>
								<div class="col-sm-6">
									<b>JavaScript</b>
									<span id="jslists">
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
										<br/><br/>
										<ul id="listofjs">
											
										</ul>
									</span>
									<hr/>
								</div>
								<div class="col-sm-6">
									<b>CSS</b>
									<span id="csslists">
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
										<br/><br/>
										<ul id="listofcss">
											
										</ul>
									</span>
									<hr/>
								</div>
								<div class="col-sm-5">
									Layout: <span id="layoutname"></span>
									<br/>
								</div>
								<div class="col-sm-12">
									<b>Layout Panels</b>
									<hr/>
									<div class="layoutPanels col-sm-6">
										
									</div>
								</div>
			      			</div>
		      			</div>
			      	</div>
		      		<div class="modal-footer">
		      			<button id="btnupdatepage" type="button" class="btn btn-success">Update Page</button>
		        		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		      		</div>
		    	</div>
		  	</div>
		</div>
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
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="#">Home</a></li>
				<li class="breadcrumb-item active">Pages</li>
			</ol>
			<div class="container">
				<div class="row">
					<div class="row">
			  			<div class="col-sm-8">
			  				<div class="form-inline">
					  			Search Page: &nbsp;
								<input id="txtsearch" type="text" class="form-control" placeholder="..."/>
							</div>
						</div>
						<div class="col-sm-4">
							<a href="<?php echo base_url(); ?>index.php/cms/addnewpage" style="float:right;">
								<button class="btn btn-primary"><i class="fa fa-plus-square" aria-hidden="true"></i>Add New Page</button>
							</a>
						</div>
						<div class="col-sm-12">
							<br/><br/>
							<table class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>Page ID</th>
										<th>Page Name</th>
										<th>Actions</th>
									</tr>
								</thead>
								<tbody>
									<?php echo $page_list; ?>
								</tbody>
								<tfoot>
									
								</tfoot>
							</table>
						</div>
			  		</div>
				</div>
			</div>
		</div>
	</body>
</html>
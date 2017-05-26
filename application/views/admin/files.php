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
				$(document).on( "click", "#btnremove", function(){
					var check = confirm("Are you sure you want to delete this file?");
					var id = $(this).attr("data-id");
					if (check == true)
					{
						$.ajax({
							url: "removefile",
					        type: "POST",
					        data: { id:id },
					        dataType: "json",
					        success: function(data)
					        {
					        	$("#file"+id).fadeOut('slow');
					        }
						});
					}
				});
				$("#searchtext").keyup(function(){
					var searchtext = $(this).val();
					var searchcategory = $("#searchcategory").val();
					$.ajax({
						url: "searchfile",
				        type: "POST",
				        data: {
				        	searchtext:searchtext,
				        	searchcategory:searchcategory
				        },
				        dataType: "json",
				        success: function(data)
				        {
				        	$("tr").remove();
				        	$("tbody").append("<tr> <th>Date Uploaded</th> <th>File Name</th> <th>Description</th> <th>Preview</th> <th>Actions</th> </tr> ");
				        	for (var i = 0; i < data.length; i++)
				        	{
				        		$("tbody").append("<tr id="+data[i]['id']+"> <td> "+data[i]['file_date_uploaded']+"</td> <td> "+data[i]['file_content']+"</td> <td> "+data[i]['file_desc']+"</td> <td class='text-center'> <a href='../../www/images/"+data[i]['file_content']+"'> <img style='border:1px solid lightgray;border-radius:2px;width:50px;' src='../../www/images/"+data[i]['file_content']+"'> </a> </td> <td> <input data-id="+data[i]['id']+" id='btnremove' type='button' class='btn btn-sm btn-danger' value='Remove Image'/> </td> </tr> ");
				        	}
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
					<div class="active" class="sidelink">
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
				<li class="breadcrumb-item active">Files</li>
			</ol>
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="form-inline">
							Search by: &nbsp;
							<select id="searchcategory" class="form-control" placeholder="Search by...">
								<option>file_name</option>
								<option>file_date_uploaded</option>
							</select> &nbsp;
							<input id="searchtext" type="text" class="form-control" placeholder="..."/>
						</div>
						<br/>
					</div>
					<div class="col-sm-6">
						<a href="<?php echo base_url();?>index.php/cms/addnewfile">
							<button class="btn btn-primary" style="float:right"> <i class="fa fa-file-o" aria-hidden="true"></i> Upload File </button>
						</a>
					</div>
					<div class="col-sm-12">
						<table class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>Date Uploaded</th>
									<th>File Name</th>
									<th>Description</th>
									<th>Preview</th>
									<th>Actions</th>
								</tr>
							</thead>
							<tbody>
								<?php echo $file_list;?>
							</tbody>
							<tfoot>
								
							</tfoot>
						</table>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
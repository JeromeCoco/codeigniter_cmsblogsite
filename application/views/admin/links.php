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
		<script src="<?php echo base_url(); ?>js/jquery-3.1.1.min.js"></script>
		<script src="https://npmcdn.com/tether@1.2.4/dist/js/tether.min.js"></script>
		<script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
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
			$("#btnaddpage").click(function(){
				var linkname = $("#linkname").val();
				var pageid = $("#pageid").val();
				var urlname = $("#urlname").val();
				if (linkname == "" || urlname == "")
				{
					$("#err").html("<br/><div class='alert alert-danger errmess' role='alert'><center>Please enter the needed information.</center></div>");
				}
				else
				{
					$.ajax({
						url: "addlink",
				        type: "POST",
				        data: {
				        	linkname:linkname,
				        	pageid:pageid,
				        	urlname:urlname
				        },
				        dataType: "json",
				        success: function(data)
				        {
				        	$("#err").html("<br/><div class='alert alert-success errmess' role='alert'><center>New link was successfully saved.</center></div>");
				        	$("#linkname").val("");
				        	$("#urlname").val("");
				        }
					});
				}
			});
			$(document).on( "click", "#editurl", function(){
				var id = $(this).attr("data-id");
				$('#myModalEdit').modal('toggle');
				$('#linknameedit').val($("#name"+id).text());
				$('#urlnameedit').val($("#url"+id).text());
				$('#linkid').val(id);
			});
			$(document).on( "click", "#removeurl", function(){
				var id = $(this).attr("data-id");
				var check = confirm("Are you sure you want to delete this link?");
				if (check == true)
				{
					$.ajax({
						url: "removelink",
				        type: "POST",
				        data: { id:id },
				        dataType: "json",
				        success: function(data)
				        {
				        	$("#row"+id).fadeOut('slow');
				        }
					});
				}
			});
			$("#btnupdatepage").click(function(){
				var linkid = $("#linkid").val();
				var linknameedit = $("#linknameedit").val();
				var urlnameedit = $("#urlnameedit").val();
				if (linknameedit == "" || urlnameedit == "")
				{
					$("#errs").html("<br/><div class='alert alert-warning errmess' role='alert'><center>Please enter the needed information.</center></div>");
				}
				else
				{
					$.ajax({
						url: "updatelink",
				        type: "POST",
				        data: {
				        	linkid:linkid,
				        	linknameedit:linknameedit,
				        	urlnameedit:urlnameedit
				        },
				        dataType: "json",
				        success: function(data)
				        {
				        	$("#errs").html("<br/><div class='alert alert-success errmess' role='alert'><center>Link details successfully updated.</center></div>");
				        }
					});
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
			$("#btnviewadding").click(function(){
				$('#myModal').modal('toggle');
			});
			$(".close").click(function(){
				location.reload();
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
			        		Add New Link
			        	</h5>
			        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          		<span aria-hidden="true">&times;</span>
			        	</button>
		      		</div>
		      		<div class="modal-body">
		      			<div class="container">
			      			<div class="row">
			      				Link name:
		      					<input id="linkname" type="text" class="form-control" placeholder="Link Name..."/>
		      					Page:
		      					<select id="pageid" class="form-control">
		      						<?php echo $pagenames; ?>
		      					</select>
		      					URL:
		      					<input id="urlname" type="text" class="form-control" placeholder="sampleurl" />
		      					<div id="err"></div>
			      			</div>
		      			</div>
			      	</div>
		      		<div class="modal-footer">
		      			<button id="btnaddpage" type="button" class="btn btn-success">Save</button>
		        		<button type="button" class="btn btn-default close" data-dismiss="modal">Close</button>
		      		</div>
		    	</div>
		  	</div>
		</div>
		<div class="modal fade" id="myModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document">
		    	<div class="modal-content">
		      		<div class="modal-header">
			        	<h5 class="modal-title" id="exampleModalLabel">
			        		Edit Link
			        	</h5>
			        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          		<span aria-hidden="true">&times;</span>
			        	</button>
		      		</div>
		      		<div class="modal-body">
		      			<div class="container">
			      			<div class="row">
			      				<input id="linkid" type="hidden"/>
			      				Link name:
		      					<input id="linknameedit" type="text" class="form-control" placeholder="Link Name..."/>
		      					URL:
		      					<input id="urlnameedit" type="text" class="form-control" placeholder="sampleurl" />
		      					<div id="errs"></div>
			      			</div>
		      			</div>
			      	</div>
		      		<div class="modal-footer">
		      			<button id="btnupdatepage" type="button" class="btn btn-success">Update</button>
		        		<button type="button" class="btn btn-default close" data-dismiss="modal">Close</button>
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
					<div class="active" class="sidelink">
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
				<a href="<?php echo base_url(); ?>index.php/cms/admin">
					<div class="sidelink">
						<span class="linkIcons">
							<i class="fa fa-sign-out" aria-hidden="true"></i>
						</span>
						<span id="btnlogout" class="linkLabel">
							Log out
						</span>
					</div>
				</a>
			</div>
		</nav>
		<div class="containerko">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="#">Home</a></li>
				<li class="breadcrumb-item active">Links</li>
			</ol>
				<div class="row">
					<div class="col-sm-6">
						<div class="form-inline">
							Search by: &nbsp;
							<select id="searchcategory" class="form-control" placeholder="Search by...">
								<option>link_name</option>
								<option>page_url</option>
							</select> &nbsp;
							<input id="searchtext" type="text" class="form-control" placeholder="..."/>
						</div>
						<br/>
					</div>
					<div class="col-sm-6">
						<a id="btnviewadding">
							<button class="btn btn-md btn-primary" style="float:right"> <i class="fa fa-external-link" aria-hidden="true"></i>Add New Link </button>
						</a>
					</div>
					<div class="col-sm-12">
						<table class="table table-striped table-bordered">
							<thead>
								<tr>
									<th>Name</th>
									<th>Page ID</th>
									<th>URL</th>
									<th>Actions</th>
								</tr>
							</thead>
							<tbody>
								<?php echo $linklist; ?>
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
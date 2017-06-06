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
		<script src='<?php echo base_url(); ?>js/tinymce/tinymce.min.js'></script>
		<script src="<?php echo base_url(); ?>js/jquery-3.1.1.min.js"></script>
		<script src="https://npmcdn.com/tether@1.2.4/dist/js/tether.min.js"></script>
		<script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
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
		tinymce.init({
		    selector: "textarea",
		    plugins: [
		        "advlist autolink lists link image charmap print preview anchor",
		        "searchreplace visualblocks code fullscreen",
		        "insertdatetime media table contextmenu paste"
		    ],
		    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
		});
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
			$(document).on( "click", "#btnview", function(){
				var id = $(this).attr("data-id");
				$.ajax({
					url: "getpanelcontent",
			        type: "POST",
			        data: { id:id },
			        dataType: "json",
			        success: function(data)
			        {
			        	$('#myModalView').modal('toggle');
			        	$(".modal-bodyview").html(data.decoded);
			        }
				});
			});
			$(document).on( "click", "#btnedit", function(){
				var id = $(this).attr("data-id");
				var dataid = $(this).attr("data-id");
				$.ajax({
					url: "getpanelcontent",
			        type: "POST",
			        data: { id:id },
			        dataType: "json",
			        success: function(data)
			        {
						$('#myModalEdit').modal('toggle');
						$("#id").val(dataid);
						$("#panelname").val($("#panelnames"+id).text());
						tinyMCE.activeEditor.setContent(data.decoded);
						$("#err").html("");
			        }
				});
			});
			$(document).on( "click", "#btndelete", function(){
				var id = $(this).attr("data-id");
				var check = confirm("Are you sure you want to delete this panel?");
				if (check == true)
				{
					$.ajax({
						url: "removepanel",
				        type: "POST",
				        data: { id:id },
				        dataType: "json",
				        success: function(data)
				        {
							$("#panel"+id).fadeOut('slow');
				        }
					});
				}
			});
			$("#btnUpdate").click(function(){
				var id = $("#id").val();
				var name = $("#panelname").val();
				var content = tinyMCE.activeEditor.getContent();
				if (name == "" || content == "")
				{
					$("#err").html("<br/><div class='alert alert-warning errmess' role='alert'><center>Please enter the needed information.</center></div>");
				}
				else
				{
					$.ajax({
						url: "updatepanel",
				        type: "POST",
				        data: { 
				        	id:id,
				        	name:name,
				        	content:content
				        },
				        dataType: "json",
				        success: function(data)
				        {
							$("#panelnames"+id).html(data['name']);
							$("#err").html("<br/><div class='alert alert-success errmess' role='alert'><center>Panel details successfully updated.</center></div>");
				        }
					});
				}
			});
			$("#txtsearch").keyup(function(){
				var txtsearch = $(this).val();
				$.ajax({
					url: "searchpanel",
			        type: "POST",
			        data: { txtsearch:txtsearch },
			        dataType: "json",
			        success: function(data)
			        {
						$("tr").remove();
			        	$("tbody").append("<tr> <th>Panel Name</th> <th>Actions</th> </tr> ");
			        	for (var i = 0; i < data.length; i++)
			        	{
			        		$("tbody").append("<tr id="+data[i]['id']+"> <td id='panelnames"+data[i]['id']+"'>"+data[i]['panel_name']+"</td> <td> <input id='btnview' data-id="+data[i]['id']+" type='button' class='btn btn-sm btn-default' value='View Content' /> <input id='btnedit' data-name="+data[i]['panel_name']+" data-id="+data[i]['id']+" type='button' class='btn btn-sm btn-default' value='Edit' /> <input id='btndelete' data-id="+data[i]['id']+" type='button' class='btn btn-sm btn-danger' value='Remove' /> </td> </tr> ");
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
		<div class="modal fade" id="myModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document">
		    	<div class="modal-content">
		      		<div class="modal-header">
			        	<h5 class="modal-title" id="exampleModalLabel">Edit Panel</h5>
			        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          		<span aria-hidden="true">&times;</span>
			        	</button>
		      		</div>
		      		<div class="modal-body">
		        		<div class="row">
		        			<div class="col-sm-12">
		        				<input class="form-control" id="id" type="hidden"/>
		        				Panel Name
		        				<input id="panelname" type="text" class="form-control" />
		        			</div>
		        			<div class="col-sm-12">
		        				<br/>
		        				<textarea id="mytextarea">
						    	</textarea>
						    	<br/>
						    	<div id="err"></div>
		        			</div>
		        		</div>
			      	</div>
		      		<div class="modal-footer">
		      			<button id="btnUpdate" type="button" class="btn btn-success">Update Panel</button>
		        		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		      		</div>
		    	</div>
		  	</div>
		</div>
		<div class="modal fade" id="myModalView" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document">
		    	<div class="modal-content">
		      		<div class="modal-header">
			        	<h5 class="modal-title" id="exampleModalLabel"></h5>
			        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          		<span aria-hidden="true">&times;</span>
			        	</button>
		      		</div>
		      		<div class="modal-bodyview" style="padding:10px;">
		        		
			      	</div>
		      		<div class="modal-footer">
		        		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="#">Home</a></li>
				<li class="breadcrumb-item active">Panels</li>
			</ol>
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="form-inline">
							Search Panel: &nbsp;
							<input type="text" id="txtsearch" class="form-control" placeholder="..."/>
						</div>
						<br/>
					</div>
					<div class="col-sm-6">
						<a href="<?php echo base_url();?>cms/addnewpanel">
							<button class="btn btn-primary" style="float:right"> <i class="fa fa-clone" aria-hidden="true"></i> Add New Panel </button>
						</a>
					</div>
					<div class="col-sm-12">
						<table class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>Panel Name</th>
									<th>Actions</th>
								</tr>
							</thead>
							<tbody>
								<?php echo $panel_list; ?>
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
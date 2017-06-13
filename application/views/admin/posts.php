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
		<script src="<?php echo base_url(); ?>js/jquery-3.1.1.min.js"></script>
		<script src="<?php echo base_url(); ?>js/tether.min.js"></script>
		<script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
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
			$(document).on( "click", "#btnview", function(){
				$('#myModalView').modal('toggle');
				var id = $(this).attr("data-id");
				$.ajax({
					url: "retrievecontent",
			        type: "POST",
			        data: { id:id },
			        dataType: "json",
			        success: function(data)
			        {
			        	$(".modal-bodyview").html(data.decoded);
			        }
				});
			});
			$(document).on( "click", "#btnremove", function(){
				var check = confirm("Are you sure you want to delete this post?");
				var id = $(this).attr("data-id");
				if (check == true)
				{
					$.ajax({
						url: "removepost",
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
			$(document).on( "click", "#btnedit", function(){
				var id = $(this).attr("data-id");
				$('#myModalEdit').modal('toggle');
				$.ajax({
					url: "retrievecontent",
			        type: "POST",
			        data: { id:id },
			        dataType: "json",
			        success: function(data)
			        {
			        	$("#id").val(id);
			        	tinyMCE.activeEditor.setContent(data.decoded);
			        	$("#title").val($("#title"+id).text());
			        	$("#status").val($("#status"+id).html());
			        	$("#err").html("");
			        }
				});
			});
			$("#btnUpdate").click(function(){
				var id = $("#id").val();
				var title = $("#title").val();
				var content = tinyMCE.activeEditor.getContent();
				var status = $("#stat").val();
				if (title == "" || content == "")
				{
					$("#err").html("<br/><div class='alert alert-warning errmess' role='alert'><center>Please enter the needed information.</center></div>");
				}
				else
				{
					$.ajax({
						url: "updatepost",
				        type: "POST",
				        data: {
				        	id:id,
				        	title:title,
				        	content:content,
				        	status:status
				        },
				        dataType: "json",
				        success: function(data)
				        {
				        	$("#title"+id).html(data['title']);
				        	$("#status"+id).html(data['status']);
				        	$("#err").html("<br/><div class='alert alert-success errmess' role='alert'><center>Post details successfully updated.</center></div>");
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
			$("#searchtext").keyup(function(){
				var tosearch = $(this).val();
				var searchcategory = $("#searchcategory").val();
				$.ajax({
					url: "filtersearchpost",
			        type: "POST",
			        data: { 
			        	tosearch:tosearch,
			        	searchcategory:searchcategory
			        },
			        dataType: "json",
			        success: function(data)
			        {
			        	$("tr").remove();
			        	$("tbody").append("<tr> <th>Date</th> <th>Title</th> <th>Author</th> <th>Status</th> <th>Actions</th> </tr> ");
			        	for (var i = 0; i < data.length; i++)
			        	{
			        		$("tbody").append("<tr id=row"+data[i]['id']+"> <td>"+data[i]['date_posted']+"</td> <td id=title"+data[i]['id']+">"+data[i]['post_title']+"</td> <td>"+data[i]['author_name']+"</td> <td id=status"+data[i]['id']+">"+data[i]['post_status']+"</td> <td> <input data-id="+data[i]['id']+" type='button' id='btnview' value='View' class='btn btn-sm btn-default'/> &nbsp; <input data-id="+data[i]['id']+" id='btnedit' type='button' value='Edit' class='btn btn-sm btn-default'/> &nbsp; <input data-id="+data[i]['id']+" id='btnremove' type='button' value='Remove' class='btn btn-sm btn-danger'/> </td> </tr>");
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
			        	<h5 class="modal-title" id="exampleModalLabel">Edit Post</h5>
			        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          		<span aria-hidden="true">&times;</span>
			        	</button>
		      		</div>
		      		<div class="modal-body">
		        		<div class="row">
		        			<input id="id" type="hidden"/>
		        			<div class="col-sm-6">
		        				Title:
		        				<input id="title" type="text" class="form-control" />
		        			</div>
		        			<div class="col-sm-6">
		        				Status:
		        				<select id="stat" class="form-control">
		        					<option>Immediate</option>
		        					<option>Pending Post</option>
		        				</select>
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
		      			<button id="btnUpdate" type="button" class="btn btn-success">Update Post</button>
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
					<div class="active" class="sidelink">
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
					<div class="sidelink">
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
				<li class="breadcrumb-item active">Posts</li>
			</ol>
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="form-inline">
							Search by: &nbsp;
							<select id="searchcategory" class="form-control" placeholder="Search by...">
								<option>date_posted</option>
								<option>post_title</option>
								<option>author_name</option>
							</select> &nbsp;
							<input id="searchtext" type="text" class="form-control" placeholder="..."/>
						</div>
						<br/>
					</div>
					<div class="col-sm-6">
						<a href="<?php echo base_url();?>cms/addnewpost">
							<button class="btn btn-md btn-primary" style="float:right"> <i class="fa fa-plus-square" aria-hidden="true"></i> Add New Post </button>
						</a>
					</div>
					<div class="col-sm-12">
						<table class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>Date</th>
									<th>Title</th>
									<th>Author</th>
									<th>Status</th>
									<th>Actions</th>
								</tr>
							</thead>
							<tbody>
								<?php echo $post_list; ?>
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
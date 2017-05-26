<!DOCTYPE html>
<html>
	<!--Header Panel-->
	<head>
		<title>Web Name</title>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/pages_styles.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/font-awesome.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/font-awesome.min.css">
		<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
		<script src="<?php echo base_url(); ?>js/jquery-3.1.1.min.js"></script>
		<style type="text/css">
			body{
				background-image: url("<?php echo base_url(); ?>img/laptop.jpg");
				background-size: cover;
				background-repeat: no-repeat;
				background-position: fixed;
			}
		</style>
		<script type="text/javascript">
			
		</script>
	</head>
	<!--Header Panel End-->
	<body>
		<nav>
			<ul id="topnavbar">
				<a href="<?php echo base_url(); ?>index.php/cms/" class="topnavlist"><li>
					<i class="fa fa-home" aria-hidden="true"></i>
				</li></a>
				<a href="<?php echo base_url(); ?>index.php/blogs/" class="topnavlist"><li>
					<i class="fa fa-bookmark-o" aria-hidden="true"></i>
				</li></a>
				<a href="#" class="topnavlist"><li>
					<i class="fa fa-facebook-f" aria-hidden="true"></i>
				</li></a>
				<a href="#" class="topnavlist"><li>
					<i class="fa fa-twitter" aria-hidden="true"></i>
				</li></a>
			</ul>
		</nav>
		<div class="container text-center title">
			<!-- Loaded Site Name -->
			Site Name
			<!-- Loaded Site Name End -->
		</div>
		<br/><br/><br/>
		<!-- About Panel -->
		<div class="jumbotron" style="border-radius:0;background-color:white;">
			<div class="container">
				<h3>
					<i class="fa fa-info-circle" aria-hidden="true"></i> About
				</h3>
			  	<p>
			  		Sample site description site description site description site description
			  		site description site description site description site description
			  		site description site description site description site description
			  		site description site description site description site description
			  		site description site description site description site description
			  		site description site description site description site description
			  		site description site description site description site description
			  		site description site description site description site description
			  	</p>
			  	<p class="lead">
			    	<a class="btn btn-primary" href="#">Learn more</a>
			  	</p>
			</div>
		</div>
		<!-- About Panel End -->
		<!-- Contact Form -->
		<div class="container">
			<h3 style="color:white;">
				<i class="fa fa-envelope-open-o" aria-hidden="true"></i> Contact<br/>
			</h3>
			<div class="row">
				<div class="col-sm-6" style="color:white;">
					Email address:
					<input type="text" class="form-control" placeholder="sample@example.com"/>
				</div>
				<div class="col-sm-6" style="color:white;">
					Your name:
					<input type="text" class="form-control" placeholder="Surname, Firstname">
				</div>
				<div class="col-sm-12" style="color:white;">
					Message:
					<textarea class="form-control" style="height:150px;">
						
					</textarea>
				</div>
			</div>
		</div>
		<br/><br/>
		<!-- Contact Form End -->
		<!-- Footer Panel -->
		<footer>
			Footer
		</footer>
		<br/>
		<!-- Footer Panel End -->
	</body>
</html>
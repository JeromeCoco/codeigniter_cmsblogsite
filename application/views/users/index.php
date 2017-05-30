<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/navbar.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/index-style.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/footer.css">
		<link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">
		<style>
			body{
				background-image: url("<?php echo base_url(); ?>/img/cat.png");
				background-size: 100%;
				background-attachment: fixed;
				background-repeat: no-repeat;
			}
		</style>
	</head>
	<body>
		<!-- {Navbar} -->
		<nav>
			<ul id="navbar">
				<a class="navbar-link" href="<?php echo base_url(); ?>index.php/main/"><li>Home</li></a>
				<a class="navbar-link" href="<?php echo base_url(); ?>index.php/main/bloglist"><li>Blogs</li></a>
			</ul>
		</nav>
		<div id="sitename">
			writer
		</div>
		<div class="wrapper">
			<div class="jumbotron jumbotron-fluid sec">
	  			<div class="container">
	  				{About}
	  				<h2>About Us</h2>
					<br/>
					<div class="row">
						<div class="col-sm-4">
							<img class="icons" src="<?php echo base_url();?>/img/monitor.png">
							<br/>
							Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
							Nunc gravida vitae ante sit amet sollicitudin. Nullam 
							bibendum eget nisi sit amet suscipit. Phasellus eu tristique sem.
						</div>
						<div class="col-sm-4">
							<img class="icons" src="<?php echo base_url();?>/img/blogging.png">
							<br/>
							Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
							Nunc gravida vitae ante sit amet sollicitudin. Nullam 
							bibendum eget nisi sit amet suscipit. Phasellus eu tristique sem. 
						</div>
						<div class="col-sm-4">
							<img class="icons" src="<?php echo base_url();?>/img/reading-glasses.png">
							<br/>
							Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
							Nunc gravida vitae ante sit amet sollicitudin. Nullam 
							bibendum eget nisi sit amet suscipit. Phasellus eu tristique sem. 
						</div>
					</div>
		    		{Location}
		    		<div class="row">
						<div class="col-sm-12">
							<br/>
							<h2>Visit Our Location</h2>
							<br/>
						</div>
						<div class="col-sm-12">
							<div id="googleMap" style="width:100%;height:400px;"></div>
							<script>
								function myMap() {
									var mapProp= {
									    center:new google.maps.LatLng(51.508742,-0.120850),
									    zoom:5,
									};
									var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
								}
							</script>
							<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY&callback=myMap"></script>
						</div>
					</div>
		    		{Contact}
		    		<div class="row">
						<div class="col-sm-12">
							<br/>
							<h2>Contact Us</h2>
							<br/>
						</div>
						<div class="col-sm-4">
							Your Name
							<input type="text" class="form-control" placeholder="Full Name..."/>
							<br/>
							Email Address
							<input type="text" class="form-control" placeholder="sample@example.com..."/>
						</div>
						<div class="col-sm-8">
							Message
							<textarea style="width:100%;height:122px;" class="form-control"></textarea>
							<br/>
							<input style="float:right;" type="button" class="btn btn-primary" value="Send Message"/>
						</div>
					</div>

	  			</div>
			</div>
		</div>
		<footer>
			<!--{Footer}-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<br/>
						<h4>More About Writer</h4>
						Lorem ipsum dolor sit amet, consectetur adipiscing elit.
						Donec tincidunt nibh eu diam malesuada tempus vel nec velit.
						Suspendisse potenti.
					</div>
					<div class="col-sm-4">
						<br/>
						<h4>Visit Our Pages</h4><br/>
						<img class="iconfoot" src="<?php echo base_url(); ?>/img/facebook.png">&nbsp;
						<img class="iconfoot" src="<?php echo base_url(); ?>/img/twitter.png">&nbsp;
						<img class="iconfoot" src="<?php echo base_url(); ?>/img/gmail.png">&nbsp;
						<img class="iconfoot" src="<?php echo base_url(); ?>/img/instagram.png">&nbsp;
						<img class="iconfoot" src="<?php echo base_url(); ?>/img/youtube.png">
					</div>
					<div class="col-sm-4">
						<br/>
						<h4>Writer <?php echo date("Y");?> &copy;</h4>
						All rights reserved.
					</div>
				</div>
			</div>
		</footer>
	</body>
</html>
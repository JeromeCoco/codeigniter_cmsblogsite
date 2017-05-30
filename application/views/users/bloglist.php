<!DOCTYPE html>
<html>
	<head>
		<!-- {Header} -->
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/navbar.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/bloglist-style.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/footer.css">
		<link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">
	</head>
	<body>
		<!-- {Navbar} -->
		<nav>
			<ul id="navbar">
				<a class="navbar-link" href="<?php echo base_url(); ?>index.php/main/"><li>Home</li></a>
				<a class="navbar-link" href="<?php echo base_url(); ?>index.php/main/bloglist"><li>Blogs</li></a>
			</ul>
		</nav>
		<div class="wrapper">
			<div class="container">
	  			<!-- {BlogsList} -->
	  			<div id="listheader">
	  				Welcome to writer! Read some blogs...
	  			</div>
	  			<div class="row">
	  				<div class="col-sm-6">
	  					<div class="blogtitle">Sample Title</div>
	  					<div class="blogdate"><?php echo date("m/d/Y"); ?> | <?php echo date("g:i A"); ?></div>
	  					<div class="blogcontent">
	  						Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque aliquet venenatis magna, nec lobortis purus eleifend quis. Aenean ornare lacus diam. Proin id dolor dui. In hac habitasse platea dictumst. Nunc nec magna in quam tincidunt tempor eu sed tellus. Vestibulum sit amet eros sem. Aliquam quis ligula vel sapien pharetra dapibus sed sit amet purus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. In ut erat ipsum. Sed tincidunt ipsum nec arcu condimentum faucibus tempor et libero. Suspendisse laoreet pretium tellus at dignissim. Donec quis sapien venenatis felis fermentum pretium at sit amet mauris. Aliquam erat volutpat.
	  					</div>
	  				</div>
	  				<div class="col-sm-6">
	  					<div class="blogtitle">Sample Title</div>
	  					<div class="blogdate"><?php echo date("m/d/Y"); ?> | <?php echo date("g:i A"); ?></div>
	  					<div class="blogcontent">
	  						Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque aliquet venenatis magna, nec lobortis purus eleifend quis. Aenean ornare lacus diam. Proin id dolor dui. In hac habitasse platea dictumst. Nunc nec magna in quam tincidunt tempor eu sed tellus. Vestibulum sit amet eros sem. Aliquam quis ligula vel sapien pharetra dapibus sed sit amet purus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. In ut erat ipsum. Sed tincidunt ipsum nec arcu condimentum faucibus tempor et libero. Suspendisse laoreet pretium tellus at dignissim. Donec quis sapien venenatis felis fermentum pretium at sit amet mauris. Aliquam erat volutpat.
	  					</div>
	  				</div>
	  				<div class="col-sm-6">
	  					<div class="blogtitle">Sample Title</div>
	  					<div class="blogdate"><?php echo date("m/d/Y"); ?> | <?php echo date("g:i A"); ?></div>
	  					<div class="blogcontent">
	  						Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque aliquet venenatis magna, nec lobortis purus eleifend quis. Aenean ornare lacus diam. Proin id dolor dui. In hac habitasse platea dictumst. Nunc nec magna in quam tincidunt tempor eu sed tellus. Vestibulum sit amet eros sem. Aliquam quis ligula vel sapien pharetra dapibus sed sit amet purus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. In ut erat ipsum. Sed tincidunt ipsum nec arcu condimentum faucibus tempor et libero. Suspendisse laoreet pretium tellus at dignissim. Donec quis sapien venenatis felis fermentum pretium at sit amet mauris. Aliquam erat volutpat.
	  					</div>
	  				</div>
	  				<div class="col-sm-6">
	  					<div class="blogtitle">Sample Title</div>
	  					<div class="blogdate"><?php echo date("m/d/Y"); ?> | <?php echo date("g:i A"); ?></div>
	  					<div class="blogcontent">
	  						Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque aliquet venenatis magna, nec lobortis purus eleifend quis. Aenean ornare lacus diam. Proin id dolor dui. In hac habitasse platea dictumst. Nunc nec magna in quam tincidunt tempor eu sed tellus. Vestibulum sit amet eros sem. Aliquam quis ligula vel sapien pharetra dapibus sed sit amet purus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. In ut erat ipsum. Sed tincidunt ipsum nec arcu condimentum faucibus tempor et libero. Suspendisse laoreet pretium tellus at dignissim. Donec quis sapien venenatis felis fermentum pretium at sit amet mauris. Aliquam erat volutpat.
	  					</div>
	  				</div>
	  			</div>
	  		</div>
	  	</div>
		<!-- {Footer} -->
		<footer>
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
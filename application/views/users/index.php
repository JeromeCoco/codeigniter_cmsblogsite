<!DOCTYPE html>
<html>
	<head>
		{Header}
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
		{Navbar}
		<div id="sitename">
			writer
		</div>
		<div class="wrapper">
			<div class="jumbotron jumbotron-fluid sec">
	  			<div class="container">
	  				{About}
		    		{Location}
		    		{Contact}
	  			</div>
			</div>
		</div>
		{Footer}
	</body>
</html>
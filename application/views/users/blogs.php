<!DOCTYPE html>
<html>
	<head>
		<title>writer</title>
		<script src="https://npmcdn.com/tether@1.2.4/dist/js/tether.min.js"></script>
		{Header}
		<link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">
	</head>
	<body>
		{Navbar}
		<div id="sitename">
			writer
		</div>
		<div class="wrapper">
  			<div class="container">
				<div class="row">
					<?php echo $bloglisting; ?>
				</div>
  			</div>
		</div>
		{Footer}
	</body>
</html>
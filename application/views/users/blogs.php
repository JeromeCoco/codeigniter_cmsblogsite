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
				<br/><br/>
				<?php
					if (isset($title)) {
						echo "<br/><h3>".$title."</h3><hr/>";
					}
					if (isset($date)) {
						echo $date ." | ". $time ."<br/><br/>";
					}
					if (isset($content)) {
						echo $content;
					}
					if (isset($author)) {
						echo "<br/><i>-".$author."</i><br/>";
					}
					if (isset($bloglisting)) {
						echo "<div class='row'>".$bloglisting."</div>";
					}
				?>
  			</div>
		</div>
		{Footer}
	</body>
</html>
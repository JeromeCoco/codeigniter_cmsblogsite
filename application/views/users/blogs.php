<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>writer</title>
		{Header}
		<script type="text/javascript">
			$(document).ready(function(){
				$("#btncomment").click(function(){
					var postid = $("#postid").val();
					var author = $("#author").val();
					var comment = $("#comment").val();
					$("#error").html("");
					if (author == "" || comment == "") 
					{
						$("#error").html("<span style='color:red'>Please enter valid information...</span>");
					}
					else
					{
						$.ajax({
							url: "../addcomment",
					        type: "POST",
					        data: { 
					        	postid:postid,
					        	author:author,
					        	comment:comment
					        },
					        dataType: "json",
					        success: function(data)
					        {
					        	$("#error").html("<span style='color:green'>Your comment was successfully posted...</span>");
					        	$("#commsection").before("<div style='border:1px solid black;background-color:#ecf0f1;padding:10px;border-radius:3px;'>"+"<i>"+comment+"</i>"+ "<br/>"+"by "+author+ "</div> <br/> ");
					        }
						});
					}
				});
			});
		</script>
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
						echo "<input type='hidden' value='$id' id='postid'>";
						echo "<br/><h3><i>'".$title."'</i></h3><hr/>";
					}
					if (isset($date)) {
						echo $date ." | ". $time ."<br/><br/>";
					}
					if (isset($content)) {
						echo $content;
					}
					if (isset($author)) {
						echo "<br/><i>-".$author."</i><br/>";
						echo "
							<hr/>
							<h5>Add a comment...</h5>
							<div class='row'>
								<div class='col-sm-5'>
									<span id='error'></span>
									<input type='text' id='author' class='form-control' placeholder='Your name...'/><br/>
								</div>
								<div class='col-sm-12'>
									<textarea style='height:100px;resize:none;' id='comment' class='form-control' placeholder='Write your ideas here...'></textarea>
									<br/>
									<input id='btncomment' type='button' class='btn btn-md btn-success' value='Post'/>
									<br/><br/>
								</div>
							</div>
						";
					}
					if (isset($bloglisting)) {
						echo "<div class='row'>".$bloglisting."</div>";
					}
					echo "<h3>Comments</h3><hr/>";
					if (isset($comments)) {
						echo "<div id='commsection'>";
						for ($i = 0; $i < count($comments); $i++) {
							echo "
								<div style='border:1px solid black;background-color:#ecf0f1;padding:10px;border-radius:3px;'>"
									."<i>".$comments[$i]->comment_content."</i>".
								"<br/>"
									."by ".$comments[$i]->comment_author.
								"</div>
								<br/>";
						}
						echo "</div>";
					}
				?>
  			</div>
		</div>
		{Footer}
	</body>
</html>
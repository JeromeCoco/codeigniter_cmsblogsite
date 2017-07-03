$(document).ready(function(){
	$("#btncomment").click(function(){
		var postid = $("#postid").val();
		var author = $("#author").val();
		var comment = $("#comment").val();
		$.ajax({
			url: "addcomment",
	        type: "POST",
	        data: { },
	        dataType: "json",
	        success: function(data)
	        {
	        	console.log(data);
	        }
		});
	});
});
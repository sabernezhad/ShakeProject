 $(document).ready(function () {
	 $('#signouttab').click(function() {
			$.ajax({
				type : "POST",
				url : "index.php?task=logout",
				cache : false,
				success : function(c) {
					window.location="index.php";

				}
			})

		}); 
	 
	 $('#profiletab').click(function() {
			$.ajax({
				type : "POST",
				url : "index.php?task=profile",
				cache : false,
				success : function(c) {
					

				}
			})

		}); 
	 $('#profilefooter').click(function() {
			$.ajax({
				type : "POST",
				url : "index.php?task=profile",
				cache : false,
				success : function(c) {
					

				}
			})

		}); 
	 
	 $('#signoutfooter').click(function() {
			$.ajax({
				type : "POST",
				url : "index.php?task=logout",
				cache : false,
				success : function(c) {
					window.location="index.php";

				}
			})

		});  
	 $('#btnShare').click(function() {
		 var a=$('#txtShareBody').val();
		 var b="content="+a;
		 $.ajax({
				type : "POST",
				url : "index.php?task=share_new",
				data : b,
				cache : false,
				success : function(c) {
					$(c).insertBefore('#post');

				}
			})

		}); 
 });
 function fivelastpost(lastid){
	 var b="lastpostid="+lastid;
	 $.ajax({
			type : "POST",
			url : "index.php?task=showfivepost",
			data : b,
			cache : false,
			success : function(c) {
				
				$("#recent-post").append(c);

			}
		});
	}
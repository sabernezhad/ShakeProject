
$(document).ready(function () {
	 $('#aboutpage').click(function() {
				$.ajax({
					type : "POST",
					url : "index.php?task=aboutpage",
					cache : false,
					success : function(c) {
						$("#body").html(c).show();

					}
				})

			}); 
	 $('#contactuspage').click(function() {
			$.ajax({
				type : "POST",
				url : "index.php?task=contactuspage",
				cache : false,
				success : function(c) {
					$("#body").html(c).show();

				}
			})

		});
	 $('#helppage').click(function() {
			$.ajax({
				type : "POST",
				url : "index.php?task=helppage", 
				cache : false,
				success : function(c) {
					$("#body").html(c).show();

				}
			})

		});
	 $('#aboutpage1').click(function() {
			$.ajax({
				type : "POST",
				url : "index.php?task=aboutpage",
				cache : false,
				success : function(c) {
					$("#body").html(c).show();

				}
			})

		}); 
$('#contactuspage1').click(function() {
		$.ajax({
			type : "POST",
			url : "index.php?task=contactuspage",
			cache : false,
			success : function(c) {
				$("#body").html(c).show();

			}
		})

	});
$('#helppage1').click(function() {
		$.ajax({
			type : "POST",
			url : "index.php?task=helppage", 
			cache : false,
			success : function(c) {
				$("#body").html(c).show();

			}
		})

	});
	 $('#loginpage').click(function() {
			$.ajax({
				type : "POST",
				url : "index.php?task=loginpage", 
				cache : false,
				success : function(c) {
					$("#allogin").html(c).show();

				}
			})

		});
	 $('#LoginPic a').click(function(){
        		var a= $('#LUserField').val();
        		var b= $('#LPassField').val();
        		var d= $('#remember').val();
    			var c= "username="+a+"&password="+b+"&remember"+d;
    				$.ajax({
    					type: "POST",
    					url: "index.php?task=login",
    					data : c,
    					cache: false,
    					success: function(c){
    						if(c==true)
    							{
    								window.location="index.php";    								
    							}
    						else
    							{
    								$("#display").html(c).show();
    							}
    						}
    					})
    				
    			return false
    			
        		});
    
	
	 
        	$('#shift a').click(function(){
        		var a= $('#UserField').val();
        		var b= $('#PassField').val();
        		var c= $('#ConField').val();
        		var d= $('#usertypeselect').val();
        		if (d=="Employee")
        			{
        				var e= $('#FirstNameField1').val();
        				var f= $('#LastNameField1').val();
        				var g= $('#BirthdayField1').val();
        				var h= $('#gender').val();
        				var i= $('#TelField1').val();
        				var j= $('#JobField1').val();
        				var k= $('#EmailField1').val();
        				var l= $('#OrgField1').val();
        				var m= $('#OrgCityField').val();
        				var z= "username="+a+"&password="+b+"&confirmPassword="+c+"&usertype="+d+"&FirstName="+e+"&lastName="+f
        				+"&birthday="+g+"&gender="+h+"&tel="+i+"&job="+j+"&email="+k+"&organization="+l+"&organizationCity="+m;
        			}
    				$.ajax({
    					type: "POST",
    					url: "index.php?task=register",
    					data : z,
    					cache: false,
    					success: function(c){
    						if(c==true)
    							{
    							$("#displayRegister").html(c).show();   								
    							}
    						else
    							{
    								$("#displayRegister").html(c).show();
    							}
    						}
    					})    				
    			 			
        		});



             $("#menu a").hover(function () {
                $(this).animate({ "background-color": "#c2e404", "box-shadow": "-1px -1px 5px #888888", "color": "#f7fbde" }
				,{duration: 'slow', easing: 'easeOutElastic', queue: false}
				);
            }, function () {
                $(this).animate({ "background-color": "#1f1f1f", "box-shadow": "0px 0px 0px 0px black", "color": "#b9da03" }
				,{duration:'slow', easing: 'easeOutCirc', queue:false});
            });
			
			
			
			$('.shiftsignup').click(function(){
				
				$('#signup').animate({
					border: 'none',
					height: 0,
					marginBottom: 0,
					marginTop: '-6px',
					opacity: 0,
					paddingBottom: 0,
					paddingTop: 0,
					queue: false
					}, 1000, function() {
					$(this).hide();
					});
				$('#login').animate({
					border: 'none',
					height: 0,
					marginBottom: 0,
					marginTop: '-6px',
					opacity: 0,
					paddingBottom: 0,
					paddingTop: 0,
					queue: false
					}, 1000, function() {
					$(this).hide();
					});
					
					
					var x='div #'+$("#usertypeselect option:selected").attr('id')
					
					//var x='#'+$('#usertypeselect').attr('id');
					//$(x).hide();
					$(x).show();
				
			});
			
			$('.shiftEmployerRegistration').click(function(){
				
				$('div #EmployerRegistrationFinish').animate({
					border: 'none',
					height: 0,
					marginBottom: 0,
					marginTop: '-6px',
					opacity: 0,
					paddingBottom: 0,
					paddingTop: 0,
					queue: false
					}, 1000, function() {
					$(this).hide();
					});
				$('div #EmployerRegistration').show();
			});
			
			$('.shiftLookingForJob').click(function(){
				
				$('div #LookingForJob').animate({
					border: 'none',
					height: 0,
					marginBottom: 0,
					marginTop: '-6px',
					opacity: 0,
					paddingBottom: 0,
					paddingTop: 0,
					queue: false
					}, 1000, function() {
					$(this).hide();
					});
				$('div #LookingForJobFini').show();
			});
			
			$('#logo')
			.effect('shake', {times:3}, 200);



			
			
        });
function runScriptLogin(e) {
    if (e.keyCode == 13) {
            
        var a= $('#LUserField').val();
       	var b= $('#LPassField').val();
       	var d= $('#remember').val();
       		var c= "username="+a+"&password="+b+"&remember="+d;
       			
       		$.ajax({
       				type: "POST",
       				url: "index.php?task=login",
       				data : c,
       				cache: false,
       				success: function(c){
       					if(c==true)
       						{
       							window.location="index.php";    								
       						}
       					else
       						{
       							$("#display").html(c).show();
       						}
       					}
       				})
       			
       		return false
       		
       
    }
}



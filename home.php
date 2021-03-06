<?php 
	session_start();
	
	//checks if the session isn't set and if it isn't redirects the user to the login page 
	if(!$_SESSION['uSer'])
	{
		header("location: login.php");
	}
?>

<html>
	<head>
		<meta charset="UTF-8">

		<link rel="stylesheet" type="text/css" href="style.css">

		<link href="libraries/bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">

		<script language="javascript" type="text/javascript" src="libraries/p5/p5.js"></script>
	  
	  	<script language="javascript" type="text/javascript" src="libraries/jquery-3.1.1/jquery-3.1.1.js"></script>
		<!-- uncomment lines below to include extra p5 libraries -->
		<!--<script language="javascript" src="libraries/p5.dom.js"></script>-->
		<!--<script language="javascript" src="libraries/p5.sound.js"></script>-->
		  
		<!-- this line removes any default padding and style. you might only need one of these values set. -->
		<style> body {padding: 0; margin: 0;} </style>
	</head>

	<body>
		<script src="libraries/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>

		<!-- class="table table-hover table-striped table-vcenter" -->
		<table border="1px">
			<!-- LOGO -->
			<tr style='height: auto; width: auto; max-width: 80vw; max-height: 35vh;'>
				<td colspan="3">
					<!--CODE: height: auto; width: auto; max-width: 300px; max-height: 300px; 
					SOURCE: http://stackoverflow.com/questions/787839/resize-image-proportionally-with-css-->
					
					<!--CODE: max-height: 40vh; 
					EXPLANATION: vh - Viewport Height, resizes to the current screen height 
					SOURCE: http://stackoverflow.com/questions/1575141/make-div-100-height-of-browser-window-->
					<img src="images/logo.png" style='height: auto; width: auto; max-width: 80vw; max-height: 35vh;'>
				</td>
			</tr>

			<!-- SOLO -->
			<tr>

				<td style='margin-right: 1px; height: auto; width: 20%; min-width: 20%; max-width: 21vw; max-height: 20vh;'>
					<!-- align="right" -->
					<img src="images/empty.png" id="solo_left_cell_image" style='margin-right: 1px; height: auto; width: 20%; min-width: 20%; max-width: 21vw; max-height: 20vh;'>
				</td>
				
				<td style='height: auto; width: 60%; min-width: 60%; max-width: 61vw; max-height: 20vh;'>
					<form action="index.html" method="post">
						<button type="submit" id="solo" name="solo_btn" style='height: auto; width: 100%; min-width: 100%; max-width: 61vw; max-height: 20vh;'>
							<img src="images/solo.png" style='height: auto; width: 60%; min-width: 60%; max-width: 61vw; max-height: 20vh;'>
						</button>
					</form>
				</td>
				
				<td style='margin-left: 1px; height: auto; width: 20%; min-width: 20%; max-width: 21vw; max-height: 20vh;'>
					<!-- align="left" -->
					<img src="images/empty.png" id="solo_right_cell_image" style='margin-left: 1px; height: auto; width: 20%; min-width: 20%; max-width: 21vw; max-height: 20vh;'>
				</td>
			</tr>

			<!-- DUO -->
			<tr>
				<td style='margin-right: 1px; height: auto; width: 20%; min-width:  20%; max-width: 21vw; max-height: 20vh;'>
					<img src="images/empty.png" id="duo_left_cell_image" style='margin-right: 1px; height: auto; width: 20%; min-width:  20%; max-width: 21vw; max-height: 20vh;'>

				</td>
				
				<td style='height: auto; width: 60%; min-width: 60%; max-width: 61vw; max-height: 20vh;'>
					<form action="index.html" method="post">
						<button type="submit" id="duo" name="duo_btn" style='height: auto; width: 100%; min-width: 60%; max-width: 61vw; max-height: 20vh;'>
							<img src="images/duo.png" style='height: auto; width: 60%; min-width: 60%; max-width: 61vw; max-height: 20vh;'>
						</button>
					</form>
				</td>
				
				<td style='margin-right: 1px; height: auto; width: 20%; min-width: 20%; max-width: 21vw; max-height: 20vh;'>
					<img src="images/empty.png" id="duo_right_cell_image" style='margin-right: 1px; height: auto; width: 20%; min-width: 20%; max-width: 21vw; max-height: 20vh;'>
					
				</td>
			</tr>

			<!-- MULTI -->
			<tr>
				<td style='margin-right: 1px; height: auto; width: 20%; min-width: 20%; max-width: 21vw; max-height: 20vh;'>
					<img src="images/empty.png" id="multi_left_cell_image" style='margin-right: 1px; height: auto; width: 20%; min-width: 20%; max-width: 21vw; max-height: 20vh;'>
				</td>
				
				<td style='height: auto; width: 60%; min-width: 60%; max-width: 61vw; max-height: 20vh;'>
					<form action="index.html" method="post">
						<button type="submit" id="multi" name="multi_btn" style='height: auto; width: 100%; min-width: 60%; max-width: 61vw; max-height: 20vh;'>
							<img src="images/multi.png" style='height: auto; width: 60%; min-width: 60%; max-width: 61vw; max-height: 20vh;'>
						</button>
					</form>
				</td>
				
				<td style='margin-right: 1px; height: auto; width: 20%; min-width: 20%; max-width: 21vw; max-height: 20vh;'>
					<img src="images/empty.png" id="multi_right_cell_image" style='margin-right: 1px; height: auto; width: 20%; min-width: 20%; max-width: 21vw; max-height: 20vh;'>
				</td>
			</tr>
		</table>	
		
		<!-- http://stackoverflow.com/questions/540349/change-the-image-source-on-rollover-using-jquery -->
		<script>
			alert("test");
			$("button").hover(
			  	function() {
			  		var btn_id = $(this).attr('id');
			  		var left_image_id = btn_id + "_left_cell_image";
			  		var right_image_id = btn_id + "_right_cell_image";

				    var left_image_src = "images/" + btn_id + "_left_arrow.png";
					var right_image_src = "images/" + btn_id + "_right_arrow.png";

					$("#" + left_image_id).attr("src", left_image_src);
					$("#" + right_image_id).attr("src", right_image_src);
				}
			);
			 
			$("button").mouseout(
				function() {
					var btn_id = $(this).attr('id');
			  		var left_image_id = btn_id + "_left_cell_image";
			  		var right_image_id = btn_id + "_right_cell_image";

					var left_image_src = "images/empty.png";
					var right_image_src = "images/empty.png";
					
					$("#" + left_image_id).attr("src", left_image_src);
					$("#" + right_image_id).attr("src", right_image_src);
				}
			);
		</script>
		 
	</body>
</html>
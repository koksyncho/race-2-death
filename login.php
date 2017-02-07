<?php 
	//starting the session
	session_start();

	//we put the connection on top so it doesn't give us the undefined(password and username) variables when we first enter
	mysql_connect("localhost", "root", "");
	mysql_select_db("users_db");
	
	if(isset($_POST['login']))
	{
		$password=$_POST['pAssword'];
		$username=$_POST['nAme'];
		$check_user="SELECT * FROM users WHERE user_password='$password' AND user_name='$username'";
		
		$run=mysql_query($check_user);
		
		if(mysql_num_rows($run)>0)
		{
			//we are saving the username in the session(for a limited time)
			$_SESSION['uSer']=$username;
			//echo "<script>window.open('home.php', '_self')</script>";
			//the 'header('location: home.php');' function replaces the 'echo "<script>window.open('home.php', '_self')</script>"'; function
			header('location: home.php');
			//stops the rest of the program
			die();
		}
		
		else
		{
			echo "<script>alert('Incorrect username and/or password!')</script>";	
		}
	}
	
?>

<html>
	<!--"login" is a noun "log in" is a verb-->
	<head>
		<title> Login Page </title>
	</head>
<style type='text/css'>
	body
	{
		/* background:url('login_background.png'); */
	}	
</style>	
<body>
	<!--making a registration form and putting it into a table--> 
	<form method='post' action='login.php'>
		<table width='400' border='5' align='center' bgcolor='#C4D8E2'>
			<tr>
				<!--colspan='5' enlarges the cell enough to cover 5(in this case) cells-->
				<td colspan='5' align='center' > <h2> Login form </h2> </td>
			</tr>
			
			<tr>
				<td align='center'> Username: </td>
				<td> <input type='text' style="width: 100%;" name='nAme' /> </td>
			</tr>
			
			<tr>
				<td align='center'> Password: </td>
				<!--type='password' doesn't let you see what you type-->
				<td> <input type='password' style="width: 100%;" name='pAssword' /> </td>
			</tr>
			
			<tr>
				<td colspan='5' align='center'> <input type='submit' style="color: black; background-color: #8CBED6;" name='login' value='Log in' /> </td>
			</tr>
	
	</form>
	<center> <font color='lightblue' size='4'> Don't have an account? </font> <br> Sign up <a href='registration.php'>here</a>. </center> 
	<!--the command &nbsp adds a space to the html text--> 
	<!--apparently the spaces that you put into the "link" in the <a href=''> "link" </a> command actually extend the field of the link even if only by a little-->
	
</body>
</html>


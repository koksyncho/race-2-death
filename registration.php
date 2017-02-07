<?php
	session_start();
?>

<html>
	<head>
		<title> Registration Form </title>
	</head>

<style type="text/css">
	body
	{
		<!-- background:url('registration_background.jpg'); -->
	}
</style>	
<body>
	<!--making a registration form and putting it into a table--> 
	<form method='post' action='registration.php'>
		<table width='400' border='5' align='center' bgcolor='#C4D8E2'>
			<tr>
				<!--colspan='5' combines cells-->
				<td colspan='5' align='center' > <h2> Registration form: </h2> </td>
			</tr>
			
			<tr>
				<td align='center'> Username: </td>
				<td> <input type='text' style="width: 100%;" name='uSername' /> </td>
			</tr>	
			
			<tr>
				<td align='center'> Password: </td>
				<!--type='password' doesn't let you see what you type-->
				<td> <input type='password' style="width: 100%;" name='pAssword' /> </td>
			</tr>
			
			<tr>
				<td align='center'> Email: </td>
				<td> <input type='text' style="width: 100%;" name='email' /> </td>
			</tr>
			
			<tr>
				<td colspan='5' align='center'> <input type='submit' style="color: black; background-color: #8CBED6;" name='sUbmit' value='Sign up' /> </td>
			</tr>
	
	</form>
	<center> <font color='lightblue' size='4'> Have an account? </font> <br> <a href='login.php'> Login </a> </center>
</body>
</html>

<?php 
	//making the connection 
	mysql_connect("localhost", "root", "");
	//selecting a specific database
	mysql_select_db("users_db");
	
	//we check if the submit button with the name "sUbmit" has been pressed
	if(isset($_POST['sUbmit']))
	{
		//we make some variables in order to check the entered information
		$user_name=$_POST['uSername'];
		$user_pass=$_POST['pAssword'];
		$user_email=$_POST['email'];
		
		if($user_name=='')
		{
			//a javascript alert
			echo "<script> alert('Please enter your username!') </script>";
			//don't execute the rest if that happens so we get only one message at one time if any 
			exit();
		}	
		
		if($user_pass=='')
		{
			echo "<script> alert('Please enter your password!') </script>";
			exit();
		}
		
		if($user_email=='')
		{
			echo "<script> alert('Please enter your email!') </script>";
			exit();
		}
		
		//we gather all the emails in the user table in the users_db
		$check_email="SELECT * FROM users WHERE user_email='$user_email'";
		//we assign the $check_email variable to the $run one
		$run_email=mysql_query($check_email);
		
		//we check if there is more than 0 rows (meaning 1) with the same email
		//if so we alert the user and stop the program
		if(mysql_num_rows($run_email)>0)
		{
			echo "<script>alert('Email $user_email already exists in our database!')</script>";
			exit();	
		}	
		
		$check_user="SELECT * FROM users WHERE user_name='$user_name'";
		$run_user=mysql_query($check_user);
		if(mysql_num_rows($run_user)>0)
		{
			echo "<script> alert('The user $user_name already exists in our database!')</script>";
			exit();	
		}	
		
		$check_pass="SELECT * FROM users WHERE user_password='$user_pass'";
		$run_pass=mysql_query($check_pass);
		if(mysql_num_rows($run_pass)>0)
		{
			echo "<script> alert('The password already exists in our database!')</script>";
			exit();	
		}	
		
		//we add the values of the variables which we declared in the beginning of the php code
		//then we insert them into the appropriate columns of our users table with the mysql function assigned to the variable query  
		$query="INSERT INTO users (user_name, user_password, user_email, won) VALUES ('$user_name', '$user_pass', '$user_email', '0')";
		if(mysql_query($query))
		{
			$_SESSION['uSer']=$user_name;
			//we want to be redirected to the main page after a successful registration so a simple alert won't do 
			//echo "<script>alert('Registration successful!')</script>"; 
			echo "<script>window.open('home.php', '_self')</script>";
			//"_self" means that the target(home.php) will be opened in the same window
		}
	}
?>
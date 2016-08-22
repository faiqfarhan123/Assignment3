<?php
//include config file
include('config/config.php');
//session start
session_start();


if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      $myemail = @mysqli_real_escape_string($dbc,$_POST['email']);
      $myusername = @mysqli_real_escape_string($dbc,$_POST['username']);
      $mypassword = @mysqli_real_escape_string($dbc,$_POST['password']); 
      
	  
      $query2 = "INSERT INTO users (username, password, email) VALUES ('".$myusername."','".$mypassword."','".$myemail."')";
	  
	  $result2 = @mysqli_query($dbc,$query2);
		//making a session variable
         $_SESSION['login_user'] = $myusername;
		 //if user is redirected, then send to redirected page else send to index.php
		 if (isset($_SESSION['redirect_URL'])) {
			 header("Location: " . $_SESSION['redirect_URL']);
		 } else {
			header("location: index.php");
		 }
   }
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="login.css">
</head>

<body>
	
<div id="main" style = "margin-left: 420px">
	<h1 style = "margin-left: 100px">Sign Up Form</h1>
	<div id="login">
	<h2>Login Form</h2>
		<form action="" method="post">
			<label>Email :</label>
			<input id="email" name="email" placeholder="" type="text">			
			<label>UserName :</label>
			<input id="username" name="username" placeholder="" type="text">
			<label>Password :</label>
			<input id="password" name="password" placeholder="" type="password">
			<input name="submit" type="submit" value=" Sign up ">
			
		</form>
	</div>
</div>


</body>

</html>

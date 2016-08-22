<?php
//include config file
include('config/config.php');
//session starts
session_start();

//fetch all public surveys
$query = "SELECT * FROM survey WHERE access = 'public'";
$result_query = @mysqli_query($dbc,$query);
$rsSurvey = @mysqli_fetch_assoc($result_query);

if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = @mysqli_real_escape_string($dbc,$_POST['username']);
      $mypassword = @mysqli_real_escape_string($dbc,$_POST['password']); 
      
      $sql = "SELECT * FROM users WHERE username = '$myusername' and password = '$mypassword'";
	  //echo $sql;
      $result = @mysqli_query($dbc,$sql);
	 
	  //echo($result);
      $row = @mysqli_fetch_array($result,MYSQLI_ASSOC);
      //$active = $row['active'];
      
      $count = @mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         $_SESSION['login_user'] = $myusername;
		 //redirected to precious page
		 if (isset($_SESSION['redirect_URL'])) {
			 header("Location: " . $_SESSION['redirect_URL']);
		 } else {
			header("location: index.php");
		}
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="login.css">

</head>

<body>
	
<div id="main">
	<h1 style = "margin-left: 110px;">Login Form</h1>
	<div id="login">
	<h2>Login Form</h2>
		<form action="" method="post">
			<label>UserName :</label>
			<input id="username" name="username" placeholder="" type="text">
			<label>Password :</label>
			<input id="password" name="password" placeholder="" type="password">
			<input name="submit" type="submit" value=" Login ">
			
		</form>
	</div>
	<a href="signup.php" class="btn" id = "signup" name = "signup">Sign Up Here</a>
</div>

<h1 class =  "public_survey">Publicly Available Surveys</h1>
<nav class="public_box">
<?php do { 
	//shows all public surveys
?>
	<ul><li><a href = "survey_details.php?surveyID=<?php echo $rsSurvey['survey_id'];?>"><?php echo $rsSurvey['survey_name'];?></a></li></ul>
<?php } while($rsSurvey = @mysqli_fetch_assoc($result_query))?>
	
</nav>

</body>

</html>

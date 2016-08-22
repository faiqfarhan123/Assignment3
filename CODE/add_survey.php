<?php 
// including config file
include('config/config.php');
//starts session
session_start();
//checks if user is logged in then refers him to redirected page else sends him to login page	
	if (!isset($_SESSION['login_user'])) {
		$_SESSION['redirect_URL'] = $_SERVER['REQUEST_URI'];
		header('Location: login.php');
	}
//puts input box values in variable
$survey_name = @mysqli_real_escape_string($dbc,$_POST['survey_name']);
$survey_access = @mysqli_real_escape_string($dbc,$_POST['survey_access']); 
	  
//checks if submit is clicked
if (isset($_POST['submit'])) {
//runs a query to fetch the id of the survey added
$query1 = @mysqli_query($dbc, "INSERT INTO survey (survey_name, access) VALUES ('".$survey_name."','".$survey_access."')" );

$result_query1 = @mysqli_query($dbc,$query1);

$query2 = "SELECT * FROM survey ORDER BY survey_id DESC LIMIT 1;";

$result_query2 = @mysqli_query($dbc,$query2);

$row=$result_query2->fetch_assoc();

$id=$row['survey_id'];

}
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>

<div class="flex-container">
<header>
  <?php head();?>
</header>
<?php 
//logout button
if (isset($_SESSION['login_user'])) {
	echo ('<b id="logout"> SIGNED IN AS: &nbsp&nbsp<i >'.$_SESSION['login_user'].'</i>&nbsp&nbsp&nbsp(<a href="logout.php"> Log Out</a>)</b>');
	}
	?>

<nav class="sideNav">

</nav>

<article class="article">
	<form class = "get_survey_name" action = "add_survey.php" method = "POST">
		
		<?php
		//checks if submit is not clicked then show this, i.e show this form on load
		if (!isset($_POST['submit'])) {
			echo '
			<div class="form-group">
		<label for="access">Enter Name of Your Survey: </label>
		<input type = "text" name = "survey_name" class="form-control" id ="survey"><br>
			<label for="access">Form\'s Access:</label>
			<select class="form-control" id="access" name= "survey_access">
				<option>Public</option>
				<option>Private</option>
			</select>
		</div>
			<input type = "submit" name = "submit">';
		}else {
			//show this if submit is clicked
			echo '<a href="add_question.php?surveyID='.$id.'" class="btn btn-default" id = "continue_button" name = "submit">Continue</a>';
		
		}
		?>
		
	</form>
	
	

</article>

<footer>
	<?php footer();?>
</footer>
</div>

</body>
</html>
<?php 
//include config file
include('config/config.php');
//session starts
session_start();

//get survey id from URL
$surveyID = $_GET['surveyID'];

$query = "SELECT * FROM survey WHERE survey_id = '".$surveyID."'";
$result_query = @mysqli_query($dbc,$query);
$rsSurvey = @mysqli_fetch_assoc($result_query);
//check if survey is private then authorize user, else show the survey
if ($rsSurvey['access'] == 'private'){
	
	if (!isset($_SESSION['login_user'])) {
		$_SESSION['redirect_URL'] = $_SERVER['REQUEST_URI'];
		header('Location: login.php');
	}
}
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
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
<?php 
	//sideNav($dbc, $surveyID);
?>
</nav>

<article class="article">
	<h1 class = "survey_name"><?php survey_name($dbc, $surveyID);?></h1>
	<?php 
	//function call to fetch questions
	getQuestions($dbc,$surveyID );
	
	?>
	<div class = "button">
	<input type = "submit" value = "Submit" name = "submit">
	<input type = "hidden" value = "1" name = "submitted">
	</div>
	

</article>

<footer>
	<?php footer();?>
</footer>
</div>

</body>
</html>
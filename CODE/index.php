<?php 
//include config file
 include('config/config.php');
 session_start();
 
//fetch all public surveys
$query = "SELECT * FROM survey WHERE access = 'public'";
$result_query = @mysqli_query($dbc,$query);
$rsSurvey = @mysqli_fetch_assoc($result_query);

//fetch all private surveys
$query1 = "SELECT * FROM survey WHERE access = 'private'";
$result_query1 = @mysqli_query($dbc,$query1);
$rsSurvey1 = @mysqli_fetch_assoc($result_query1);

		//authorize user 
	if (!isset($_SESSION['login_user'])) {
		$_SESSION['redirect_URL'] = $_SERVER['REQUEST_URI'];
		header('Location: login.php');
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

	<ul>
		<li><a href = "add_survey.php"> Add New Survey </a></li>
	</ul>

</nav>

<article class="article">

<h1 class =  "public_survey1">Privately Available Surveys</h1><br>
	<nav class="public_box1">
<?php do { 
	//shows all private surveys
?>
	<ul><li><a href = "survey_details.php?surveyID=<?php echo $rsSurvey1['survey_id'];?>"><?php echo $rsSurvey1['survey_name'];?></a></li></ul>
<?php } while($rsSurvey1 = @mysqli_fetch_assoc($result_query1))?>
	
</nav>
<h1 class =  "public_survey">Publicly Available Surveys</h1><br>
	<nav class="public_box">
<?php do { 
//shows all private surveys
?>
	<ul><li><a href = "survey_details.php?surveyID=<?php echo $rsSurvey['survey_id'];?>"><?php echo $rsSurvey['survey_name'];?></a></li></ul>
<?php } while($rsSurvey = @mysqli_fetch_assoc($result_query))?>
	
</nav>
	
</article>

<footer>
	<?php footer();?>
</footer>
</div>

</body>
</html>
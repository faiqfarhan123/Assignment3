<?php 
//inlcudes config file
include('config/config.php');
session_start();
//gets survey id from URL
$surveyID = $_GET['surveyID'];
//checks if user is authrorised or not
if (!isset($_SESSION['login_user'])) {
	$_SESSION['redirect_URL'] = $_SERVER['REQUEST_URI'];
	header('Location: login.php');
}
//inserts questions into database dynamically
if (isset($_POST['submit_val'])) {

if ($_POST['dynfields']) {

foreach ( $_POST['dynfields'] as $key=>$value ) {

$query = @mysqli_query($dbc, "INSERT INTO survey_questions (survey_id, question_body) VALUES ('".$surveyID."','".$value."')" );

}

}
//outputs
echo '<script type="text/javascript">alert("'.count($_POST['dynfields']).' Questions Added");</script>';
 //mysql_close();

}

?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">

<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<script type="text/javascript" src="jquery.js"></script>-->

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  

<script type="text/javascript">
//dynamically adding textboxes
var counter = 0;

$(function(){

 $('p#add_field').click(function(){

 counter += 1;

 $('#container').append('<strong>Question No. ' + counter + '</strong><br />' + '<input id="field_' + counter + '" name="dynfields[]' + '" type="text" /><br />' );

 });

});

</script>
</head>
<body>

<div class="flex-container">
<header>
  <?php head();?>
</header>
<?php 
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
	<?php if (!isset($_POST['submit_val'])) { ?>

 <h1>Add your Questions</h1>

 <form method="post" action="">

 <div id="container">

 <p id="add_field"><a href="#"><span>Click To Add Questions</span></a></p>

 </div>

 

 <input type="submit" name="submit_val" value="Submit" />

 </form>

<?php } ?>
	
	

</article>

<footer>
	<?php footer();?>
</footer>
</div>

</body>
</html>
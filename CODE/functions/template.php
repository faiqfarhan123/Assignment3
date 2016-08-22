<?php
//show head function
function head(){
	echo '<h1>Survey 2016</h1>';	
}

// show footer function
function footer(){
	echo '<p>Copyright &copy Dynamic Surveys</p>';	
}

//show sideNav func
function sideNav($dbc){
	$query = "SELECT * FROM survey";
	$result = @mysqli_query($dbc,$query);
	
	if($result){
		while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
			$survey_id = $row['survey_id'];
			$survey_name = $row['survey_name'];
			$body = $row['survey_name'];
			echo '<ul><li><a href = "surveydetails.php?survey_id=' .$survey_id. ' "></a></li></ul>';
		}		
	}
}

//show survey name
function survey_name($dbc, $surveyID){
	

	$query = "SELECT survey_name FROM survey where survey_id = '".$surveyID."'";
	$result = @mysqli_query($dbc,$query);
	
	if($result){
		while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
			$body = $row['survey_name'];
			echo $body;
		}		
	}
}	


?>
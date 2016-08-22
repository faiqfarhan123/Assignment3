<?php

//get questions from database for that specific survey
function getQuestions($dbc, $surveyID){
	$query = "SELECT survey_id,question_body FROM survey_questions where survey_id = '".$surveyID."'";
	
	$result = @mysqli_query($dbc,$query);
	//post questions
	if($result){
		while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
			$body = $row['question_body'];
			echo '
			<div class = "entry"> 
			<h3 class = "qTitle">' .$body.' </h3> 
			
			<form action = "index.php" method = "get">
				<input type = "text" name = "answer" size = "55" >
				<input type = "hidden" value = "question_id" name = "questionid">
			</form>
			
		</div>
			
			';
		}
	}

}
?>
<?php
include_once '../controller/controllerScore.php';

$contScore = new controllerScore();

$response = array();
//$_POST['score'] = 1000;

if(!isset($_POST['score']))
{
	
	$response['result'] = 0;
	$response['message'] = "No score Set";
}
else
{
	$rank = $contScore->isHighScore($_POST['score']);
	
	$response['result'] = 1;
	$response['rank'] = $rank;
	$response['message'] = "HighScore Check";
}

echo json_encode($response);
?>

<?php
include_once '../controller/controllerScore.php';

$contScore = new controllerScore();

$response = array();
if(!isset($_POST['name']))
{
	
	$response['result'] = 0;
	$response['message'] = "No Name Set";
}
else if(!isset($_POST['score']))
{
	
	$response['result'] = 0;
	$response['message'] = "No Score Set";
}
else
{
	$id = $contScore->addScore($_POST['name'], $_POST['score']);
	
	$response['result'] = 1;
	$response['id'] = $id;
	$response['message'] = "Success! Score recorded.";
}

echo json_encode($response);
?>

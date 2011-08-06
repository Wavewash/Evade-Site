<?php
include_once '../controller/controllerScore.php';

$contScore = new controllerScore();

$response = array();
{
	$data = $contScore->getTopScore();
	
	$response['result'] = 1;
	$response['data'] = $data;
	$response['message'] = "Top Score";
}

echo json_encode($response);
?>
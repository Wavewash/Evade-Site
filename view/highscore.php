<?php
include_once '../controller/controllerScore.php';

$contScore = new controllerScore();

$data = $contScore->getTopScore();
echo json_encode($data);
?>
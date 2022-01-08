<?php
error_reporting(0);
include './includes/cors_simple.php';

include './includes/oba_api_location.php';
include './includes/callAPI.php';

$stop = $_GET["stop"];
$url = $api_location . 'where//stop//' . $stop  . '.json?key=TEST';

$dl = callAPI($url);
$stopData = json_decode($dl,true);

echo json_encode($stopData);




<?php
error_reporting(0);
include './includes/cors_simple.php';
include './includes/oba_api_location.php';
include './includes/callAPI.php';

$rt = $_GET["route"];
$url = $api_location . 'where//route//' . $rt  . '.json?key=TEST';

echo callAPI($url);




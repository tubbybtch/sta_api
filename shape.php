<?php
error_reporting(0);
include './includes/cors_simple.php';

include './includes/oba_api_location.php';
include './includes/callAPI.php';

$id = $_GET["id"];
$url = $api_location . 'where//shape//' . $id  . '.json?key=TEST';

echo callAPI($url);
<?php
include './includes/cors_simple.php';
include './includes/callAPI.php';
include './includes/oba_api_location.php';

// req'd parameters
$stop = $_GET["stop"];

$uri = parse_url($_SERVER['REQUEST_URI']);
$query = $uri['query'];

$url = $api_location . 'where//arrivals-and-departures-for-stop//' . $stop  . 
	'.json?key=TEST&' . $query;

echo callAPI($url);

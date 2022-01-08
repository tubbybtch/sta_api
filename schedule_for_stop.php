<?php
//error_reporting(0);
include './includes/cors_simple.php';

include './includes/oba_api_location.php';
include './includes/callAPI.php';

$stop = $_GET["stop"];

$uri = parse_url($_SERVER['REQUEST_URI']);
$query = $uri['query'];

$url = $api_location . "/where/schedule-for-stop/" . $stop . ".json?key=TEST&" . $query;

echo callAPI($url);




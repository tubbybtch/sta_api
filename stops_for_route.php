<?php
//error_reporting(0);
include './includes/cors_simple.php';

include './includes/oba_api_location.php';
include './includes/callAPI.php';

$route = $_GET["route"];
$uri = parse_url($_SERVER['REQUEST_URI']);
$query = $uri['query'];


$url = $api_location . "/where/stops-for-route/" . $route . ".json?key=TEST&" . $query;


$dl = callAPI($url);
$trips = json_decode($dl,true);

echo json_encode($trips);
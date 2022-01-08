<?php
error_reporting(0);
include './includes/cors_simple.php';

include './includes/oba_api_location.php';
include './includes/callAPI.php';

if (!$_GET["trip"]) {
	echo 'trip parameter required.';
	http_response_code(422);
	die;
}

$trip = $_GET["trip"];

$uri = parse_url($_SERVER['REQUEST_URI']);
$query = $uri['query'];

$url = $api_location . "/where/trip-details/" . $trip . ".json?key=TEST&" . $query;

$dl = callAPI($url);
$trip = json_decode($dl,true)['data'];

echo json_encode($trip);

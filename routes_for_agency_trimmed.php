<?php
error_reporting(0);
include './includes/cors_simple.php';

include './includes/oba_api_location.php';
include './includes/callAPI.php';

// get active routes for agency
$agency = $_GET["agency"];


$url = $api_location . 'where//routes-for-agency//' . $agency  . '.json?key=TEST';

$dl = callAPI($url);
$routes = json_decode($dl,true)['data']['list'];

// retrieve and apply trips for route
for ($ix=0; $ix < count($routes); $ix++) {
	unset($routes[$ix]["trips"]);
	unset($routes[$ix]["stops"]);
	unset($routes[$ix]["url"]);	
	unset($routes[$ix]["agencyId"]);
	unset($routes[$ix]["type"]);
	
	$routes[$ix]["name"] = $routes[$ix]["shortName"] . " - " . $routes[$ix]["longName"];
}

echo json_encode($routes);




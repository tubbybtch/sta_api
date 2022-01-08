<?php
error_reporting(0);
include './includes/cors_simple.php';

include './includes/oba_api_location.php';
include './includes/callAPI.php';

// get active routes for agency
$agency = $_GET["agency"];

//oba4spokane.com = 52.88.188.196:8080

$url = $api_location . 'where//routes-for-agency//' . $agency  . '.json?key=TEST';

$dl = callAPI($url);
$routes = json_decode($dl,true)['data']['list'];

// retrieve and apply trips for route
for ($ix=0; $ix < count($routes); $ix++) {
	$route = $routes[$ix]["id"];

	$url = $api_location . 'where//trips-for-route//' . $route  . '.json?key=TEST';	
	$dl = callAPI($url);
	$trips = json_decode($dl,true)["data"]["list"];
	
	$routes[$ix]["trips"] = $trips;
}

// retrieve and apply stops/paths for route
for ($ix=0; $ix < count($routes); $ix++) {
	$route = $routes[$ix]["id"];

	$url = $api_location . 'where//stops-for-route//' . $route  . '.json?key=TEST';	
	$dl = callAPI($url);
	$stops = json_decode($dl,true)["data"]["entry"];
	
	$routes[$ix]["stops"] = $stops;
}


echo json_encode($routes);




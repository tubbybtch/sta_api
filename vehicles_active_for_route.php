<?php
//error_reporting(0);
include './includes/cors_simple.php';

include './includes/oba_api_location.php';
include './includes/callAPI.php';
	
$agency = $_GET["agency"];
$route = $_GET["route"];

$uri = parse_url($_SERVER['REQUEST_URI']);
$query = $uri['query'];

$url = $api_location . "/where/trips-for-route/" . $route . ".json?key=TEST&includeStatus=true&" . $query;;
$dl = callAPI($url);

$trips = json_decode($dl,true)['data']['list'];

$activeTrips = [];

for ($ix = 0; $ix < count($trips); $ix++) {
	$tripId = $trips[$ix]["tripId"];
	
	$url = $api_location . "/where/trip/" . $tripId . ".json?key=TEST&includeStatus=true";
	$tp = json_decode(callAPI($url),true);

	$trips[$ix]["trip"] = $tp;
	$trips[$ix]["routeId"] = $tp['data']['entry']['routeId'];
	
	if ($trips[$ix]["routeId"] == $route && $trips[$ix]["status"]["vehicleId"] !== "") {
		array_push($activeTrips, $trips[$ix]);
	}
}

echo json_encode($activeTrips);

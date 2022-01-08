<?php
error_reporting(0);
include './includes/cors_simple.php';

include './includes/oba_api_location.php';
include './includes/callAPI.php';

// get active routes for agency
$agency = $_GET["agency"];
$vehicleId = $_GET["vehicleId"];

$url = $api_location . 'where/vehicles-for-agency/' . $agency  . '.json?key=TEST';

$dl = callAPI($url);
$vehicles = json_decode($dl,true)['data']['list'];
	

for ($ix=0; $ix < count($vehicles); $ix++) {
	//var_dump ($vehicles[$ix]);			
	//echo $ix;
	//echo $vehicles[$ix]["vehicleId"] . ' ' . $vehicleId . "\n";
	if ($vehicles[$ix]["vehicleId"] == $vehicleId) {
		$tripId = $vehicles[$ix]["tripId"];
		//$tripId = "STA_781018";
		if ($tripId !== "") {
			$url = $api_location . "/where/trip/" . $tripId . ".json?key=TEST";

			$dl = callAPI($url);
			
			$trip = json_decode($dl,true)["data"];		
			
			$vehicles[$ix]["trip"] = $trip["entry"];

			$routeId = $vehicles[$ix]["trip"]["routeId"];

			$routes = $trip["references"]["routes"];
			$vehicles[$ix]["route"] = null;

			for ($ix2=0; $ix2 < count($routes); $ix2++) {
				//echo $routes[$ix2]["id"];
				if ($routes[$ix2]["id"] == $routeId) {
					$vehicles[$ix]["route"]	= $routes[$ix2];				
				}
			}				
			
			//$vehicles[$ix]["routes"] = $routes;
		} else {
			$vehicles[$ix]["trip"] = null;
			//$vehicles[$ix]["routes"] = [];
			$vehicles[$ix]["route"] = null;
		}
		
		echo json_encode($vehicles[$ix]);
		die;
	}
}
		



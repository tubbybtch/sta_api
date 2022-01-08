<?php
error_reporting(0);
include './includes/cors_simple.php';

include './includes/oba_api_location.php';
include './includes/callAPI.php';

// get active routes for agency
$agency = $_GET["agency"];
$vehicleId = $_GET["vehicleId"];
	
$url = $api_location . 'where//vehicles-for-agency//' . $agency  . '.json?key=TEST';

$dl = callAPI($url);
$vehicles = json_decode($dl,true)['data']['list'];

if ($vehicleId) {

	
	for ($ix=0; $ix < count($vehicles); $ix++) {
		//var_dump ($vehicles[$ix]);			
		//echo $ix;
		if ($vehicles[$ix]["vehicleId"] == $vehicleId) {
			echo json_encode($vehicles[$ix]);
		}
	}
		
} else {
	echo json_encode($vehicles);	
}



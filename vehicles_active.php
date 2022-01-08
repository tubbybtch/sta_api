<?php
error_reporting(0);
include './includes/cors_simple.php';

include './includes/oba_api_location.php';
include './includes/callAPI.php';
	
$agency = $_GET["agency"];
$url = $api_location . 'where//vehicles-for-agency//' . $agency  . '.json?key=TEST';

$dl = callAPI($url);
$vehicles = json_decode($dl,true)['data']['list'];

$active = [];

for ($ix=0; $ix < count($vehicles); $ix++) {
	//var_dump ($vehicles[$ix]);			
	//echo $ix;
	if ($vehicles[$ix]["tripStatus"] != null) {
		array_push($active, $vehicles[$ix]);
	}
}
		
echo json_encode($active);


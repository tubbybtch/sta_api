<?php
error_reporting(0);
include './includes/cors_simple.php';

include './includes/oba_api_location.php';
include './includes/callAPI.php';

$agency = $_GET["agency"];
$url = $api_location . 'where/agency/' . $agency  . '.json?key=TEST';

//echo $url;

$dl = callAPI($url);
$agencyData = json_decode($dl,true);

echo json_encode($agencyData);




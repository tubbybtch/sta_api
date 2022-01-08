<?php
//error_reporting(0);
include './includes/cors_simple.php';

include './includes/oba_api_location.php';
include './includes/callAPI.php';

$uri = parse_url($_SERVER['REQUEST_URI']);
$query = $uri['query'];

$url = $api_location . "/where/stops-for-location.json?" . $query . "&key=TEST";
//echo $url;

echo callAPI($url);




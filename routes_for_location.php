<?php
//error_reporting(0);
include './includes/cors_simple.php';

include './includes/oba_api_location.php';
include './includes/callAPI.php';

$uri = parse_url($_SERVER['REQUEST_URI']);
$query = $uri['query'];

$url = $api_location . "/where/routes-for-location.json?key=TEST&" . $query;

echo callAPI($url);

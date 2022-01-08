<?php
echo $_SERVER['REQUEST_URI'];

$uri = parse_url($_SERVER['REQUEST_URI']);
var_dump($uri);

die;
error_reporting(0);
include './cors_simple.php';

include './oba_api_location.php';
include './callAPI.php';

$stop = $_GET["stop"];
$url = $api_location . 'where//stop//' . $stop  . '.json?' . '&key=TEST';

$dl = callAPI($url);
$stopData = json_decode($dl,true);

echo json_encode($stopData);




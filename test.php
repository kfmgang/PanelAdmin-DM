<?php
require('vendor/autoload.php');
include 'INI.class.php'; 

$client = new \Zyberspace\SteamWebApi\Client('C93FFB23FD0B17F012878B8B3FA69379');
$steamUser = new \Zyberspace\SteamWebApi\Interfaces\ISteamUser($client);
$response = $steamUser->GetPlayerSummariesV2('76561198179589930');

print_r($response->response->players[0]);
?>
<?php
$db = new PDO('sqlite:SaveData_v01.db');
$result = $db->query('SELECT * from GameSession');
$bannedUsers = $result->fetch(PDO::FETCH_ASSOC)['BannedUsers'];

// print $bannedUsers;

$bannedUsers = str_replace("Steamworker:", "", $bannedUsers);
$bannedUsers = str_replace("{", "", $bannedUsers);
$bannedUsers = str_replace("}", "", $bannedUsers);

// echo "</br>".$bannedUsers;

$obj = explode(",", $bannedUsers);

print json_encode($obj[0]);
?>
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

unset($obj[1]);
$obj = array_values($obj);

$sql ="UPDATE GameSession SET BannedUsers = :bannedUsers WHERE DocumentID = 1";
$test = $db->prepare($sql);
$test->bindParam(':bannedUsers', $BannedUsers, PDO::PARAM_INT);    
$test->execute();
print_r($test);
?>
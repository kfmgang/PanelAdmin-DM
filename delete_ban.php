<?php 
session_start();
require_once 'includes/auth_validate.php';
require_once './config/config.php';
include 'INI.class.php'; 
$del_id = filter_input(INPUT_POST, 'del_id');


if($_SESSION['admin_type']!='super'){
	$_SESSION['failure'] = "You don't have permission to perform this action";
    header('location: ban.php');
    exit;

}
$ban_id = $del_id;

$db = new PDO('sqlite:SaveData_v01.db');
$result = $db->query('SELECT * from GameSession');
$bannedUsers = $result->fetch(PDO::FETCH_ASSOC)['BannedUsers'];

// print $bannedUsers;

$bannedUsers = str_replace("Steamworker:", "", $bannedUsers);
$bannedUsers = str_replace("{", "", $bannedUsers);
$bannedUsers = str_replace("}", "", $bannedUsers);
$bannedUsers = str_replace("'", "", $bannedUsers);
$obj = explode(",", $bannedUsers);
unset($obj[$ban_id]);
$obj = array_values($obj);
for ($i=0; $i < count($obj); $i++) { 
    $obj[$i] = 'Steamworker:'.$obj[$i];
};

$bannedUsers = '\'{'.implode(',', $obj).'}\'';

if (!empty($ban_id)) 
{
    $_SESSION['info'] = "Player deleted From the ban list successfully!";
    $sql ="UPDATE GameSession SET BannedUsers = :bannedUsers WHERE DocumentID = 1";
    $test = $db->prepare($sql);
    $test->bindParam(':bannedUsers', $bannedUsers, PDO::PARAM_STR);    
    $test->execute();
    header('location: ban.php');
    exit;
}
else
{
    $_SESSION['failure'] = "Unable to delete player from the ingame Admin list";
    header('location: adminDM.php');
    exit;
}
    
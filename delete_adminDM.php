<?php 
session_start();
require_once 'includes/auth_validate.php';
require_once './config/config.php';
include 'INI.class.php'; 
$del_id = filter_input(INPUT_POST, 'del_id');


if($_SESSION['admin_type']!='super'){
	$_SESSION['failure'] = "You don't have permission to perform this action";
    header('location: customers.php');
    exit;

}
$adminDM_id = $del_id;

$ini = new INI('game_list.ini');
unset($ini->data['/Script/DeadMatter.DMGameSession']['admins'][$adminDM_id]);
$ini->write();
    
if (!empty($adminDM_id)) 
{
    $_SESSION['info'] = "Player deleted From the ingame Admin list successfully!";
    $test = array("[]=", "[] = ", " = ");
    $a = 'D:Program Files (x86)/Steam/steamapps/common/Dead Matter Dedicated Server/deadmatter/Saved/Config/WindowsServer/game.ini'; 
    $b = file_get_contents('game_list.ini');  
    $c = str_replace($test, '=', $b);
    file_put_contents($a, $c);
    header('location: adminDM.php');
    exit;
}
else
{
    $_SESSION['failure'] = "Unable to delete player from the ingame Admin list";
    header('location: adminDM.php');
    exit;
}
    
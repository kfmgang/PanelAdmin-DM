<?php

function masterconnect(){

	global $dbcon;
	$dbcon = mysqli_connect('localhost', 'root', '', 'test', '3306') or die ('Database connection failed');
}

function loginconnect(){

	global $dbconL;
	$dbconL = mysqli_connect('localhost', 'root', '', 'test', '3306');
}


global $DBHost;
$DBHost = 'localhost';
global $DBUser;
$DBUser = 'root';
global $DBPass;
$DBPass = '';
global $DBName;
$DBName = 'test';

global $ServerIp;
$ServerIp = '45.157.190.235';
global $DM_Dir;
$DM_Dir = 'D:\Program Files (x86)\Steam\steamapps\common\Dead Matter Dedicated Server';


?>

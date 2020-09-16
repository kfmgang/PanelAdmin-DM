<?php

function getBannedUsers() { 
    //Get Dashboard information
    $db = new PDO('sqlite:SaveData_v01.db');
    $result = $db->query('SELECT * from GameSession');
    $rawStr = $result->fetch(PDO::FETCH_ASSOC)['BannedUsers'];
    $rawStr = str_replace("Steamworker:", "", $rawStr);
    $rawStr = str_replace("{", "", $rawStr);
    $rawStr = str_replace("}", "", $rawStr);
    $rawStr = str_replace("'", "", $rawStr);
    return explode(",", $rawStr);
}


?>
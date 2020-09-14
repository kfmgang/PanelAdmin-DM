<?php
$db = new PDO('sqlite:SaveData_v01.db');
$result = $db->query('SELECT * from GameSession');
foreach($result as $row){
  print "<td>".$row['BannedUsers']."</td>";
}
?>
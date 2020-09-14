<?php
$db = new PDO('sqlite:D:Program Files (x86)/Steam/steamapps/common/Dead Matter Dedicated Server/deadmatter/Saved/sqlite3/SaveData_v01.db');
$result = $db->query('SELECT * from GameSession');
foreach($result as $row){
  print "<td>".$row['BannedUsers']."</td>";
}
?>
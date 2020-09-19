<?php
$ini_file='game_list.ini';
$datas  = parse_ini_file( $ini_file, true );
$servertags = $datas['/Script/DeadMatter.DMGameSession']['ServerTags'];
print_r($servertags);

print '</br>'.array_search("1:SEMI-RP", $servertags);
?>
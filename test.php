<?php
$ini_file='game_list.ini';
$datas  = parse_ini_file( $ini_file, true );
$servertags = $datas['/Script/DeadMatter.FlockSpawner'];
print_r($servertags);

//print '</br>'.array_search("[/Script/DeadMatter.DMGameSession]", $datas);
if(isset($datas['/Script/DeadMatter.GlobalAISpawner'])){
    echo("oui");
}
?>
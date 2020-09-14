<?php
$ini_file='game_list.ini';
$datas  = parse_ini_file( $ini_file, true );

if(array_key_exists('ServerTags', $datas['/Script/DeadMatter.DMGameSession'])){
    print_r($datas['/Script/DeadMatter.DMGameSession']['ServerTags']);
}else{
    echo('');
}
?>
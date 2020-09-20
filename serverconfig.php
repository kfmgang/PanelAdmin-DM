<?php
session_start();
require_once 'config/config.php';
require_once BASE_PATH.'/includes/auth_validate.php';
include 'INI.class.php';
include 'list.php';
include 'functions/consolelog.php';  
$ini = new INI('game_list.ini');
$ini_file='game_list.ini';
$verf  = parse_ini_file( $ini_file, true );

if(array_key_exists('ServerTags', $verf['/Script/DeadMatter.DMGameSession'])){
    
}else{
    $ini->data['/Script/DeadMatter.DMGameSession']['ServerTags'][0] = "";
    $ini->data['/Script/DeadMatter.DMGameSession']['ServerTags'][1] = "";
    $ini->data['/Script/DeadMatter.DMGameSession']['ServerTags'][2] = "";
    $ini->data['/Script/DeadMatter.DMGameSession']['ServerTags'][3] = "";
    $ini->write();
}

$datas  = parse_ini_file( $ini_file, true );
// Handle update request. As the form's action attribute is set to the same script, but 'POST' method, 
if ($_SERVER['REQUEST_METHOD'] === 'POST') 
{

    // Get input data
    
        //$text = fopen('test.txt', 'r+');
        //fputs($text, 'test');
        //fclose($text);
        
    for ($i=0; $i < count($variable); $i++) {
        $input_data = array_filter($_POST)[$variable[$i][0]]; 
        $test = $variable[$i][0];
        if($test == 'ServerTags'){
            for ($x=0; $x <= 3; $x++) {
                $tags = array_filter($_POST)[$x];
                if ($tags == '') {
                    $ini->data['/Script/DeadMatter.DMGameSession']['ServerTags'][$x] = "";
                    $ini->write();
                } else{
                    $ini->data['/Script/DeadMatter.DMGameSession']['ServerTags'][$x] = $tags;
                    $ini->write();
                }
            }
        }else {
            if (isset($datas[$variable[$i][3]])) {
                $data =  $datas[$variable[$i][3]];
                if(array_key_exists($test, $data) && $input_data != ''){
                    $ini->data[$variable[$i][3]][$test] = $input_data;
                    $ini->write();
                }elseif(array_key_exists($test, $data) && $input_data == ''){
                    unset($ini->data[$variable[$i][3]][$test]);
                    $ini->write();
                }elseif($input_data != '') {
                    $ini->data[$variable[$i][3]][$test] = $input_data;
                    $ini->write();
                    }
            }else {
                if ($input_data == '') {
                }else {
                    $ini->data[$variable[$i][3]][$test] = $input_data;
                    $ini->write();
                }
            }
            }
        } 
    

    //  $update = print_r($update);
        $_SESSION['success'] = "Config updated successfully!";
        //update Game.ini

        $test = array("[]=", "[] = ", " = ");
        $a = 'D:Program Files (x86)/Steam/steamapps/common/Dead Matter Dedicated Server/deadmatter/Saved/Config/WindowsServer/game.ini'; 
        $b = file_get_contents('game_list.ini');  
        $c = str_replace($test, '=', $b);
        file_put_contents($a, $c);

        // Redirect to the listing page
        header('Location: serverconfig.php');

        // Important! Don't execute the rest put the exit/die.
        exit();
}

?>
<?php include BASE_PATH.'/includes/header.php'; ?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">Server Config</h2>
            
        </div>
    </div>
    <!-- Flash messages -->
    <?php include BASE_PATH.'/includes/flash_messages.php'; ?>
    <form class="form" action="" method="post" id="serverconfig_form">
        <?php include BASE_PATH.'/forms/serverconfig_form.php'; ?>
    </form>
</div>
<script>
function myFunction() {
  var input, filter, table, tr, td, i,alltables;
alltables = document.querySelectorAll("table[data-name=listtable]");
input = document.getElementById("myInput");
filter = input.value.toUpperCase();
alltables.forEach(function(table){
tr = table.getElementsByTagName("tr");
for (i = 0; i < tr.length; i++) {
td = tr[i].getElementsByTagName("td")[2];
td = tr[i].getElementsByTagName("td")[0];
if (td) {
if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
tr[i].style.display = "";
} else {
tr[i].style.display = "none";
}
}
}
});
}
</script>
<?php include BASE_PATH.'/includes/footer.php'; ?>

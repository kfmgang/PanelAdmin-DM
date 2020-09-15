<?php
session_start();
require_once 'config/config.php';
require_once BASE_PATH.'/includes/auth_validate.php';
include 'INI.class.php';
include 'list.php';  
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
    $newsteamid = htmlspecialchars($_POST['new_steamid']);


    $ini->data['/Script/DeadMatter.SurvivalBaseGamemode']['Whitelist'][$whitelist_id] = $newsteamid;
    $ini->write();

        $_SESSION['success'] = 'Customer updated successfully!';

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
<?php include BASE_PATH.'/includes/footer.php'; ?>

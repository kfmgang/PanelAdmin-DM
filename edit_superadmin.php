<?php
session_start();
require_once 'config/config.php';
require_once BASE_PATH.'/includes/auth_validate.php';
include 'INI.class.php'; 

// Sanitize if you want
$Superadmin_id = filter_input(INPUT_GET, 'superadmin_id');
$steam_id = filter_input(INPUT_GET, 'steam_id');
$operation = filter_input(INPUT_GET, 'operation', FILTER_SANITIZE_STRING); 
($operation == 'edit') ? $edit = true : $edit = false;

$ini = new INI('game_list.ini');
// Handle update request. As the form's action attribute is set to the same script, but 'POST' method, 
if ($_SERVER['REQUEST_METHOD'] === 'POST') 
{
    // Get customer id form query string parameter.
    $Superadmin_id = filter_input(INPUT_GET, 'superadmin_id');

    // Get input data
    $newsteamid = htmlspecialchars($_POST['new_steamid']);


    $ini->data['/Script/DeadMatter.DMGameSession']['Superadmins'][$Superadmin_id] = $newsteamid;
    $ini->write();

        $_SESSION['success'] = 'Superadmin updated successfully!';

        //update Game.ini
        
        $test = array("[]=", "[] = ", " = ");
        $a = 'D:Program Files (x86)/Steam/steamapps/common/Dead Matter Dedicated Server/deadmatter/Saved/Config/WindowsServer/game.ini'; 
        $b = file_get_contents('game_list.ini');  
        $c = str_replace($test, '=', $b);
        file_put_contents($a, $c);

        // Redirect to the listing page
        header('Location: adminDM.php');

        // Important! Don't execute the rest put the exit/die.
        exit();
}

?>
<?php include BASE_PATH.'/includes/header.php'; ?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">Update in Game Superadmins</h2>
        </div>
    </div>
    <!-- Flash messages -->
    <?php include BASE_PATH.'/includes/flash_messages.php'; ?>
    <form class="form" action="" method="post" id="adminDM_form">
        <?php include BASE_PATH.'/forms/adminDM_form.php'; ?>
    </form>
</div>
<?php include BASE_PATH.'/includes/footer.php'; ?>

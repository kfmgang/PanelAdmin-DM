<?php
session_start();
require_once 'config/config.php';
require_once BASE_PATH.'/includes/auth_validate.php';
include 'INI.class.php'; 

$ini = new INI('game_list.ini');

if ($_SERVER['REQUEST_METHOD'] === 'POST') 
{
    $newsteamid = htmlspecialchars($_POST['new_steamid']);

    $ini->data['/Script/DeadMatter.DMGameSession']['Superadmins'][] = $newsteamid;
    $ini->write();
    $test = array("[]=", "[] = ", " = ");
    $a = 'D:Program Files (x86)/Steam/steamapps/common/Dead Matter Dedicated Server/deadmatter/Saved/Config/WindowsServer/game.ini'; 
    $b = file_get_contents('game_list.ini');  
    $c = str_replace($test, '=', $b);
    file_put_contents($a, $c);


        $_SESSION['success'] = 'Player added to the ingame SuperAdmin List successfully!';
        // Redirect to the listing page


        header('Location: adminDM.php');
    	exit();
    
}

$edit = false;
?>
<?php include BASE_PATH.'/includes/header.php'; ?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">Add a SuperAdmin on the server</h2>
        </div>
    </div>
    <!-- Flash messages -->
    <?php include BASE_PATH.'/includes/flash_messages.php'; ?>
    <form class="form" action="" method="post" id="adminDM_form" enctype="multipart/form-data">
        <?php include BASE_PATH.'/forms/adminDM_form.php'; ?>
    </form>
</div>
<?php include BASE_PATH.'/includes/footer.php'; ?>

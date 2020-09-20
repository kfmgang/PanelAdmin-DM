<?php
session_start();
require('vendor/autoload.php');
require_once 'config/config.php';
require_once BASE_PATH . '/includes/auth_validate.php';
require __DIR__ . "/src/functions.php";

$ini_file='game_list.ini';

#$ini = new INI('D:Program Files (x86)/Steam/steamapps/common/Dead Matter Dedicated Server/deadmatter/Saved/Config/WindowsServer/game.ini');

#$ini->data['/Script/DeadMatter.SurvivalBaseGamemode']['Whitelist'][74] = '76561190000000001';
#$ini->write();
  $datas  = parse_ini_file( $ini_file, true );
  $client = new \Zyberspace\SteamWebApi\Client('C93FFB23FD0B17F012878B8B3FA69379');
  $steamUser = new \Zyberspace\SteamWebApi\Interfaces\ISteamUser($client);
 # print_r($datas)
?>
<?php include BASE_PATH . '/includes/header.php'; ?>
<!-- Main container -->
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-6">
            <h1 class="page-header">Whitelist</h1>
        </div>
        <div class="col-lg-6">
            <div class="page-action-links text-right">
                <a href="add_whitelist.php?operation=create" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Add new</a>
            </div>
        </div>
    </div>
    <?php include BASE_PATH . '/includes/flash_messages.php'; ?>
    <!-- Filters  -->
<div class="well text-center filter-form">
    <label for="myInput">Search</label>
    <input type="text" class="form-control" id="myInput" onkeyup="myFunction()" placeholder="Search for names..">
</div>    
    <!-- //Filters -->
<div id="mySlowTable">

</div>
</div>

<script>
$(function() {

    $("#mySlowTable").empty().html('<div class="text-center"><img src="assets/image/loading.gif" /></div> ');

    $('#mySlowTable').load("tablewhitelist.php");
});

function myFunction() {
  var input, filter, table, tr, td, i,alltables;
alltables = document.querySelectorAll("table[data-name=listtable]");
input = document.getElementById("myInput");
filter = input.value.toUpperCase();
alltables.forEach(function(table){
tr = table.getElementsByTagName("tr");
for (i = 0; i < tr.length; i++) {
td = tr[i].getElementsByTagName("td")[1];
td = tr[i].getElementsByTagName("td")[2];
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
<!-- //Main container -->
<?php include BASE_PATH . '/includes/footer.php'; ?>
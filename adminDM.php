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
            <h1 class="page-header">Admin in Dead Matter</h1>
        </div>
    </div>
    <?php include BASE_PATH . '/includes/flash_messages.php'; ?>
    <!-- Filters Ne fonctionne pas -->
<div class="well text-center filter-form">
    <label for="myInput">Search</label>
    <input type="text" class="form-control" id="myInput" onkeyup="myFunction()" placeholder="Search for names..">
</div>    
    <!-- //Filters -->
    <div class="row">
        <div class="col-lg-6">
            <h4 class="page-header">Admins</h4>
        </div>
        <div class="col-lg-6">
            <div class="page-action-links text-right">
                <a href="add_adminDM.php?operation=create" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Add new</a>
            </div>
        </div>
    </div>
<table id="myTable" class="table table-striped table-bordered table-condensed" data-name="listtable">
  <tbody>
  <thead>
    <tr class="header">
      <th width="10%">ID</th>
      <th width="40%">SteamID64</th>
      <th width="40%">Steam</th>
      <th width="10%">Actions</th>
    </tr>
  </thead>
    <?php
      $x = 0;
      foreach( $datas['/Script/DeadMatter.DMGameSession']['admins'] as $data)    

      {
    ?>
    <tbody>
    <tr>
      <td>
      <?php
      $id = $x++;
      echo $id;
      ?>
      </td>
      <td><?php
      echo ( $data ); ?></td>
      <td><a href="http://steamcommunity.com/profiles/<?php echo htmlentities($data); ?>" title="Click here to go to">
      <?php 
      if($data == "DONOTREMOVE"){
        echo("DONOTREMOVE");
      }else {
        $response = $steamUser->GetPlayerSummariesV2($data);
        echo($response->response->players[0]->personaname);
      }
      ?></a></td>
      <td>
        <a href="edit_adminDM.php?adminDM_id=<?php echo $id; ?>&steam_id=<?php echo $data; ?>&operation=edit" class="btn btn-primary"><i class="glyphicon glyphicon-edit"></i></a>
        <a href="#" class="btn btn-danger delete_btn" data-toggle="modal" data-target="#confirm-delete-<?php echo $id; ?>"><i class="glyphicon glyphicon-trash"></i></a>
      </td>
    </tr>
            <!-- Delete Confirmation Modal -->
            <div class="modal fade" id="confirm-delete-<?php echo $id; ?>" role="dialog">
                <div class="modal-dialog">
                    <form action="delete_adminDM.php" method="POST">
                        <!-- Modal content -->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Confirm</h4>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" name="del_id" id="del_id" value="<?php echo $id; ?>">
                                <p>Are you sure you want to delete this row?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-default pull-left">Yes</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- //Delete Confirmation Modal -->
    <?php 
     }
    ?>
  </tbody>
</table>
<div class="row">
        <div class="col-lg-6">
            <h4 class="page-header">SuperAdmins</h4>
        </div>
        <div class="col-lg-6">
            <div class="page-action-links text-right">
                <a href="add_superadmin.php?operation=create" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Add new</a>
            </div>
        </div>
    </div>
<table id="myTable" class="table table-striped table-bordered table-condensed" data-name="listtable">
  <tbody>
  <thead>
    <tr class="header">
      <th width="10%">ID</th>
      <th width="40%">SteamID64</th>
      <th width="40%">Steam</th>
      <th width="10%">Actions</th>
    </tr>
  </thead>
    <?php
      $x = 0;
      foreach( $datas['/Script/DeadMatter.DMGameSession']['Superadmins'] as $data )    

      {
    ?>
    <tbody>
    <tr>
      <td>
      <?php
      $id = $x++;
      echo $id;
      ?>
      </td>
      <td><?php
      echo ( $data ); ?></td>
      <td><a href="http://steamcommunity.com/profiles/<?php echo htmlentities($data); ?>" title="Click here to go to">
      <?php 
      if($data == "DONOTREMOVE"){
        echo("DONOTREMOVE");
      }else {
        $response = $steamUser->GetPlayerSummariesV2($data);
        echo($response->response->players[0]->personaname);
      }
      ?></a></td>
      <td>
        <a href="edit_superadmin.php?superadmin_id=<?php echo $id; ?>&steam_id=<?php echo $data; ?>&operation=edit" class="btn btn-primary"><i class="glyphicon glyphicon-edit"></i></a>
        <a href="#" class="btn btn-danger delete_btn" data-toggle="modal" data-target="#confirm-delete-<?php echo $id; ?>"><i class="glyphicon glyphicon-trash"></i></a>
      </td>
    </tr>
            <!-- Delete Confirmation Modal -->
            <div class="modal fade" id="confirm-delete-<?php echo $id; ?>" role="dialog">
                <div class="modal-dialog">
                    <form action="delete_superadmin.php" method="POST">
                        <!-- Modal content -->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Confirm</h4>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" name="del_id" id="del_id" value="<?php echo $id; ?>">
                                <p>Are you sure you want to delete this row?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-default pull-left">Yes</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- //Delete Confirmation Modal -->
    <?php 
     }
    ?>
  </tbody>
</table>
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
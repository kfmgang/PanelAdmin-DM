<fieldset>
<h2>[/Script/DeadMatter.DMGameSession]</h2>
<table id="myTable" class="table table-striped table-bordered table-condensed" data-name="listtable">
  <tbody>
  <thead>
    <tr class="header">
      <th width="33%">Options</th>
      <th width="33%">Data</th>
      <th width="45%">description</th>
    </tr>
  </thead>
  <?php
  $data= $datas['/Script/DeadMatter.DMGameSession'];
  for ($i=0; $i < count($data); $i++) { 
    $test = $variable[$i][0];
    if(is_array($data[$variable[$i][0]]))
          {
            // foreach ($test as $key) {
            //     echo ($key);
            // }
            var_dump($data[$test]);
          }else{
            echo($data[$variable[$i][0]]);
          }
    //echo($datas[$variable[$i][0]]);
    ?>
    <tbody>
    <tr>
      <td>
      <?php   
      echo $variable[$i][0];
      ?>    
      <td>
      <input type="text" name="new_steamid" value="<?php if(array_key_exists($test, $data)){
          if(is_array($data[$variable[$i][0]]))
          {
            foreach ($data[$test] as $key) {
                echo ($key);
            }
          }else{
            echo($data[$variable[$i][0]]);
          }
}else{
    echo('');
}?>" placeholder="Servername" class="form-control" required="required" id = "new_steamid">
      </td>
      <td>
      <?php
    echo ($variable[$i][1]);
    ?> 
    </td>
    </tr>
    <?php 
     }
    ?>
  </tbody>
</table>
    </div> 
    <div class="form-group text-center">
        <label></label>
        <button type="submit" class="btn btn-warning" >Save <i class="glyphicon glyphicon-send"></i></button>
    </div>
</fieldset>
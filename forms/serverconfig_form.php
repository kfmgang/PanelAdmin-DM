<fieldset>
    <!-- Filters  -->
    <div class="well text-center filter-form">
    <label for="myInput">Search</label>
    <input type="text" class="form-control" id="myInput" onkeyup="myFunction()" placeholder="Search for names..">
</div>    
    <!-- //Filters -->
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

  $input_start = '<input style="margin-bottom: 2px;" type="text" name="new_steamid" value="';

  for ($i=0; $i < count($variable); $i++) { 
    $test = $variable[$i][0];
    $input_end =  '" placeholder="'. $variable[$i][2] .'" class="form-control" required="required" id ="new_steamid">';
    // echo($datas[$variable[$i][0]]);
    ?>

    <tbody>
    <tr>
      <td> <!-- Options -->

      <?php   
      echo $variable[$i][0];
      ?>    

      <td> <!-- Data -->

      <?php 
      if(array_key_exists($test, $data)){

          if(!is_array($data[$variable[$i][0]]))
          {
            // Normal display
            $value = $data[$variable[$i][0]];
            echo($input_start.$value.$input_end);
          }else{
            // Array display
            foreach ( $datas['/Script/DeadMatter.DMGameSession']['ServerTags'] as $key) {
              $value = $key;
              echo($input_start.$value.$input_end);
            }
          }
      } else {
        echo($input_start.$input_end);
      }
      ?>

      </td>
      <td> <!-- Description -->

      <?php
    echo ($variable[$i][1]);
    ?> 

    </td>
    </tr>

    <?php 
    // $error = $data[$variable[$i][0]];
    // echo($error);
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
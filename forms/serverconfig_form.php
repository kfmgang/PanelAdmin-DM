<fieldset>
    <!-- Filters  -->
    <div class="well text-center filter-form">
    <label for="myInput">Search</label>
    <input type="text" class="form-control" id="myInput" onkeyup="myFunction()" placeholder="Search for names..">
</div>    
    <!-- //Filters -->
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



  for ($i=0; $i < count($variable); $i++) { 
    $input_start = '<input style="margin-bottom: 2px;" type="' .$variable[$i][4] .'" name="' .$variable[$i][0] .'" value="';
    $input_end =  '" placeholder="'. $variable[$i][2] .'" class="form-control"  id ="' .$variable[$i][0] .'">';
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
      if (isset($datas[$variable[$i][3]])) {
        if(array_key_exists($variable[$i][0], $datas[$variable[$i][3]])){

          if(!is_array($datas[$variable[$i][3]][$variable[$i][0]]))
          {
            // Normal display
            $value = $datas[$variable[$i][3]][$variable[$i][0]];
            echo($input_start.$value.$input_end);
          }else{
            // Array display
            $x = 0;
            foreach ( $datas['/Script/DeadMatter.DMGameSession']['ServerTags'] as $key) {
              $value = $key;
              $id = $x++;
              $input_start_array = '<input style="margin-bottom: 2px;" type="text" name="' . $id .'" value="';
              echo($input_start_array.$value.$input_end);
            }
          }
      } else {
        echo($input_start.$input_end);
      }
    }else {
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
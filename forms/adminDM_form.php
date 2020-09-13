<fieldset>
    <div class="form-group">
        <label for="new_steamid">Steamid64</label>
          <input type="number" name="new_steamid" value="<?php echo ($edit ? $steam_id : '');?>" placeholder="SteamID64" class="form-control" required="required" id = "new_steamid">
    </div> 
    <div class="form-group text-center">
        <label></label>
        <button type="submit" class="btn btn-warning" >Save <i class="glyphicon glyphicon-send"></i></button>
    </div>
</fieldset>

<div class="controls">
  <select multiple class="chosen-select" tabindex="8" style="" id="createAppClientList" name="appclient[]">
    <?php foreach ($clientlist as $client): ?>
      <option value="<?php echo $client->personID ?>" <?php if (in_array($client->personID, $addedclients)) echo "selected" ?> ><?php echo "$client->lastname, $client->firstname $client->middlename" ?></option>
    <?php endforeach; ?>
  </select>
  <input type="hidden" id="createAppClientListHidden" name="clientarray" value="">
</div>
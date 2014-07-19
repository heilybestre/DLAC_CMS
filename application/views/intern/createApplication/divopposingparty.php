<select  multiple class="chosen-select" tabindex="8" style="" id="createAppOpposingPartyList" name="appopposing[]">
  <?php foreach ($opposingpartylist as $opposing): ?>
    <option value="<?php echo $opposing->personID ?>" <?php if (in_array($opposing->personID, $addedclients)) echo "disabled" ?> <?php if(in_array($opposing->personID, $addedopposing)) echo "selected" ?> ><?php echo "$opposing->lastname, $opposing->firstname $opposing->middlename" ?></option>
  <?php endforeach; ?>
</select>
<input type="hidden" value="" id="createAppOpposingPartyListHidden" name="opposingarray">
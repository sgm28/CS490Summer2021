 <!--<?php echo "<input type='checkbox'" . "id='" .  $USER["usersName"] . "'" . "name='" . "id[]"
      . "'". "value='" . $USER["usersId"] . "'" . ">"; ?>-->
 <div class="user">
        <div><?php echo $USER['usersName'] ?></div>
        <div><?php echo $USER['usersUid'] ?></div>
        <div class="btn-user-action-wrap"><div class="disable btn-user-action no-select">
          <div class="icon-wrap">
            <span class="material-icons">lock_open</span>
            <span class="material-icons">lock</span>
          </div>
            <div id="<?php echo $USER['usersId']?>" onclick="statusCatalyst(this.id)" class="acct-status"><?php if ($USER['active'] == 1) { ?><span>UN</span> <?php } ?><span>LOCKED</span></div>   
          </div>
        </div>
        <div class="btn-user-action-wrap"><div class="delete btn-user-action no-select">
          <span  id="<?php echo $USER['usersId']?>" onclick="deleteCatalyst(this.id)" class="material-icons">clear</span>
          </div>
        </div>
      </div>


  <div id="submit-catalyst">
  <form action="swapactive.inc.php">
    <?php echo "<input type='hidden'" . "id='" .  $USER["usersName"] . "'" . "name='" . "id[]"
      . "'". "value='" . $USER["usersId"] . "'" . ">"; ?>
    <input type="submit" id="status_submit<?php echo $USER['usersId']?>" value="Submit">
  </form>
</div>


  <div id="submit-catalyst">
  <form action="deleteuser.inc.php">
    <?php echo "<input type='hidden'" . "id='" .  $USER["usersName"] . "'" . "name='" . "id[]"
      . "'". "value='" . $USER["usersId"] . "'" . ">"; ?>
    <input type="submit" id="delete_submit<?php echo $USER['usersId']?>" value="Submit">
  </form>
</div>

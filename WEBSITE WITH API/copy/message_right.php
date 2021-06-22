<style>div {} 
div.breakword{word-wrap: break-word;}
</style>

	<div class="comment">
        <div class="pfp-col_right">
          <div class="pfp"></div>
        </div>
        <div class="comment-content-col">
          <div class="comment-header">
            <div class="user-usn"><?php echo $ROW_USER['usersName'] ?></div>
			<a href="profile.php?id=<?php echo $ROW_USER['usersUid']?>">
				<div class="user-id">@<?php echo $ROW_USER['usersUid'] ?></div>
			</a>
            <div class="post-date"><?php echo $MESSAGE['date'] ?></div>
            <span class="material-icons options">more_vert</span>
          </div>
          <div class="comment-content">
           <?php echo '<p>' . $MESSAGE['message'] . '</p>'; ?>
          </div>
        </div>
      </div>
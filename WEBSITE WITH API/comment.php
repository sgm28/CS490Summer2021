<style>div {} 
div.breakword{word-wrap: break-word;}
</style>
	<div class="comment">
        <div class="pfp-col">
          <div class="pfp"></div>
        </div>
        <div class="comment-content-col">
          <div class="comment-header">
            <div class="user-usn"><?php echo $comment_user['usersName'] ?></div>
			<a href="profile.php?id=<?php echo $comment_user['usersUid']?>">
				<div class="user-id">@<?php echo $comment_user['usersUid'] ?></div>
			</a>
            <div class="post-date"><?php echo $COMMENT['date'] ?></div>
            <span class="material-icons options">more_vert</span>
          </div>
          <div class="comment-content">
           <?php echo '<p>' . $COMMENT['post_text'] . '</p>'; ?>
          </div>
        </div>
      </div>
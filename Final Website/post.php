<style>div {} 
div.breakword{word-wrap: break-word;}
</style>

 <div class="post">
      <div class="pfp-col">
        <div class="pfp"></div>
      </div>
      <div class="post-content-col">
        <div class="post-header">
          <div class="user-usn"><?php echo $ROW_USER['usersName'] ?></div>
      <a href="profile.php?id=<?php echo $ROW_USER['usersUid']?>">
      <div class="user-id">@<?php echo $ROW_USER['usersUid'] ?></div>
      </a>
          <div class="post-date"><?php echo $ROW['date'] ?></div>
          <span class="material-icons options">more_vert</span>
        </div>
        <div class="post-content">
          <?php echo '<p>' . $ROW['post_text'] . '</p>'; ?>
          <div class="post-image">
            <!--//image placeholder-->
          </div>
          <div class="post-actions">
            <div class="post-action btn-comments">
              <div class="two-state-icon">
        <a href="single_post.php?id=<?php echo $ROW['postid'] ?>">
                <span class="material-icons">chat_bubble_outline</span>
        </a>
                <span class="material-icons hidden">chat_bubble</span>
              </div>
              <p></p>
            </div>
            <div class="post-action">
              <!--<span class="material-icons">favorite_border</span>-->
              <p></p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="post-comments hidden">
      <div class="add-comment">
        <div class="pfp-col">
          <div class="pfp"></div>
        </div>
        <div class="add-comment-col">
          <div class="msg-input-wrap">
            <textarea type="text" class="msg-input" placeholder="Write a reply ..." rows="3" maxlength="200" spellcheck="false"></textarea>
          </div>
          <div class="comment-action-bar">
            <div class="comment-option">
              <span class="material-icons">insert_photo</span>
            </div>
            <div class="comment-option">
              <span class="material-icons">gif</span>
            </div>
            <div class="comment-btn-wrap">
              <button class="comment-btn">Comment</button>
            </div>
          </div>
        </div>
      </div>
      
    <?php 
   
   ?>
    </div>

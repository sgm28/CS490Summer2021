<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href="profile_style.css" type="text/css" rel="stylesheet">

<div id="nav-bar-main">
  <div class="size-limiter">
    <input type="text" id="search-main" placeholder="Search users ..." spellcheck="false"/>
    <span class="material-icons">search</span>
  </div>
</div>
<div id="content-main">
  <div class="size-limiter">
    <div id="add-post">
      <div class="pfp-col">
        <div class="pfp"></div>
      </div>
      <div class="self-post-col">
        <div class="msg-input-wrap">
          <textarea type="text" id="self-post-text" class="msg-input" placeholder="What's happening?" rows="4" maxlength="200" spellcheck="false"></textarea>
        </div>
        <div class="post-action-bar">
          <div class="post-option">
            <span class="material-icons">insert_photo</span>
          </div>
          <div class="post-option">
            <span class="material-icons">gif</span>
          </div>
          <div class="post-btn-wrap">
            <button id="self-post" class="post-btn">Post</button>
          </div>
        </div>
      </div>
    </div>
    <div class="post">
      <div class="pfp-col">
        <div class="pfp"></div>
      </div>
      <div class="post-content-col">
        <div class="post-header">
          <div class="user-usn">Aorta</div>
          <div class="user-id">@aorta</div>
          <div class="post-date">Jun 5</div>
          <span class="material-icons options">more_vert</span>
        </div>
        <div class="post-content">
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          <div class="post-image">
            //image placeholder
          </div>
          <div class="post-actions">
            <div class="post-action btn-comments">
              <div class="two-state-icon">
                <span class="material-icons">chat_bubble_outline</span>
                <span class="material-icons hidden">chat_bubble</span>
              </div>
              <p>23</p>
            </div>
            <div class="post-action">
              <span class="material-icons">favorite_border</span>
              <p>45</p>
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
      <div class="comment">
        <div class="pfp-col">
          <div class="pfp"></div>
        </div>
        <div class="comment-content-col">
          <div class="comment-header">
            <div class="user-usn">Commenter</div>
            <div class="user-id">@Commenter</div>
            <div class="post-date">Jun 6</div>
            <span class="material-icons options">more_vert</span>
          </div>
          <div class="comment-content">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
          </div>
        </div>
      </div>
      <div class="comment">
        <div class="pfp-col">
          <div class="pfp"></div>
        </div>
        <div class="comment-content-col">
          <div class="comment-header">
            <div class="user-usn">Commenter</div>
            <div class="user-id">@Commenter</div>
            <div class="post-date">Jun 7</div>
            <span class="material-icons options">more_vert</span>
          </div>
          <div class="comment-content">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="home_profile.js"></script>

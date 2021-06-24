<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href="message2.css" type="text/css" rel="stylesheet">

<div id="sidebar">
  <div id="sidebar-header">
    <a id="btn-menu" class="no-select"><span class="material-icons">menu</span></a>
    <h1 id="main-title">Messages</h1>
    <!--<div id="title-wrap">
      <div id="title-msg">Messages</div>
      <div id="title-usn" class="hidden">User Name</div>
    </div>-->
  </div>
  <div id="main-menu-struct-wrap">
    <div id="main-menu">
      <a class="menu-option">
        <span class="material-icons">person</span>
        Profile
      </a>
      <a class="menu-option">
        <span class="material-icons">settings</span>
        Preferences
      </a>
      <a class="menu-option">
        <span class="material-icons">logout</span>
        Log Out
      </a>
    </div>
    <div id="quick-search-wrap">
      <input type="text" id="quick-search" placeholder="Search ..." />
    </div>
    <div id="user-list">
      <div class="user">
        <div class="pfp-wrap"><div class="pfp"></div></div>
        <div class="user-label">
          <div class="user-name">John Doe</div>
        </div>
        <div class="user-options"><div><span class="material-icons">more_vert</span></div></div>
      </div>
      <div class="user">
        <div class="pfp-wrap"><div class="pfp"></div></div>
        <div class="user-label">
          <div class="user-name">Jason</div>
        </div>
        <div class="user-options"><div><span class="material-icons">more_vert</span></div></div>
      </div>
    </div>
  </div>
</div>
<div id="main-panel">
  <div id="message-panel">
    <div id="message-panel-header">
      <div class="pfp-wrap">
        <div class="pfp"></div>
      </div>
      <div class="recipients">Recipients</div>
      <div id="btn-convo-info" class="no-select"><span class="material-icons">more_horiz</span></div>
    </div>
    <div id="message-panel-main-wrap" class="hide-scrollbar">
      <div id="message-panel-main" class="hide-scrollbar">
        <div class="message-set">
          <div class="pfp"></div>
          <div class="message-set-list">
            <div class="message"><p>Message</p></div>
            <div class="message"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p></div>
            <div class="message"><p>Message</p></div>
          </div>
        </div>
        <div class="message-set self">
          <div class="message-set-list">
            <div class="message"><p>Message</p></div>
            <div class="message"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p></div>
            <div class="message"><p>Message</p></div>
          </div>
        </div>
        <div class="message-set">
          <div class="pfp"></div>
          <div class="message-set-list">
            <div class="message"><p>Message</p></div>
            <div class="message"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p></div>
            <div class="message"><p>Message</p></div>
          </div>
        </div>
        <div class="message-set self">
          <div class="message-set-list">
            <div class="message"><p>Message</p></div>
            <div class="message"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p></div>
            <div class="message"><p>Message</p></div>
          </div>
        </div>
        <div class="message-set">
          <div class="pfp"></div>
          <div class="message-set-list">
            <div class="message"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p></div>
            <div class="message"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p></div>
            <div class="message"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p></div>
            <div class="message image"><img src="https://s3.amazonaws.com/webucator-how-tos/2304.png"></div>
          </div>
        </div>
        <div class="message-set self">
          <div class="message-set-list">
            <div class="message"><p>Message</p></div>
            <div class="message"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p></div>
            <div class="message"><p>Message</p></div>
            <div class="message image"><img src="https://cdn.pixabay.com/photo/2020/04/24/14/49/smartphone-5087176_1280.png"></div>
          </div>
        </div>
      </div>
    </div>
    <form id="message-panel-input-panel" action="send.php">
      <!--<div id="message-panel-option-toggle" class="non-input no-select"><div><span class="material-icons">add_circle</span></div></div>-->
      <div id="message-panel-add-options" class="non-input no-select">
        <div class="message-panel-add-option"><span class="material-icons">insert_photo</span></div>
        <div class="message-panel-add-option"><span class="material-icons">gif</span></div>
      </div>
      <!--<div id="message-panel-text-input">
        <span id="message-panel-text-input" class="textarea" role="textbox" contenteditable></span>
      </div>-->
      <!--<textarea type="text" id="message-panel-text-input" placeholder="Aa" spellcheck="false"></textarea>-->
      <div id="message-panel-text-input-outer-wrap">
        <div id="message-panel-text-input-wrap">
          <span id="message-panel-text-input" class="textarea" role="textbox" contenteditable="true" spellcheck="false"style="white-space:nowrap"></span>
        </div>
      </div>
      <div id="message-panel-send" class="non-input no-select"><span class="material-icons">send</span></div>
    </form>
  </div>
  <div id="convo-info-panel" class="active">
    <div class="pfp"></div>
    <div class="recipients">Recipients</div>
    <div id="convo-options-list">
      <a class="convo-option">
        <span class="material-icons">person</span>
        Profile
      </a>
      <a class="convo-option">
        <span class="material-icons">more_horiz</span>
        Option 2
      </a>
      <a class="convo-option">
        <span class="material-icons">more_horiz</span>
        Option 3
      </a>
    </div>
  </div>
</div>
<div id="submit-catalyst" class="debug">
  <form id="form-msg" action="send.php">
    <input type="text" id="form-msg-input" spellcheck="false">
    <input type="submit" id="submit" value="Submit">
  </form>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" async></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js" async></script>
<script src="message1.js"></script>
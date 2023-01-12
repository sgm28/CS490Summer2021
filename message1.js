// init global variables
var $viewportWidth;
var $inputCurrWidth;
var user_name = "User Name";

// Assign new width to input structure
function bothWidth(width) {
  $('#message-panel-text-input-outer-wrap').css('max-width', function(){
    return width;
  });
  $('#message-panel-text-input-outer-wrap').css('width', function(){
    return width;
  });
}

// Fix initial input structure width
$(document).ready(function() {
  $viewportWidth = $(window).width();
  $inputCurrWidth = $('#message-panel-text-input-wrap').width();
  bothWidth($inputCurrWidth);
});

// Open menu when clicking menu button
$('#btn-menu').click(function() {
  console.log('tets');
  $('#main-menu').toggleClass('active');
  if ($('#main-menu').hasClass('active')) {
    $('#main-title').text('User Name');
  } else {
    $('#main-title').text('Messages');
  }
});
// Close menu if clicking outside it
$(document).on('click', function(event) {
  if (!$(event.target).closest('#main-menu').length && !$(event.target).closest('#sidebar-header').length) {
    if ($('#main-menu').hasClass('active')) {
      $('#main-menu').removeClass('active');
      $('#main-title').text('Messages');
    }
  }
});

// debounce so filtering doesn't happen every millisecond
function debounce( fn, threshold ) {
  var timeout;
  threshold = threshold || 100;
  return function debounced() {
    clearTimeout( timeout );
    var args = arguments;
    var _this = this;
    function delayed() {
      fn.apply( _this, args );
    }
    timeout = setTimeout( delayed, threshold );
  };
}

// ISOTOPE SORTING
// store filter for each group
var buttonFilters = {};
var buttonFilter;
// quick search regex
var qsRegex;

// init Isotope
var $grid = $('#user-list').isotope({
  itemSelector: '.user',
  layoutMode: 'vertical',
  filter: function() {
    var $this = $(this);
    var searchResult = qsRegex ? $this.find('.identifier>.name, .user-name').text().match( qsRegex ) : true;
    var buttonResult = buttonFilter ? $this.is( buttonFilter ) : true;
    return searchResult && buttonResult;
  },
});

// use value of search field to filter
var $quicksearch = $('#quick-search').keyup( debounce( function() {
  qsRegex = new RegExp( $quicksearch.val(), 'gi' );
  $grid.isotope();
}) );
// End Isotope sorting

// Open conversation information panel (on the right)
$('#btn-convo-info').click(function() {
  $('#convo-info-panel').toggleClass('active');
  if ($('#convo-info-panel').hasClass('active')) {
    $inputCurrWidth -= 300;
  } else {
    $inputCurrWidth += 300;
  }
  bothWidth($inputCurrWidth);
});

/* deprecated
// Toggle active state of the toggle button
$('#message-panel-option-toggle').click(function() {
  $(this).toggleClass('active');
});
*/

// Function to calculate new width and assign to input structure
function inputWindowResize() {
  var $newViewportWidth = $(window).width();
  var $widthDiff = $newViewportWidth - $viewportWidth;
  $inputCurrWidth += $widthDiff;
  bothWidth($inputCurrWidth);
}

// Adjust input structure size when changing viewport size
$(window).resize( debounce( function() {
  inputWindowResize();
}));

// Focus the input span element when clicking any of the intended input area
$('#message-panel-text-input-wrap').click(function(){
  $('#message-panel-text-input').focus();
});

/* experiment
var scrolled = false;
function updateScroll(){
    if(!scrolled){
        var element = document.getElementById("yourDivID");
        element.scrollTop = element.scrollHeight;
    }
}

$('#message-panel-main').on('scroll', function(){
    scrolled=true;
});*/

$('body').on('keypress', '#message-panel-text-input', function(args) {
    if (args.keyCode == 13) {
        console.log($("#message-panel-text-input").text());
      $("#message-panel-text-input").text("");
    }
});

function msgCatalyst() {
  // Grab message from input
  var msg = $('#message-panel-text-input').text()
  console.log(msg);
  // If input not empty
  if (msg.length != 0) {
    // Copy into catalyst
    $('#form-msg-input').val(msg);
    // Empty input
    $('#message-panel-text-input').text('');
    // Click submit button
    $('#submit').click()
  }
}

$('#message-panel-text-input').keydown(function(e){
  // Enter was pressed
  if (e.keyCode == 13 /*&& !e.shiftKey*/)
  {
    // prevent default behavior
    e.preventDefault();
    // Call catalyst function
    msgCatalyst();
  }
});

$('#message-panel-send').click(function() {
  msgCatalyst();
});

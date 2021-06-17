$('.btn-comments').on('click', function(e) {
  //var $comments = $(this).parent().next();
  $(this).children().eq(0).children().eq(1).toggleClass('hidden');
  var $comments = $(this).closest('.post').next();
  $comments.toggleClass('hidden');
});

$('.nav-bar-margin > .pfp').on('click', function() {
  var $menu = $(this).children().eq(0);
  if ($menu.hasClass('hidden')) {
    $('#search-main').css('z-index', '-100000');

  } else {
    $('#search-main').css('z-index', '1');
  }
  $menu.toggleClass('hidden');
});

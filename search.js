$('.nav-bar-margin > .pfp').on('click', function() {
  var $menu = $(this).children().eq(0);
  if ($menu.hasClass('hidden')) {
    $('#search-main').css('z-index', '-100000');

  } else {
    $('#search-main').css('z-index', '1');
  }
  $menu.toggleClass('hidden');
});

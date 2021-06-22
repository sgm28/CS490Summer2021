$(document).ready(function() {
  //$('.sign-up-toggle').hide();
});

var main = document.getElementById('main');

document.getElementById('sign-up').onclick = function() {
  //$('.sign-up-toggle').addClass('sign-up-toggle-active');
  $('.sign-up-toggle.start-on').addClass('now-off');
  $('.sign-up-toggle.start-off').addClass('now-on');
}
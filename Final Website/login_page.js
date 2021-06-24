$('#sign-up, #log-in').on('click', function(e) {
  $('.sign-up-toggle').toggleClass('hidden');;
  if (e.target.id == 'sign-up') {
    $('#submit').attr('value', 'Sign Up')
    $('#form').attr('action', 'signup.inc.php')
  } else {
    $('#submit').attr('value', 'Log In')
    $('#form').attr('action', 'login.inc.php')
  }
  
});

$('#btn').on('click', function(e) {
  $('.box-error').toggleClass('hidden');
});

/*$('#submit').on('click', function(e) {
  if (e.target.attr('value') == 'Log In') {
    console.log('yes');
  }
});*/
$('#add-user').click(function(){
  $(this).toggleClass('active');
  $('#panel-add-user').toggleClass('active');
});

function addToUserList(userName, usn) {
  $('#user-list').prepend(
    $('<div/>', {'class': 'user'}).append(
      $('<div/>').text(userName)
    )
    .append(
      $('<div/>').text(usn)
    )
    .append(
      $('<div/>', {'class': 'btn-user-action-wrap'}).append(
        $('<a/>', {'class': 'disable btn-user-action no-select'}).append(
          $('<div/>', {'class': 'icon-wrap'}).append(
            $('<span/>', {'class': 'material-icons'}).text('lock_open')
          )
          .append(
            $('<span/>', {'class': 'material-icons'}).text('lock')
          )
        )
        .append(
          $('<div/>', {'class': 'acct-status'}).append(
            $('<span/>').text('UN')
          )
          .append(
            $('<span/>').text('LOCKED')
          )
        )
      )
    )
    .append(
      $('<div/>', {'class': 'btn-user-action-wrap'}).append(
        $('<a/>', {'class': 'delete btn-user-action no-select'}).append(
          $('<span/>', {'class': 'material-icons'}).text('clear')
        )
      )
    )
  );
}


/*$('#submit').click(function(){
  var userName = $('#name').val();
  var usn = $('#uid').val();
  $('.add-user-field > input').each(function(){
    $(this).val('');
  });
  $('#add-user').click();
  addToUserList(userName, usn);
});*/

$(document).on('click','.disable',function(){
  $(this).toggleClass('active');
});

$(document).on('click','.delete',function(){
  var userEntry = $(this).closest('.user');
  userEntry.slideToggle(200);
  setTimeout(function(){
    userEntry.remove();
  }, 200);
});


function statusCatalyst(clicked_id) {
   $('#status_submit' + clicked_id).click()
}

function deleteCatalyst(clicked_id) {
   $('#delete_submit' + clicked_id).click()
}
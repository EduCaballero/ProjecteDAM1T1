 $(document).ready(function() {
  $('.dropdown').hover(
    function() {
      $(this).children('.dropdown-sub').slideDown(200);
    },
    function() {
      $(this).children('.dropdown-sub').stop();
      $(this).children('.dropdown-sub').slideUp(0);
  });
  $('.signin').click(enableModal);
  $('#overlay').click(disableMenu);
});

function enableModal() {
  $('body').addClass('has-active-modal');
  setTimeout(visibleModal, 200);
} 

function visibleModal() {
  $('#modal-container').addClass('visible');
}

function disableMenu() {
   $('body').removeClass('has-active-modal');
   $('#modal-container').removeClass('visible');
}

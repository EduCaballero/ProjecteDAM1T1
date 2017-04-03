$(document).ready(function() {
  $('#overlay').click(disableModal);
  $('.close-modal').click(disableModal);
});

function enableModal() {
  $('body').addClass('has-active-modal');
  setTimeout(visibleModal, 200);
} 

function visibleModal() {
  $('#modal-container').addClass('visible');
}

function disableModal() {
   $('body').removeClass('has-active-modal');
   $('#modal-container').removeClass('visible');
}

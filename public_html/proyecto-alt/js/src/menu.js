function enableMenu() {
  var overlay = document.querySelector("body");
  overlay.classList.add("has-active-menu");
}

function disableMenu() {
  var overlay = document.querySelector("body");
  var modal = document.querySelector("#modal-container");
  overlay.classList.remove("has-active-menu");
  overlay.classList.remove("has-active-modal");
  modal.classList.remove("visible");
}

/*
 * Drop-down menu
 */

 $(document).ready(function() {
  $('.dropdown').hover(
    function(){
      $(this).children('.dropdown-sub').slideDown(200);
    },
    function(){
      $(this).children('.dropdown-sub').slideUp(0);
    }
    );
});

 /*
  * Login Modal
  */

  function enableModal() {
    var overlay = document.querySelector("body");
    overlay.classList.add("has-active-modal");
    setTimeout(visibleModal, 200);
  }

  function visibleModal() {
    var modal = document.querySelector("#modal-container");
    modal.classList.add("visible");
  }
$(document).ready(function() {
  $("#overlay").click(function() {
    $("body").removeClass("has-active-menu");
  });
  $(".mobile-menu-button").click(function() {
     $("body").addClass("has-active-menu");
  });
});

function enableModal() {
  var overlay = document.querySelector("body");
  overlay.classList.add("has-active-modal");
  setTimeout(visibleModal, 200);
}

function visibleModal() {
  var modal = document.querySelector("#modal-container");
  modal.classList.add("visible");
}
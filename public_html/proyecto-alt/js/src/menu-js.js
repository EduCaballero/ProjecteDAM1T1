(function(window) {

  'use strict';

  function Menu() {
    this.body = document.body;
    this.overlay = document.querySelector('#overlay');
    this.menu = document.querySelector('#mobile-menu');
    this.menuOpener = document.querySelector('.mobile-menu-button');
    this.events();
  }

  Menu.prototype.events = function() {
    // Event for clicks on the overlay.
    this.overlay.addEventListener('click', function(e) {
      e.preventDefault();
      this.close();
    }.bind(this));
  };

  Menu.prototype.open = function() {
    this.body.classList.add('has-active-menu');
    this.menu.classList.add('enabled');
    this.overlay.classList.add('enabled');
    this.menuOpener.disabled = true;
  };

  Menu.prototype.close = function() {
    this.body.classList.remove('has-active-menu');
    this.menu.classList.remove('enabled');
    this.overlay.classList.remove('enabled');
    this.menuOpener.disabled = false;
  };

  /**
   * Add to global namespace.
   */
   window.Menu = Menu;

 })(window);

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
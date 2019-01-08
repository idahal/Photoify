'use strict';

// navbar
let mainNav = document.getElementById('js-menu');
let navBarToggle = document.getElementById('js-navbar-toggle');

navBarToggle.addEventListener('click', function () {
  mainNav.classList.toggle('active');
});

//display wich file user pick
document.getElementById("file-upload").onchange = function() {
  document.getElementById("uploadFile").value = this.value;
};

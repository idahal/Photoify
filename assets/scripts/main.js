'use strict';

// navbar
let mainNav = document.getElementById('js-menu');
let navBarToggle = document.getElementById('js-navbar-toggle');

navBarToggle.addEventListener('click', function () {
  mainNav.classList.toggle('active');
});

//
// let fileUpload = document.getElementById("file-upload");
// let uploadFile = document.getElementById("uploadFile");

//display wich file user pick
const fileUpload = document.getElementById("file-upload")
  if(fileUpload){
  fileUpload.addEventListener('change', function() {
    document.getElementById("uploadFile").value = this.value;
  });
}

'use strict';

// navbar toogle
let mainNav = document.getElementById('js-menu');
let navBarToggle = document.getElementById('js-navbar-toggle');

navBarToggle.addEventListener('click', function () {
  mainNav.classList.toggle('active');
});


//display wich file user choose when upload image
const fileUpload = document.getElementById("file-upload")
  if(fileUpload){
  fileUpload.addEventListener('change', function() {
    document.getElementById("uploadFile").value = this.value.replace("C:\\fakepath\\", "");
  });
}

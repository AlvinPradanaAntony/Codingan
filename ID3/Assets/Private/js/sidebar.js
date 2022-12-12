$(document).ready(function () {
  $("#menu").click(function (e) {
    $("#sidebar").toggleClass("close");

    e.preventDefault();
    if ($("#sidebar").hasClass("close")) {
      $("#logo_sidebar").attr("src", "Assets/Private/img/logoLt.png");
      $("#logo_sidebar").attr("width", "40");
    } else {
      $("#logo_sidebar").attr("src", "Assets/Private/img/logo.png");
      $("#logo_sidebar").attr("width", "135");
    }
  });
});

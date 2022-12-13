$(document).ready(function () {
  $("#menu").click(function (e) {
    $("#sidebar").toggleClass("close");

    e.preventDefault();
    if ($("#sidebar").hasClass("close")) {
      $("#logo_sidebar")
        .fadeOut(150, function () {
          $("#logo_sidebar").attr("src", "Assets/Private/img/logoLt.png");
          $("#logo_sidebar").attr("width", "40");
        })
        .fadeIn(150);
    } else {
      $("#logo_sidebar")
        .fadeOut(150, function () {
          $("#logo_sidebar").attr("src", "Assets/Private/img/logo.png");
          $("#logo_sidebar").attr("width", "135");
        })
        .fadeIn(150);
    }
  });
});

$(document).ready(function () {
  $(".collapse").on("show.bs.collapse", function () {
    $(".collapse.show").each(function () {
      $(this).collapse("hide");
    });
  });
});

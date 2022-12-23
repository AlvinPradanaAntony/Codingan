/*========== SIDEBAR ACTIVE/DEACTIVATE ==========*/
$(document).ready(function () {
  $("#menu").click(function (e) {
    $("#sidebar").toggleClass("close");
  });
});

/*========== COLLAPSE/ACCORDION ==========*/
$(document).ready(function () {
  $(".collapse").on("show.bs.collapse", function () {
    $(".collapse.show").each(function () {
      $(this).collapse("hide");
    });
  });
});
$(document).ready(function () {
  // Tambahkan class ketika collapse di klik
  $(".collapse")
    .on("show.bs.collapse", function () {
      $(this).parent().addClass("nav-item-active");
    })
    .on("hide.bs.collapse", function () {
      $(".nav-item").removeClass("nav-item-active");
    });
});
$(document).ready(function () {});

/*==================== DARK LIGHT THEME ====================*/
$(document).ready(function () {
  var darkMode;

  if (localStorage.getItem("dark-mode")) {
    // if dark mode is in storage, set variable with that value
    darkMode = localStorage.getItem("dark-mode");
  } else {
    // if dark mode is not in storage, set variable to 'light'
    darkMode = "light";
  }

  // set new localStorage value
  localStorage.setItem("dark-mode", darkMode);

  if (localStorage.getItem("dark-mode") == "dark") {
    $("body").addClass("dark-theme");
    $("#theme-button").removeClass("uil-moon");
    $("#theme-button").addClass("uil-sun");
    $("#logo_sidebar").attr("src", "Assets/Private/img/logoW.png");
    $("#img_login").attr("src", "Assets/Private/img/auth-img-dark.png");

    if ($("#sidebar").hasClass("close")) {
      $("#logo_sidebar")
        .fadeOut(150, function () {
          $("#logo_sidebar").attr("src", "Assets/Private/img/logoLtW.png");
          $("#logo_sidebar").attr("width", "40");
        })
        .fadeIn(150);
    } else {
      $("#logo_sidebar")
        .fadeOut(150, function () {
          $("#logo_sidebar").attr("src", "Assets/Private/img/logoW.png");
          $("#logo_sidebar").attr("width", "135");
        })
        .fadeIn(150);
      $("#img_login")
        .fadeOut(100, function () {
          $("#img_login").attr("src", "Assets/Private/img/auth-img-dark.png");
        })
        .fadeIn(100);
    }
  }

  $("#theme-button").on("click", function () {
    if ($("body").hasClass("dark-theme")) {
      $("#theme-button").removeClass("uil-sun");
      $("#theme-button").addClass("uil-moon");
      $("body").removeClass("dark-theme");

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
        $("#img_login")
          .fadeOut(100, function () {
            $("#img_login").attr("src", "Assets/Private/img/auth-img.png");
          })
          .fadeIn(100);
      }
      // set stored value to 'light'
      localStorage.setItem("dark-mode", "light");
    } else {
      $("#theme-button").removeClass("uil-moon");
      $("#theme-button").addClass("uil-sun");
      $("body").addClass("dark-theme");

      if ($("#sidebar").hasClass("close")) {
        $("#logo_sidebar")
          .fadeOut(150, function () {
            $("#logo_sidebar").attr("src", "Assets/Private/img/logoLtW.png");
            $("#logo_sidebar").attr("width", "40");
          })
          .fadeIn(100);
      } else {
        $("#logo_sidebar")
          .fadeOut(150, function () {
            $("#img_login").attr("src", "Assets/Private/img/auth-img-dark.png");
            $("#logo_sidebar").attr("src", "Assets/Private/img/logoW.png");
            $("#logo_sidebar").attr("width", "135");
          })
          .fadeIn(150);
        $("#img_login")
          .fadeOut(100, function () {
            $("#img_login").attr("src", "Assets/Private/img/auth-img-dark.png");
          })
          .fadeIn(100);
      }
      // set stored value to 'dark'
      localStorage.setItem("dark-mode", "dark");
    }
  });
  $("#menu").click(function (e) {
    e.preventDefault();
    $("#logo_sidebar")
      .fadeOut(150, function () {
        if ($("#sidebar").hasClass("close")) {
          if ($("body").hasClass("dark-theme")) {
            $("#logo_sidebar").attr("src", "Assets/Private/img/logoLtW.png");
            $("#logo_sidebar").attr("width", "40");
          } else {
            $("#logo_sidebar").attr("src", "Assets/Private/img/logoLt.png");
            $("#logo_sidebar").attr("width", "40");
          }
        } else {
          if ($("body").hasClass("dark-theme")) {
            $("#img_login").attr("src", "Assets/Private/img/auth-img-dark.png");
            $("#logo_sidebar").attr("src", "Assets/Private/img/logoW.png");
            $("#logo_sidebar").attr("width", "135");
          } else {
            $("#img_login").attr("src", "Assets/Private/img/auth-img.png");
            $("#logo_sidebar").attr("src", "Assets/Private/img/logo.png");
            $("#logo_sidebar").attr("width", "135");
          }
        }
      })
      .fadeIn(150);
  });
});

/*==================== Waktu ====================*/
$(document).ready(function () {
  var interval = setInterval(function () {
    var momentNow = moment();
    $("#date-part").html(momentNow.format("dddd").substring(0, 20) + ", " + momentNow.format("DD MMMM YYYY"));
    $("#time-part").html(momentNow.format("hh:mm:ss A"));
  }, 100);
});

/*========== SHOW/HIDE PASSWORD INPUT ==========*/
$("#passInput").keyup(function () {
  var inputs = $("#passInput").val();
  $("#spanEye").fadeIn("slow");
  if (inputs == "") {
    $("#spanEye").fadeOut("slow");
    $("#spanEye").removeClass("show");
    $("#spanEye").addClass("hidden");
  } else {
    $("#spanEye").fadeIn("slow");
    $("#spanEye").removeClass("hidden");
    $("#spanEye").addClass("show");
  }
});
$(".show-hide").click(function () {
  $(this).toggleClass("uil-eye-slash uil-eye");
  var input = $($(this).attr("toggle"));
  if (input.attr("type") == "password") {
    input.attr("type", "text");
    $("#iconShowHide").css("color", "#5886ef");
  } else {
    input.attr("type", "password");
    $("#iconShowHide").css("color", "#d8d8d8");
  }
});

/*========== GET CURRENT YEAR ==========*/
var currentYear = new Date().getFullYear();
$(document).ready(function () {
  $("#year").text(new Date().getFullYear());
});

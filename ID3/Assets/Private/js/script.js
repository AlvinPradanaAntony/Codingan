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

/*==================== DARK LIGHT THEME ====================*/
// const themeButton = document.getElementById("theme-button");
// const darkTheme = "dark-theme";
// const iconTheme = "uil-sun";

// // Previously selected topic (if user selected)
// const selectedTheme = localStorage.getItem("selected-theme");
// const selectedIcon = localStorage.getItem("selected-icon");

// // We obtain the current theme that the interface has by validating the dark-theme class
// const getCurrentTheme = () => (document.body.classList.contains(darkTheme) ? "dark" : "light");
// const getCurrentIcon = () => (themeButton.classList.contains(iconTheme) ? "uil-moon" : "uil-sun");

// // We validate if the user previously chose a topic
// if (selectedTheme) {
//   // If the validation is fulfilled, we ask what the issue was to know if we activated or deactivated the dark
//   document.body.classList[selectedTheme === "dark" ? "add" : "remove"](darkTheme);
//   themeButton.classList[selectedIcon === "uil-moon" ? "add" : "remove"](iconTheme);
// }

// // Activate / deactivate the theme manually with the button
// themeButton.addEventListener("click", () => {
//   // Add or remove the dark / icon theme
//   document.body.classList.toggle(darkTheme);
//   themeButton.classList.toggle(iconTheme);
//   // We save the theme and the current icon that the user chose
//   localStorage.setItem("selected-theme", getCurrentTheme());
//   localStorage.setItem("selected-icon", getCurrentIcon());
// });

/*==================== Waktu ====================*/
$(document).ready(function () {
  var interval = setInterval(function () {
    var momentNow = moment();
    $("#date-part").html(momentNow.format("dddd").substring(0, 20) + ", " + momentNow.format("DD MMMM YYYY"));
    $("#time-part").html(momentNow.format("hh:mm:ss A"));
  }, 100);
});

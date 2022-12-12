//Page Dashboard
$(".show-hide").click(function () {
  $(this).toggleClass("fa-eye-slash fa-eye");
  var input = $($(this).attr("toggle"));
  if (input.attr("type") == "password") {
    input.attr("type", "text");
    $("#iconShowHide").css("color", "#5886ef");
  } else {
    input.attr("type", "password");
    $("#iconShowHide").css("color", "#d8d8d8");
  }
});

// $("#main #courses").hover(function () {
//   if ($("#main #courses #item2").attr("src") === require("../assets/ico/SchoolW.png")) {
//     $("#main #courses #item2").attr("src", require("../assets/ico/School.png"));
//   } else {
//     $("#main #courses #item2").attr("src", require("../assets/ico/SchoolW.png"));
//   }
// });

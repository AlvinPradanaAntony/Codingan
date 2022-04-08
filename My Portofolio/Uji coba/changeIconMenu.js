$(document).ready(function ($) {
  $("#dashboard").mouseover(function () {
    $("#item1").attr("src", "assets/ico/DashboardIcoW.png");
  });
  $("#dashboard").mouseout(function () {
    $("#item1").attr("src", "assets/ico/DashboardIco.png");
  });
  $("#courses").mouseover(function () {
    $("#item2").attr("src", "assets/ico/SchoolW.png");
  });
  $("#courses").mouseout(function () {
    $("#item2").attr("src", "assets/ico/School.png");
  });
  $("#schedule").mouseover(function () {
    $("#item3").attr("src", "assets/ico/ScheduleW.png");
  });
  $("#schedule").mouseout(function () {
    $("#item3").attr("src", "assets/ico/Schedule.png");
  });
  $("#teachers").mouseover(function () {
    $("#item4").attr("src", "assets/ico/peopleW.png");
  });
  $("#teachers").mouseout(function () {
    $("#item4").attr("src", "assets/ico/people.png");
  });
  $("#quiz").mouseover(function () {
    $("#item5").attr("src", "assets/ico/QuizW.png");
  });
  $("#quiz").mouseout(function () {
    $("#item5").attr("src", "assets/ico/Quiz.png");
  });
});
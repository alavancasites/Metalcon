$(document).ready(function () {
  $(".novidades_lista a").css("opacity", "1");
  $(".novidades_lista a").hover(function () {
    $(this).parent().parent().parent().find(".novidades_lista a").css("opacity", "0.7");
    $(this).css("opacity", "1");
    $(this).mouseleave(function () {
      $(this).parent().parent().parent().find(".novidades_lista a").css("opacity", "1");
    });
  });
});
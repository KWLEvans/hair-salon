$(function() {
  $(".require-confirmation").click(function() {
    $(this).next().toggle();
    $(this).toggleClass('selected');
    $(this).siblings('button').next().hide();
    $(this).siblings('button').removeClass('selected');
  });

  $(".no-button").click(function(event) {
    event.preventDefault();
    $(this).parent().hide();
  });
});

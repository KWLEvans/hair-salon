$(function() {
  $(".require-confirmation").click(function() {
    $(this).next().toggle();
    $(this).siblings('button').next().hide();
  });

  $(".no-button").click(function(event) {
    event.preventDefault();
    $(this).parent().hide();
  });
});

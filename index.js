$(document).ready(function() {
  $('#slidebottom button').click(function() {
    $(this).next().slideToggle();
  });
});

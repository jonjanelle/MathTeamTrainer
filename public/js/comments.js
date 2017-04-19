$(document).ready(function(){
  /*
  If output is being shown, menu starts hidden (up).
  Otherwise the menu starts visible (down).
  */
  $("#new-comment-toggle").click(function() {
    $('#new-comment-div').slideToggle();
  });

});

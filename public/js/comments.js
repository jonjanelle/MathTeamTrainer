$(document).ready(function(){
  /*
  If output is being shown, menu starts hidden (up).
  Otherwise the menu starts visible (down).
  */
  $("#new-comment-toggle").click(function() {
    $('#new-comment-div').slideToggle();
  });
});


/*
 * Respond to upvote/downvote click.
 */
function storeLike(category, pid, cid, dir) {
    $.get("/problems/"+category+"/problem/"+pid+"/vote/"+cid+"/"+dir, function (data) {
      $("#likes"+data.id).html(data.likes);
      $("#dislikes"+data.id).html(data.dislikes);
    });
  }

  /*
   * Delete comment and return home.
   */
  function deleteComment(cid) {
      var row = document.getElementById("row"+cid);
      $.get("/home/deletecomment/"+cid, function (data) {
        row.parentNode.removeChild(row);
      });
    }

    /*
     * Create a comment
     */
     function newComment(category, pid){
       console.log("here");
       $.ajax({
            type: 'POST',
            url: '/problems/'+category+'/problem/'+pid+'/comment',
            data: { '_token': token},
            dataType: 'json',
            success: function(stuff){
              console.log("posted");
            }
        });
      }

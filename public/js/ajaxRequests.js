function storeLike(category, pid, cid, dir) {
    $.ajax({
        type: "POST",
        url: "/problems/"+category+"/problem/"+pid+"/vote/"+cid+"/"+dir,
        success: function() {
          console.log("Like saves");
        }
    });
  }


<div class="comment-box shadow-transition" id="c{{$comment->id}}">
  <div class="comment-author">{{$comment->user->name}}
    <div class="comment-vote">
      <div onclick="storeLike('{{$problem->category}}',{{$problem->id}},{{$comment->id}},'up')">
        <span class="glyphicon glyphicon-thumbs-up" id="likes{{$comment->id}}">{{$comment->likes}}</span>
      </div>
    </div>
    <div class="comment-vote">
      <div onclick="storeLike('{{$problem->category}}',{{$problem->id}},{{$comment->id}},'down')">
        <span class="glyphicon glyphicon-thumbs-down" id="dislikes{{$comment->id}}">{{$comment->dislikes}}</span>
      </div>
    </div>
  </div>
  <div class="comment-date">{{$comment->created_at}}</div>
  <div class="comment-message">{{$comment->message}}</div>
</div>

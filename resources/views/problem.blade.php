@extends('master.master')
@section('title')
{{$problem->name}} - Math Team Trainer
@endsection
@push('head')
<link rel="stylesheet" href= "/css/problems.css">
@endpush

@section('content')

<div class="header" id="problem-title">
  {{$problem->category}} - {{$problem->name}}
  <div class="sub-header">
    <div class="alert alert-info" id='sub-head-alert'>
      @if ($prev !='None')
      <div id="left-link">
        <a href="/problems/{{$problem->category}}/problem/{{$prev}}">
          <span class="glyphicon glyphicon-circle-arrow-left arrow-link"></span>
        </a>
      </div>
      @endif
      Difficulty: {{$problem->difficulty}}
      @if ($next!='None')
      <div id="right-link">
        <a href="/problems/{{$problem->category}}/problem/{{$next}}">
          <span class="glyphicon glyphicon-circle-arrow-right arrow-link"></span>
        </a>
      </div>
      @endif
    </div>
    XP: {{$problem->xp}}
    @if (in_array($problem->id,$solved))
    <span class="glyphicon glyphicon-ok green-check"></span>
    @endif
  </div>
</div>
<!-- end header -->

<!-- begin problem display -->
<div class="pad-20">
  <div class="img-box light-shadowbox">
    <img src="{{$problem->image}}" alt="problem image">
  </div>

  @if ($feedback)
  @if ($correct)
  <div class="alert alert-success feedback-box" id="correct-answer">
    <button type="button" class="close" data-target="#correct-answer" data-dismiss="alert">
      <span aria-hidden="true">X</span>
    </button>
    {{$userAns}} is correct. Way to go!
  </div>

  @else
  <div class="alert alert-danger feedback-box" id="incorrect-answer">
    <button type="button" class="close" data-target="#incorrect-answer" data-dismiss="alert">
      <span aria-hidden="true">X</span>
    </button>
    {{$userAns}} is incorrect. Try again.
  </div>
  @endif
  @endif
  @if (count($errors) > 0)
  <div class="alert alert-danger feedback-box" id="error-box">
    <button type="button" class="close" data-target="#ierror-box" data-dismiss="alert">
      <span aria-hidden="true">X</span>
    </button>
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif

  <!-- begin problem answer input form -->
  <div class="answer-form-div">
    <form id="answer-form" method="POST" action="/problems/{{$problem->category}}/problem/{{$problem->id}}/check">
      {{ csrf_field() }}
      <h3>
        <label for="answer-input">Answer</label>
      </h3>
      <div class="input-group">
        <span class="input-group-addon" id="submit-addon1">
          <a href="#" data-toggle="tooltip" title="Required. Enter exact answer. Numeric answers will not exceed four decimal places.">
            <span class="glyphicon glyphicon-info-sign" id="input-tooltip"></span>
          </a>
        </span>
        <input type="text" class="form-control" id="answer-input" name="answer-input" aria-describedby="submit-addon1" required>
      </div>
      <div class="spacer-sm">
        <input class="btn btn-primary" type="submit" value="Submit">
      </div>
    </form>
  </div>
</div>
<!-- end problem display -->

<!--begin comment section-->
<div class="spacer-lg-top"></div>
@if (Auth::guest())
<div class="comment-header">
  <a href="/login">
    <span class="glyphicon glyphicon-lock"></span>
    Login to view the discussion board for this problem.
  </a>
</div>
@else <!--user logged in, show comments-->
<div class="comment-container">
  <div class="comment-header">
    <span class="glyphicon glyphicon-comment"></span>
    Comments
  </div>
  <div id="new-comment-toggle">Post new comment</div>
  <div id="new-comment-div">
    <form method="POST" id="comment-form" action="/problems/{{$problem->category}}/problem/{{$problem->id}}/comment">
    <!--
    <form method="POST" id="comment-form" action="javascript:newComment('{{$problem->category}}',{{$problem->id}})">
    -->
      {{ csrf_field() }}
      <div class="form-group">
        <textarea rows="3" class="form-control" id="commentInput" name="comment-input" placeholder="Posts containing profanity, insults, or answers are not allowed and will be removed." required></textarea>
        <input class="btn btn-primary" id="comment-submit" type="submit" value="Post">
      </div>
    </form>
  </div>
  @foreach($comments as $comment)
  @include('master.commentbox')
  <!--
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
  -->
  @endforeach
</div>
@endif

@endsection
@push('body')
<script type="text/javascript" src="/js/comments.js"></script>
@endpush

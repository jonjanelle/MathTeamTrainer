@extends('master.master')
@section('title')
  {{$problem->name}} - Math Team Trainer
@endsection
@push('head')
  <link rel="stylesheet" href= "/css/problems.css">
@endpush

@section('content')

  <div class="header">
    @if ($prev !='None')
      <div id="left-link">
        <a href="/problems/{{$problem->category}}/{{$prev}}">
          <span class="glyphicon glyphicon-circle-arrow-left arrow-link"></span>
        </a>
      </div>
    @endif

    {{$problem->category}} - {{$problem->name}}
    @if ($next!='None')
      <div id="right-link">
        <a href="/problems/{{$problem->category}}/{{$next}}">
          <span class="glyphicon glyphicon-circle-arrow-right arrow-link"></span>
        </a>
      </div>
    @endif

    <div class="sub-header">
      <div class="alert alert-info" id='sub-head-alert'>
        Difficulty: {{$problem->difficulty}}
      </div>
      XP: {{$problem->xp}}
    </div>
  </div> <!-- end header -->
  <div class="pad-20"><!-- begin problem display -->
    <div class="img-box light-shadowbox">
      <img src={{$problem->image}} alt="problem image">
    </div>

    @if ($feedback)
      @if ($correct)
        <div class="alert alert-success feedback-box" id="correctAns">
          <button type="button" class="close" data-target="#correctAns" data-dismiss="alert">
            <span aria-hidden="true">X</span>
          </button>
          {{$userAns}} is correct. Way to go!
        </div>

      @else
        <div class="alert alert-danger feedback-box" id="incorrectAns">
          <button type="button" class="close" data-target="#incorrectAns" data-dismiss="alert">
            <span aria-hidden="true">X</span>
          </button>
          {{$userAns}} is incorrect. Try again.
        </div>
      @endif
    @endif
    <!-- begin problem answer input form -->
    <div class="answer-form-div">
      <form id="answer-form" method="POST" action="/problems/{{$problem->category}}/problem/{{$problem->id}}/check">
        {{ csrf_field() }}
        <h3>
          <label for="answer-input">Answer</label>
        </h3>
        <div class="input-group">
          <span class="input-group-addon" id="submit-addon1"><span class="glyphicon glyphicon-pencil"></span></span>
          <input type="text" class="form-control" id="answer-input" name="answer-input" aria-describedby="submit-addon1">
        </div>
        <div class="spacer-sm">
          <input class="btn btn-primary" type="submit" value="Submit">
        </div>
      </form>
    </div>
  </div><!-- end problem display -->

  <!--comment section will go below-->
  <div class="spacer-lg-top"></div>
  @if (Auth::guest())
    <div class="comment-header">
      <span class="glyphicon glyphicon-lock"></span>
      Login to view the discussion board for this problem.
    </div>
    @else
      <div class="comment-container">
        <div class="comment-header">
          <span class="glyphicon glyphicon-comment"></span>
          Comments
        </div>
        <div id="new-comment-toggle">Post new comment</div>
        <div id="new-comment-div">
          <form method="POST" id="comment-form" action="/problems/{{$problem->category}}/problem/{{$problem->id}}/comment">
            {{ csrf_field() }}
            <div class="form-group">
              <textarea rows="3" class="form-control" id="comment-input" name="comment-input" placeholder="posts containing profanity, insults, or answers may be removed at the discretion of the moderator"></textarea>
            </div>
            <input class="btn btn-primary" type="submit" value="Post">
            <div class="spacer-sm"></div>
          </form>
        </div>
        @foreach($comments as $comment)
          <div class="comment-box shadow-transition">
            <div class="comment-author">{{App\User::find($comment->user_id)->name}}</div>
            <div class="comment-date">{{$comment->created_at}}</div>
            <div class="comment-message">{{$comment->message}}</div>
          </div>
        @endforeach
      </div>
  @endif
@endsection
@push('body')
  <script type="text/javascript" src="/js/comments.js"></script>
@endpush

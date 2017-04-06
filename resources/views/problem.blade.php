@extends('master.master')
@section('title')
  {{$problem['id']}} - Math Team Trainer
@endsection
@push('head')
  <link rel="stylesheet" href= "/css/problems.css">
@endpush

@section('content')
  <!--Closable div
  <div class="alert alert-info" id="blah">
    <button type="button" class="close" data-target="#blah" data-dismiss="alert">
      <span aria-hidden="true">x</span>
    </button>
   </div>
  -->

  <div class="header">
    @if ($problem['prev']!='None')
      <div id="left-link">
        <a href="/problems/{{lcfirst($category)}}/{{$problem['prev']}}">
          <span class="glyphicon glyphicon-circle-arrow-left arrow-link"></span>
        </a>
      </div>
    @endif
    {{$category}} - {{$problem['name']}}
    @if ($problem['next']!='None')
      <div id="right-link">
        <a href="/problems/{{$category}}/{{$problem['next']}}">
          <span class="glyphicon glyphicon-circle-arrow-right arrow-link"></span>
        </a>
      </div>
    @endif
    <div class="sub-header">
      <div class="alert alert-info">
        Difficulty: {{$problem['difficulty']}}
      </div>
      XP: {{$problem['xp']}}
    </div>
  </div> <!-- end header -->
  <div class="pad-20">
    <div class="img-box light-shadowbox">
      <img src={{$problem['img']}} alt="problem image">
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

    <div class="answer-form-div">
      <form id="answer-form" method="POST" action="/problems/{{lcfirst($category)}}/{{$problem['id']}}/check">
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


    <!--comment section will go below-->
  </div>
@endsection

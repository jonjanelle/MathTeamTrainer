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
        <a href="/problems/{{$category}}/{{$problem['prev']}}">
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
      <img src={{asset($problem['img'])}} alt="problem image">
    </div>

    <div class="answer-form-div">
      <form>
        <h3>
          <label for="answer-input">Answer</label>
        </h3>
        <div class="input-group">
          <span class="input-group-addon" id="submit-addon1"><span class="glyphicon glyphicon-pencil"></span></span>
          <input type="text" class="form-control" id="answer-input" aria-describedby="submit-addon1">
        </div>
        <div class="spacer-sm">
          <input class="btn btn-primary" type="submit" value="Submit">
        </div>
      </form>
    </div>
    <!--comment section will go below-->
  </div>
@endsection

@extends('master.master')
@push('head')
  <link rel="stylesheet" href= "/css/home.css">
@endpush

@section('content')
<div class="header">
  User Dashboard
  <div class="sub-header">
    <div class="alert alert-success" id='sub-head-alert'>
      Welcome, {{$user->name}}!
    </div>
    account history
  </div>
</div>
<!--end header bar-->
<div class="home-container">
  <!--begin account summary section-->
  <div class="row">
    <div class="col col-md-12">
      <div class="panel panel-info shadow-transition home-panel">
        <!-- Default panel contents -->
        <div class="panel-heading">Account Overview</div>
        <table class="table table-hover table-striped">
          <thead class="thead-default">
            <tr>
              <th>Alias</th>
              <th>XP</th>
              <th># Solved</th>
              <th>Top Category</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>{{$user->name}}</td>
              <td>{{$user->xp}}</td>
              <td>{{$user->solved}}</td>
              <td>
                @if(isset($bestCat))
                  <a href="/problems/{{$bestCat}}">{{$bestCat}}</a>
                @else
                  N/A
                @endif
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <!--End overview section-->

  <!--begin problem history section-->
  <div class="row">
    <div class="col col-md-12">
      <div class="panel panel-info shadow-transition home-panel">
        <!-- Default panel contents -->
        <div class="panel-heading">Problem History</div>
        <table class="table table-hover table-striped">
          <thead class="thead-default">
            <tr>
              <th>#</th>
              <th>Category</th>
              <th>Name</th>
              <th>Difficulty</th>
              <th>XP</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($solved as $index=>$problem)
              <tr>
                <td>{{$index+1}}</td>
                <td>
                  <a href="/problems/{{$problem->category}}">
                    {{$problem->category}}
                  </a>
                </td>
                <td>
                  <a href="/problems/{{$problem->category}}/problem/{{$problem->id}}">
                    {{$problem->name}}
                  </a>
                </td>
                <td>{{$problem->difficulty}}</td>
                <td>{{$problem->xp}}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <!--End problem history section-->

  <!--begin comment history section-->
  <div class="row">
    <div class="col col-md-12">
      <div class="panel panel-info shadow-transition home-panel table-responsive">
        <!-- Default panel contents -->
        <div class="panel-heading">Comment History</div>
        <table class="table table-hover table-striped">
          <thead class="thead-default">
            <tr>
              <th>#</th>
              <th>Message</th>
              <th>Category</th>
              <th>Name</th>
              <th>Action</th>
              <th>Date</th>
            </tr>
          </thead>
          <tbody>
            @foreach($comments as $index=>$comment)
              <tr>
                <td>{{$index+1}}</td>
                <td>
                  <!--surprised that laravel knew how to handle this without me needing to parse the anchor.-->
                  <a href="/problems/{{$comment->problem->category}}/problem/{{$comment->problem->id}}#c{{$comment->id}}">
                    {{$comment->message}}
                  </a>
                </td>
                <td>
                  <a href="/problems/{{$problem->category}}">
                    {{$comment->problem->category}}
                  </a>
                </td>
                <td>
                  <a href="/problems/{{$comment->problem->category}}/problem/{{$comment->problem->id}}">
                    {{$comment->problem->name}}
                  </a>
                </td>
                <td>
                  <a href="/home/deletecomment/{{$comment->id}}">
                    <span class="glyphicon glyphicon-trash"></span>
                  </a>
                </td>
                <td>{{$comment->created_at}}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <!--end comment history section-->
</div>
@endsection

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
      <div class="panel panel-info shadow-transition" id="leaderboard">
        <!-- Default panel contents -->
        <div class="panel-heading">Account Overview</div>
        <table class="table table-hover">
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
              <td>3</td>
              <td>Algebra</td>
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
      <div class="panel panel-info shadow-transition" id="leaderboard">
        <!-- Default panel contents -->
        <div class="panel-heading">Problem History</div>
        <table class="table table-hover">
          <thead class="thead-default">
            <tr>
              <th>#</th>
              <th>Category</th>
              <th>Name</th>
              <th>XP</th>
            </tr>
          </thead>
          <tbody>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <!--End problem history section-->

  <!--begin comment history section-->
  <div class="row">
    <div class="col col-md-12">
      <div class="panel panel-info shadow-transition" id="leaderboard">
        <!-- Default panel contents -->
        <div class="panel-heading">Comment History</div>
        <table class="table table-hover">
          <thead class="thead-default">
            <tr>
              <th>#</th>
              <th>Message</th>
              <th>Category</th>
              <th>Name</th>
              <th>Date</th>
            </tr>
          </thead>
          <tbody>
            @foreach($comments as $index=>$comment)
              <tr>
                <td>{{$index+1}}</td>
                <td>{{$comment->message}}</td>
                <td>0</td>
                <td>0</td>
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

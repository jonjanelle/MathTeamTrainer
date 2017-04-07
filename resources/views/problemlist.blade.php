@extends('master.master')
@section('title')
  {{$category}} - Math Team Trainer
@endsection
@push('head')
  <link rel="stylesheet" href= "/css/problems.css">
@endpush

@section('content')
  <div class="header">
    {{$category}}
    <div class="sub-header">
      <div class="alert alert-success">
        Sorted by: {{$sortCat}}
      </div>

    </div>
  </div>
  <div class="pad-20">
    <div class="dropdown">
      <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Sort by
        <span class="caret"></span>
      </button>
        <ul class="dropdown-menu">
          <li><a href="/problems/{{$category}}/id">ID Number</a></li>
          <li><a href="/problems/{{$category}}/difficulty/asc">Less Difficult</a></li>
          <li><a href="/problems/{{$category}}/difficulty/desc">More Difficult</a></li>
          <li><a href="/problems/{{$category}}/xp/asc">Low XP</a></li>
          <li><a href="/problems/{{$category}}/xp/desc">High XP</a></li>
        </ul>
      </div>

    <div class="row">
    @foreach ($problems as $problem)
      <a href="/problems/{{$category}}/problem/{{$problem->id}}">
        <div class="col col-md-4 col-sm-6 col-xs-12">
          <div class="problem-box shadow-transition">
            <div class="problem-box-header">
              {{$problem->name}}
            </div>
            <p>Difficulty: {{$problem->difficulty}}</p>
            <p>XP: {{$problem->xp}}</p>
          </div>
        </div>
      </a>
     @endforeach
     </div>
   </div>

@endsection

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
      <div class="alert alert-success" id='sub-head-alert'>
        Sorted by: {{isset($sortCat)?$sortCat:''}}
      </div>
      @if (isset($sortOrder))
        {{$sortOrder=='asc'?'increasing':'decreasing'}}
      @endif
    </div>
  </div>
  <div class="pad-20">
    <div class="dropdown">
      <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Sort by
        <span class="caret"></span>
      </button>
        <ul class="dropdown-menu">
          <li><a href="/problems/sort/{{$category}}/id/asc">ID Number</a></li>
          <li><a href="/problems/sort/{{$category}}/difficulty/asc">Less Difficult</a></li>
          <li><a href="/problems/sort/{{$category}}/difficulty/desc">More Difficult</a></li>
          <li><a href="/problems/sort/{{$category}}/xp/asc">Low XP</a></li>
          <li><a href="/problems/sort/{{$category}}/xp/desc">High XP</a></li>
        </ul>
      </div>

    <div class="row">
    @foreach ($problems as $problem)
      <a href="/problems/{{$category}}/problem/{{$problem->id}}">
        <div class="col col-lg-3 col-md-4 col-sm-6 col-xs-12 ">
          <div class="problem-box shadow-transition">
            <div class="problem-box-header">
              {{$problem->name}}
              @if (in_array($problem->id,$solved))
               <span class="glyphicon glyphicon-ok green-check"></span>
              @endif
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

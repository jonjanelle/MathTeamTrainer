@extends('master.master')
@section('title')
  {{$category}} - Math Team Trainer
@endsection
@push('head')
  <link rel="stylesheet" href= "/css/problems.css">
@endpush

@section('content')
  <div class="header">{{$problems['name']}}</div>
  <div class="pad-20">
    <div class="row">
    @foreach ($problems['problems'] as $problem)
      <a href="/problems/{{$category}}/{{$problem['id']}}">
        <div class="col col-md-4 col-sm-6 col-xs-12">
          <div class="problem-box shadow-transition">
            <div class="problem-box-header">
              {{$problem['name']}}
            </div>
            <p>Difficulty: {{$problem['difficulty']}}</p>
            <p>XP: {{$problem['xp']}}</p>
          </div>
        </div>
      </a>
     @endforeach
     </div>
   </div>
@endsection

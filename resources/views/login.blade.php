@extends('master.master')
@section('title')
  {{$title}} - Math Team Trainer
@endsection
@push('head')
  <link rel="stylesheet" href="css/login.css">
@endpush

@section('content')
  <div class="header">Math Team Trainer</div>
  <div class="row">
    <div class="col col-md-7">
      
    </div>

    <div class="col col-md-4">
      @include('forms.loginform')
    </div>

  </div>
@endsection

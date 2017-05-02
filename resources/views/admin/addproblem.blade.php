@extends('master.master')
@push('head')
    <link rel="stylesheet" href="css/login.css">
@endpush
@section('content')
<div class="form-box shadow-transition" id="new-user-form">
  <div class="form-head">
    <span class="glyphicon glyphicon-list-alt"></span>
    Add New Problem
  </div>
  <div class="form-body">
    <form method="POST" role="form" method="POST" action="/addproblem/submit">
      {{ csrf_field() }}
      <div class="form-group">
        <label for="user-name">Problem Name</label>
        <input type="text" class="form-control" id="user-name" name="name" required autofocus>

        <label for="category-input">Enter Category</label>
        <input type="text" class="form-control" id="category-input" name="category" placeholder="Category" required>

        <label for="file-input">Upload image file</label>
        <input type="file" class="form-control" id="file-input" name="file" required>

        <label for="answer-input">Answer</label>
        <input type="text" class="form-control" id="answer-input" name="answer" required>

        <label for="difficulty-input">Difficulty</label>
        <input type="number" class="form-control" id="difficulty-input" name="difficulty" required>

        <label for="xp-input">Experience Points</label>
        <input type="number" class="form-control" id="xp-input" name="xp" required>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection

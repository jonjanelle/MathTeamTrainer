@extends('master.master')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">Dashboard</div>
        <div class="panel-body">
          <p>Welcome, {{$user->name}}!</p>
          <p>You have: {{$user->xp}} points</p>
          <table>
            <thead>
              <tr>
                <th>Category</th>
                <th>Name</th>
                <th>XP</th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
          {{dump($solved)}}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

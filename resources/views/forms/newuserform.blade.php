<div class="form-box shadow-transition">
  <div class="form-head">
    <span class="glyphicon glyphicon-list-alt"></span>
    Create New Account
  </div>
  <div class="form-body">
    <form method="POST" role="form" method="POST" action="{{ route('register') }}">
      {{ csrf_field() }}
      <div class="form-group">
        <label for="user-name">User name</label>
        <input type="text" class="form-control" id="user-name" name="name" value="{{ old('name') }}" required autofocus>
        @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
        <label for="email-input">Email address</label>
        <input type="email" class="form-control" id="email-input" name="email" placeholder="Email" required>
        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
        <label for="password-input">Password</label>
        <input type="password" class="form-control" id="password-input" name="password" placeholder="Password" required>
        <label for="repeat-input">Repeat Password</label>
        <input type="password" class="form-control" id="repeat-input" name="password_confirmation" placeholder="Password" required>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</div>

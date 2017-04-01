<div class="form-box shadow-transition">
  <div class="form-head">
    <span class="glyphicon glyphicon-user"></span> Login
  </div>
  <div class=form-body>
    <form method="POST" action="/login">
      {{ csrf_field() }}
      <div class="form-group">
        <label for="email-input">Email address</label>
        <input type="email" class="form-control" id="email-input" name="email-input" placeholder="Email">
      </div>
      <div class="form-group">
        <label for="password-input">Password</label>
        <input type="password" class="form-control" id="password-input" name="password-input" placeholder="Password">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <p>New user?
      <a href="/newuser"> Create an account</a>
    </p>
    <p>Forgot password?
      <a href="/recoverpass"> Recover password</a>
    </p>
  </div>
</div>

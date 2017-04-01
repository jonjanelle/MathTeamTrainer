<div class="form-box shadow-transition">
  <div class="form-head">
    <span class="glyphicon glyphicon-list-alt"></span>
    Create New Account
  </div>
  <div class="form-body">
    <form method="POST" action="/createuser">
      {{ csrf_field() }}
      <div class="form-group">
        <label for="user-name">User name</label>
        <input type="text" class="form-control" id="user-name" name="user-name">
        <label for="email-input">Email address</label>
        <input type="email" class="form-control" id="email-input" name="email-input" placeholder="Email">
        <label for="password-input">Password</label>
        <input type="password" class="form-control" id="password-input" name="password-input" placeholder="Password">
        <label for="repeat-input">Repeat Password</label>
        <input type="password" class="form-control" id="repeat-input" name="repeat-input" placeholder="Password">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</div>

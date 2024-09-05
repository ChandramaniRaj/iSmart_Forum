


<div class="modal fade" id="signmodal" tabindex="-1" aria-labelledby="signmodalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="signmodalLabel">Signup for an iSmart account</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="/partials/handleSignup.php" method="post">
  <div class="mb-3">
    <label for="SignUpemail" class="form-label">Email address</label>
    <input type="SignUpemail" class="form-control" id="SignUpemail" name="SignUpemail" aria-describedby="emailHelp" maxlength="50">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="SignUpPassword" class="form-label">Password</label>
    <input type="password" class="form-control" id="SignUpPassword" name="SignUpPassword" maxlength="255">
  </div>
  <div class="mb-3">
    <label for="SignUpcPassword" class="form-label">Confirm Password</label>
    <input type="password" class="form-control" id="SignUpcPassword" name="SignUpcPassword">
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary">Signup</button>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
</div>
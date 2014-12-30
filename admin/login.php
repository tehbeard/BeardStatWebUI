<?php 
require 'bootstrap.php';
if(isset($_POST['password']) && $_POST['password'] == BS_PW){
  $_SESSION["beardstat_authed"] = true;
  $_path = BS_ADMIN_ROOT;
  if(isset($_GET['returnto'])){
    $_path = $_GET['returnto'];
  }
  header("Location: $_path");
}

require("partials/header.php"); 
?>
<div class="container">
<form class="form-signin" role="form" method="post" action="#">
  <h2 class="form-signin-heading">Please sign in</h2>
  <input type="password" class="form-control" placeholder="Password" name="password" required autofocus>
  <!--<div class="checkbox">
    <label>
      <input type="checkbox" value="remember-me"> Remember me
    </label>
  </div>-->
  <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
</form>
</div>
<?php require("partials/footer.php"); ?>
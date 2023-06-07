<?php
include_once "header.php";
include_once "includes/register.inc.php";
?>

<div class="jumbotron">
  <div class="alert alert-success" role="alert">
    <?php if(logged_in()) {
      echo "Welcome " . get_name($_SESSION['email']);
    }else{
      echo "Welcome Guest";
    }
    ?>
  </div>
</div>
<!-- <div class="row">
  <div class="col-md-12">
    <?php display_message(); ?>
  </div>
</div>
<div class="row">
  <div class="col-12 col-sm-8 col-md-6 offset-sm-2 offset-md-3">
    <form role="form" method="post" name="registration_form" class="m-4" >
      <h4>Sign Up <small>It's free and always will be.</small></h4>
      <hr class="colorgraph">
      <div class="row">
        <div class="col-12 col-sm-6 p-3">
          <div class="form-group">
            <input type="text" name="first_name" id="first_name" class="form-control " placeholder="First Name" tabindex="1" required>
          </div>
        </div>
        <div class="col-12 col-sm-6 p-3">
          <div class="form-group">
            <input type="text" name="last_name" id="last_name" class="form-control " placeholder="Last Name" tabindex="2" required>
          </div>
        </div>
      </div>
      <div class="form-group mb-2">
        <input type="text" name="display_name" id="display_name" class="form-control " placeholder="Display Name" tabindex="3" required>
      </div>
      <div class="form-group ">
        <input type="email" name="email" id="email" class="form-control " placeholder="Email Address" tabindex="4" required>
      </div>
      <div class="row">
        <div class="col-12 col-sm-6 p-3">
          <div class="form-group">
            <input type="password" name="password" id="password" class="form-control " placeholder="Password" tabindex="5" required>
          </div>
        </div>
        <div class="col-12 col-sm-6 p-3">
          <div class="form-group">
            <input type="password" name="confirm_password" id="confirm_password" class="form-control " placeholder="Confirm Password" tabindex="6" required>
          </div>
        </div>
      </div>

      <hr class="colorgraph">
      <div class="d-flex justify-content-between">
        <div class="">
          <input type="submit" name="submit" value="Register" class="btn btn-primary btn-block" tabindex="7">
        </div>
        <div class="">
          <a href="login.php" class="btn btn-success btn-block">Sign In</a>
        </div>
      </div>
    </form>
  </div>
</div>

<script>
	var password = document.getElementById("password")
	, confirm_password = document.getElementById("confirm_password");

	function validatePassword(){
		if(password.value != confirm_password.value) {
			confirm_password.setCustomValidity("Passwords Don't Match");
		} else {
			confirm_password.setCustomValidity('');
		}
	}

	password.onchange = validatePassword;
	confirm_password.onkeyup = validatePassword;
</script> -->
<?php
include_once "footer.php";
?>
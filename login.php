<?php
include_once "header.php";
include_once "includes/login.inc.php";

if(logged_in()) {
    redirect("admin.php");
}
?>
<div class="container ">
    <?php display_message(); ?>
    <div id="loginbox" style="margin-top:50px;" class="d-flex justify-content-center ">                    
        <div class="card w-50" >
            <div class="card-header">
                <div class="card-title"><h4><strong>Sign In</strong></h4></div>
            </div>     

            <div style="padding-top:30px" class="card-body" >

                <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

                <form id="loginform" class="form-horizontal" method="post" role="form">
                    <div class="mb-3">
                        <input id="email" type="text" class="form-control" name="email" value="" placeholder="Email">
                    </div>
                    <div class="mb-3">
                        <input id="password" type="password" class="form-control" name="password" placeholder="Password">
                    </div>

                    <div class="form-group mb-3">
                        <div class="col-sm-4">
                            <button class="btn btn-primary btn-block" type="submit">Sign in</button>
                        </div>
                    </div>
                </form> 


                <div class="form-group">
                    <div class="col-md-12">
                        <hr> 
                        <div class="pt-1" >
                           <h6> Don't have an account! 
                            <a href="register.php">Sign Up Here</a></h6>
                        </div>
                    </div>
                </div>    
            </div>                     
        </div>  
    </div>
</div>


<?php
include_once "footer.php";
?>
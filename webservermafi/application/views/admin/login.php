<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login Admin | M-AFI</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="<?php echo base_url(''); ?>assets/vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="<?php echo base_url(''); ?>assets/vendor/font-awesome/css/font-awesome.min.css">
    <!-- Fontastic Custom icon font-->
    <link rel="stylesheet" href="<?php echo base_url(''); ?>assets/css/fontastic.css">
    <!-- Google fonts - Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
    <!-- jQuery Circle-->
    <link rel="stylesheet" href="<?php echo base_url(''); ?>assets/css/grasp_mobile_progress_circle-1.0.0.min.css">
    <!-- Custom Scrollbar-->
    <link rel="stylesheet" href="<?php echo base_url(''); ?>assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="<?php echo base_url(''); ?>assets/css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="<?php echo base_url(''); ?>assets/css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="<?php echo base_url(''); ?>assets/img/tittle.png">
    
  </head>
  <body>
    <div class="page login-page">
      <div class="container">
        <div class="form-outer text-center align-items-center" style="padding-top: 100px">
          <div class="form-inner">
            <div class="logo text-uppercase"><span>LOGIN </span><strong class="text-primary"> ADMIN M-AFI</strong></div><br>
            <!-- Notifikasi -->
              <?php if($alert): ?>
                <div id="login-invalid-input" class="error alert alert-danger alert-dismissible fade show">
                  Kombinasi Username dan password salah!
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              <?php endif; ?>
            <!-- /Notifikasi -->
            <form id="login-form" method="post" onsubmit="return checkEmptyInput();" action="<?php echo base_url(''); ?>admin/login">
              <div class="form-group-material">
                <input id="login-username" type="text" name="admin" required="" class="input-material">
                <label for="login-username" class="label-material">Username</label>
              </div>
              <div class="form-group-material">
                <input id="login-password" type="password" name="password" required="" class="input-material">
                <label for="login-password" class="label-material">Password</label>
              </div><input id="login" type="submit" value="Login" name="insert" class="btn btn-primary">
              <!-- This should be submit button but I replaced it with <a> for demo purposes-->
            </form>
          </div>
          <div class="copyrights text-center">
            <p>Copy Right <a href="#" class="external"> &copy 2018 Team M-AFI</a></p>
            <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
          </div>
        </div>
      </div>
    </div>
    <!-- Javascript files-->
    <script src="<?php echo base_url(''); ?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(''); ?>assets/vendor/popper.js/umd/popper.min.js"> </script>
    <script src="<?php echo base_url(''); ?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(''); ?>assets/js/grasp_mobile_progress_circle-1.0.0.min.js"></script>
    <script src="<?php echo base_url(''); ?>assets/vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="<?php echo base_url(''); ?>assets/vendor/chart.js/Chart.min.js"></script>
    <script src="<?php echo base_url(''); ?>assets/vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="<?php echo base_url(''); ?>assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
    <!-- Main File-->
    <script src="<?php echo base_url(''); ?>assets/js/front.js"></script>

    <script>
      window.onload = hideLoginErrors();
      function hideLoginErrors(){
        $("#login-empty-input").hide();
      }

      function checkEmptyInput(){
        hideLoginErrors();
        $("#login-invalid-input").hide();
        if( $("#email").val() == '' || $("#password").val() == '' ){
          $("#login-empty-input").show();
          return false;
        }
      }
    </script>

  </body>
</html>
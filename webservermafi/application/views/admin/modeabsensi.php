<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Webserver | Mobile - Attendance Fingerprint</title>
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
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(''); ?>assets/css/table.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(''); ?>assets/css/table.min.css">
    <link rel="stylesheet" href="<?php echo base_url(''); ?>assets/css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="<?php echo base_url(''); ?>assets/img/tittle.png">
    <!-- JQuery -->
    <script src="<?php echo base_url(''); ?>assets/vendor/jquery/jquery.min.js"></script>
    <!-- TinyMCE/Textarea -->
    <script type="text/javascript" src="<?php echo base_url(''); ?>assets/tinymce/js/tinymce/tinymce.min.js"></script>
    <script type="text/javascript">
      tinyMCE.init({
        selector: "textarea"
      })
    </script>
  </head>
  <body>

<div class="container">
	<div class="row">
		<div class="col-md-12 text-center">

			<p class="alert alert-danger">Mode absensi aktif selama halaman ini tidak di tutup !</p>
			<p>Kami meminta maaf atas ketidak nyamanannya dalam menggunakan aplikasi kami dikarenakan harus menyalakan mode absensi ini untuk sistem berjalan dengan semestinya, Aplikasi ini masih dalam proses pengembangan. <b>Terimakasih</b>.</p>

			<span style="font-size: 300px; color: #68fc55" class="fa fa-check-circle-o"></span><br>
			<b>ACTIVE !</b>
			
		</div>
	</div>
</div>  	

<!-- FP -->
<div id="fp"></div>
<!-- /FP -->
			

		<script>
            function insertdatafp() {
                 xmlhttp = new XMLHttpRequest();
                 xmlhttp.open("GET","<?php echo site_url('Datapresensi/create'); ?>",false);
                 xmlhttp.send(null);
//                 console.log(xmlhttp.responseText);
//                document.getElementById("getdata").innerHTML = Date();
                document.getElementById("fp").innerHTML = xmlhttp.responseText;
            }
            //sendMail();
            setInterval(function () {
                insertdatafp();
            }, 0.1);
        </script>

    <!-- Javascript files-->
    <script src="<?php echo base_url(''); ?>assets/vendor/popper.js/umd/popper.min.js"> </script>
    <script src="<?php echo base_url(''); ?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(''); ?>assets/js/grasp_mobile_progress_circle-1.0.0.min.js"></script>
    <script src="<?php echo base_url(''); ?>assets/vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="<?php echo base_url(''); ?>assets/vendor/chart.js/Chart.min.js"></script>
    <script src="<?php echo base_url(''); ?>assets/vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="<?php echo base_url(''); ?>assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="<?php echo base_url(''); ?>assets/js/jquerytabel.js"></script>
    <script src="<?php echo base_url(''); ?>assets/js/datatabel.min.js"></script>
    <script src="<?php echo base_url(''); ?>assets/js/bootstrap.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {
          $('#example').DataTable();
      } );
    </script>
    <!-- Main File-->
    <script src="<?php echo base_url(''); ?>assets/js/front.js"></script>
  </body>
</html>
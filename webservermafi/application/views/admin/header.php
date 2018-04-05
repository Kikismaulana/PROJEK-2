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
    <!-- Side Navbar -->
    <nav class="side-navbar">
      <div class="side-navbar-wrapper">
        <!-- Sidebar Header    -->
        <div class="sidenav-header d-flex align-items-center justify-content-center">
          <!-- User Info-->
          <div class="sidenav-header-inner text-center"><img src="<?php echo base_url(''); ?>assets/img/avatar-1.jpg" alt="person" class="img-fluid rounded-circle">
            <h2 class="h5">ADMIN</h2><span>SMK N 1 INDRAMAYU</span>
          </div>
          <!-- Small Brand information, appears on minimized sidebar-->
          <div class="sidenav-header-logo"><a href="index.html" class="brand-small text-center"> <strong>4</strong><strong class="text-primary">7</strong></a></div>
        </div>
        <!-- Sidebar Navigation Menus-->
        <div class="main-menu">
          <h5 class="sidenav-heading">Main</h5>
          <ul id="side-main-menu" class="side-menu list-unstyled">                  
            <li><a href="<?php echo base_url('Dashboard') ?>"> <i class="icon-home"></i>Home </a></li>
            <li><a href="<?php echo base_url('Datasiswa/read') ?>"> <i class="icon-user"></i>Data Siswa </a></li>
            <li><a href="<?php echo base_url('Dataguru/read') ?>"> <i class="icon-user"></i>Data Guru </a></li>
            <li><a href="#datauser" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i>Data User</a>
              <ul id="datauser" class="collapse list-unstyled ">
                <li><a href="<?php echo base_url('Datauser/readusersiswa') ?>"> <i class="icon-user"></i>User Siswa</a></li>
                <li><a href="<?php echo base_url('Datauser/readuserguru') ?>"> <i class="icon-user"></i>User Guru</a></li>
                <li><a href="<?php echo base_url('Datauser/readuserortu') ?>"> <i class="icon-user"></i>User Orang tua</a></li>
              </ul>
            </li>
            <li><a href="<?php echo base_url('Datakelas') ?>"> <i class="icon-home"></i>Data Kelas </a></li>
            <li><a href="<?php echo base_url('Datajurusan') ?>"> <i class="icon-home"></i>Data Jurusan </a></li>
            <li><a href="#datapresensi" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i>Data Presensi</a>
              <ul id="datapresensi" class="collapse list-unstyled ">
                <li><a href="<?php echo base_url('Datapresensi/readizinsiswa') ?>"> <i class="icon-rss-feed"></i>Izin Siswa</a></li>
                <li><a href="<?php echo base_url('Datapresensi/readrekap') ?>"> <i class="icon-padnote"></i>Rekap Absen</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="page">
      <!-- navbar-->
      <header class="header">
        <nav class="navbar">
          <div class="container-fluid">
            <div class="navbar-holder d-flex align-items-center justify-content-between">
              <div class="navbar-header"><a id="toggle-btn" href="#" class="menu-btn"><i class="icon-bars"> </i></a><a href="index.html" class="navbar-brand">
                <div class="brand-text d-none d-md-inline-block"><span>Dashboard </span><strong class="text-primary"> M-AFI</strong></div></a></div>
                <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                  <li class="nav-item dropdown"> <a id="messages" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link"><i class="fa fa-envelope"></i><span class="badge badge-info">10</span></a>
                    <ul aria-labelledby="notifications" class="dropdown-menu">
                      <li><a rel="nofollow" href="#" class="dropdown-item d-flex"> 
                          <div class="msg-profile icon-rss-feed" style="font-size: 40px"></div>
                          <div class="msg-body">
                            <h3 class="h5">Jono</h3><span>Izin Siswa</span><small>2018-03-14 09:51:34</small>
                          </div></a></li>
                      <li><a rel="nofollow" href="#" class="dropdown-item d-flex"> 
                          <div class="msg-profile icon-rss-feed" style="font-size: 40px"></div>
                          <div class="msg-body">
                            <h3 class="h5">Joni</h3><span>Izin Siswa</span><small>2018-03-14 09:51:34</small>
                          </div></a></li>
                      <li><a rel="nofollow" href="#" class="dropdown-item d-flex"> 
                          <div  class="msg-profile icon-rss-feed" style="font-size: 40px"></div>
                          <div class="msg-body">
                            <h3 class="h5">Jona</h3><span>Izin Siswa</span><small>2018-03-14 09:51:34</small>
                          </div></a></li>
                      <li><a rel="nofollow" href="<?php echo base_url('Datapresensi/readizinsiswa'); ?>" class="dropdown-item all-notifications text-center"> <strong> <i class="fa fa-envelope"></i>Lihat semua pesan</strong></a></li>
                    </ul>
                  </li>
                  <li class="dropdown">
                    <a  id="header-dropdown" class="dropdown-toggle nav-link" data-toggle="dropdown" href="#">
                        <i id="header-icon" class="fa fa-user fa-fw"></i>  <i id="header-icon"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user" style="width:300%">
                        <li><a class="dropdown-item" href="#" data-toggle="modal" data-target="#changePasswordModal"><i class="fa fa-refresh fa-fw"></i> Ganti Password</a></li>
                        <li class="divider"></li>
                        <li><a class="dropdown-item" href="<?php echo base_url();?>Admin/logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
                </ul>
            </div>
          </div>
        </nav>
      </header>

        <div class="modal fade" id="changePasswordModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header modal-blue">
                        <h4 class="modal-title" id="myModalLabel">Ganti Password</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Password Lama</label>
                                    <input class="form-control" placeholder="passwordlama" name="passwordlama" type="password">
                                </div> 
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Password Baru</label>
                                    <input class="form-control" placeholder="Password Baru" type="password" name="passwordbaru">
                                </div> 
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Konfirmasi Password Baru</label>
                                    <input class="form-control" placeholder="Konfirmasi Password Baru" name="konfirmasipassword" type="password">
                                </div> 
                            </div>
                      </div>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">CANCEL</button>
                        <button id="changePasswordSubmit" type="button" class="btn btn-primary">UPDATE</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
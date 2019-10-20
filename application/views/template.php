<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SIMLAZNas | Dashboard</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/skins/_all-skins.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <!-- <link rel="stylesheet" href="<?php echo base_url() ?>assets/rumah.jpg"> -->

   <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <script href="<?php echo base_url() ?>assets/bower_components/chart.js/Chart.js"></script>
  <script href="<?php echo base_url() ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
  <script href="<?php echo base_url() ?>assets/bower_components/jquery/dist/jquery.mask.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.js"></script>
  <script type="<?php echo base_url()?>map-icons-master/dist/js/map-icons.js"></script>
</head>
<body class="hold-transition skin-blue sidebar-mini fixed">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->

    <a href="<?php echo base_url() ?>Home" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>SIM</b>L</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>SIM</b>LAZNas</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">

      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">


          <li>
            <a href="<?php echo base_url('Auth/logout'); ?>" class="fa fa-sign-out"> Logout</a>
            <!-- <a href="#" data-toggle="control-sidebar"><i class="fa fa-sign-out"></i></a> -->
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <section class="sidebar">
      <ul class="sidebar-menu">
        <li class="header">LIST MENU</li>
<?php if ($this->session->userdata('level') != 'muzakki'): ?>
        <li <?php if($this->uri->segment(1)=="Home"){echo 'class="active"';}?>>
          <a href="<?php echo base_url() ?>Home">
            <i class="fa fa-home"></i> <span>Beranda</span>

          </a>
        </li>
<?php if ($this->session->userdata('level') == 'pimpinan'): ?>

        <li <?php if($this->uri->segment(1)=="Pengguna"){echo 'class="active"';}?>>
          <a href="<?php echo base_url() ?>Pengguna">
            <i class="fa fa-user"></i> <span>Pengguna</span>
          </a>
        </li>
<?php endif ?>
<?php endif ?>

        <li <?php if($this->uri->segment(1)=="Muzakki" && $this->uri->segment(2)==""){echo 'class="active"';}?>>
          <a href="<?php echo base_url() ?>Muzakki">
            <i class="fa fa-user-secret"></i> <span>Data Muzakki</span>

          </a>

        <!-- </li> -->
<?php if ($this->session->userdata('level') != 'muzakki'): ?>
        <li <?php if($this->uri->segment(1)=="Mustahik" && $this->uri->segment(2)=="" ){echo 'class="active"';}?>>
          <a href="<?php echo base_url() ?>Mustahik">
            <i class="fa fa-user"></i> <span>Data Mustahik</span>

          </a>
        </li>


        <li <?php if($this->uri->segment(1)=="Mustahik" && $this->uri->segment(2)=="lihatProgram" ){echo 'class="active"';}?>>
          <a href="<?php echo base_url() ?>Mustahik/lihatProgram">
            <i class="fa fa-users"></i> <span>Program Mustahik</span>

          </a>
        </li>

        <li <?php if($this->uri->segment(1)=="Muzakki" && $this->uri->segment(2)=="lihatProgram"){echo 'class="active"';}?>>
          <a href="<?php echo base_url() ?>Muzakki/lihatProgram">
            <i class="fa fa-users"></i> <span>Program Muzakki</span>

          </a>
        </li>

        <li <?php if($this->uri->segment(1)=="Peta" && $this->uri->segment(2)=="lihatProgram"){echo 'class="active"';}?>>
          <a href="<?php echo base_url() ?>Peta/lihatProgram">
            <i class="fa fa-map"></i> <span>Peta</span>

          </a>
        </li>


        <li <?php if($this->uri->segment(1)=="Rekening"){echo 'class="active"';}?>>
          <a href="<?php echo base_url() ?>Rekening">
            <i class="fa fa-credit-card"></i> <span>Data Rekening</span>

          </a>
        </li>

         <li <?php if ($this->uri->segment(1)=="Program" | $this->uri->segment(1)=="Asnaf" | $this->uri->segment(1)=="Jenis_Donasi" | $this->uri->segment(1)=="Cara_Donasi"| $this->uri->segment(1)=="Kecamatan"| $this->uri->segment(1)=="Kelurahan"| $this->uri->segment(1)=="Petugas" ): ?>
           <?php echo 'class="active treeview"' ?>
         <?php endif ?>>
          <a href="#">
            <i class="fa fa-database"></i> <span>Data Master</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
        <ul class="treeview-menu">
            <li <?php if ($this->uri->segment(1)=="Program"): ?>
              <?php echo 'class="active"' ?>
              <?php endif ?>><a href="<?php echo base_url() ?>Program"><i class="fa fa-glass"></i> Program Donasi</a>
            </li>

            <li <?php if ($this->uri->segment(1)=="Asnaf"): ?>
              <?php echo 'class="active"' ?>
              <?php endif ?>><a href="<?php echo base_url() ?>Asnaf"><i class="fa fa-folder-open"></i>Kategori Asnaf</a>
            </li>

            <li <?php if ($this->uri->segment(1)=="Jenis_Donasi"): ?>
              <?php echo 'class="active"' ?>
              <?php endif ?>><a href="<?php echo base_url() ?>Jenis_Donasi"><i class="fa fa-folder"></i>Jenis Donasi</a>
            </li>

            <li <?php if ($this->uri->segment(1)=="Cara_Donasi"): ?>
              <?php echo 'class="active"' ?>
              <?php endif ?>><a href="<?php echo base_url() ?>Cara_Donasi"><i class="fa fa-link"></i>Cara Donasi</a>
            </li>

            <li <?php if ($this->uri->segment(1)=="Kecamatan"): ?>
              <?php echo 'class="active"' ?>
              <?php endif ?>><a href="<?php echo base_url() ?>Kecamatan"><i class="fa fa-map-o"></i>Kecamatan</a>
            </li>

            <li <?php if ($this->uri->segment(1)=="Kelurahan"): ?>
              <?php echo 'class="active"' ?>
              <?php endif ?>><a href="<?php echo base_url() ?>Kelurahan"><i class="fa fa-location-arrow"></i>Kelurahan</a>
            </li>

            <li <?php if ($this->uri->segment(1)=="Petugas"): ?>
              <?php echo 'class="active"' ?>
              <?php endif ?>><a href="<?php echo base_url() ?>Petugas"><i class="fa fa-users"></i>Petugas</a>
            </li>
        </ul>
        </li>

<?php endif ?>

  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->


    <!-- Main content -->
    <section class="content">



    <?php echo $contents ?>


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; 2019 <a href="http://www.laznaschevron.org">LAZNas Chevron Rumbai</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">

    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>

    <div class="tab-content">

      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>


        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>


      </div>

      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>

      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>


          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>


          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>

        </form>
      </div>

    </div>
  </aside>

  <div class="control-sidebar-bg"></div>
</div> -->
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url() ?>assets/plugins/jquery/jquery-2.2.3.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url() ?>assets/bootstrap/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<!-- <script src="<?php echo base_url() ?>assets/plugins/morris/morris.min.js"></script> -->
<!-- Sparkline -->
<script src="<?php echo base_url() ?>assets/plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?php echo base_url() ?>assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url() ?>assets/plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?php echo base_url() ?>assets/plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url() ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url() ?>assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url() ?>assets/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url() ?>assets/dist/js/app.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="<?php echo base_url() ?>assets/dist/js/pages/dashboard.js"></script> -->
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url() ?>assets/dist/js/demo.js"></script>

<!-- <script src="<?php echo base_url() ?>assets/bower_components/jquery/dist/jquery.min.js"></script> -->

<script src="<?php echo base_url() ?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
 <!-- SlimScroll -->
<script src="<?php echo base_url() ?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url() ?>assets/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url() ?>assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url() ?>assets/dist/js/demo.js"></script>

</body>
</html>

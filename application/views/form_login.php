<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SIZLCI| Log in</title>
    <link rel="shortcut icon" href="<?php echo site_url().'asset/img/admin.png'; ?>">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/eksternal/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/eksternal/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/iCheck/square/green.css">

    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/animate/animate.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/animate/main.css">

    
    <style >
    *{
      padding: 0;
      margin: 0;
    }
      html{
        background: url(<?php echo base_url() ?>assets/images/zakat2.jpg);
        background-repeat: no-repeat;
        background-size: cover;
      }
      body{
        margin-top: -100px;
        padding: 100px;
        background: #ffffff0d;
      }
    </style>
  </head>
  <body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="<?php echo base_url(); ?>#"><b>Selamat Datang di </b><h3>Sistem Informasi Zakat Laznas Chevron Rumbai</h3></a>
      </div>
      <!-- <marquee style="color: black;"></marquee> -->
      <!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">
          <b>Silahkan Masuk</b>
        </p>

        <form action="<?php echo base_url('Auth/cek_login'); ?>" method="post">
          <?php
            if ($this->session->flashdata('error')):
          ?>
           <div class="alert alert-danger shake" role="alert">
                <?php //echo $this->session->flashdata('error'); ?>
                Maaf, Username atau Password Anda Salah!
            </div>
          <?php endif; ?>
          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="Username" name="username">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Password" name="password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <!-- <div class="col-xs-8">
              <div class="checkbox icheck">
                <label>
                  <input type="checkbox"> Remember Me
                </label>

              </div>
            </div> -->
            <div class="col-xs-offset-8 col-xs-4">
              <button type="submit" class="btn btn-success btn-block " name="submit">Masuk</button>
            </div>
          </div>
        </form>


        <!-- <a href="#">Lupa Kata Sandi?</a><br> -->
        

      </div>
      <!-- /.login-box-body -->
      <!-- <?php
        echo show_err_msg($this->session->flashdata('error_msg'));
      ?> -->
    </div>


    <!-- /.login-box -->

    <!-- jQuery 2.2.3 -->
    <script src="<?php echo base_url(); ?>assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
    <!-- Bootstrap 3.3.6 -->
    <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <!-- <script src="<?php echo base_url(); ?>assets/plugins/iCheck/icheck.min.js"></script> -->
    <!-- <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script> -->
  </body>

</html>

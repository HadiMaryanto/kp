<!DOCTYPE html>
<html>
<head>
	<title></title>

  		<link href="<?php echo base_url() ?>/assets/css/login.css" rel="stylesheet" />
  	  <link href="<?php echo base_url() ?>/assets/icon/puswil.png" rel="shortcut icon">

      <script src="<?php echo base_url() ?>/assets/js/jquery-1.11.3.min.js" charset="utf-8"></script>

	<script src="<?php echo base_url() ?>/assets/js/jquery-validasi.js" charset="utf-8"></script>
</head>
<style type="text/css">
  .nav-top a{
    text-decoration: none;
    color: white;
    border-radius: 10px;
    padding: 10px;
    background-color: #ffffff40;
}
.nav-top a:hover{
    background-color: #ffffff90;
    transition: 0.8s;
} 
.nav-top .akses{
    float: right;
    margin-right: 10px;
}
.nav-top .nav-title{
    float: left;
    margin-left: 10px;
}
.nav-top{
    box-shadow: 5px 10px 40px 5px #ffffff6b;
    background-color: #0000004d;
    height: 35px;
    padding-top: 20px;
    color:white;
    margin-bottom: 5%;

}
.link-2 a{
    margin-top: 10px;
    
    text-decoration: none;
    color: green;
     margin: 0 auto;
}
.link-2 {
    
    font-size: 15px;
    display: block;
    
    margin: 0 auto;
    transition: 0.5s;
}
.reg{
    text-align: center;
    margin-top: 20px;
}
.link-2:hover{
    text-decoration: underline;
}
</style>
<body>
<div class="nav-top">
    <div class="nav-title">
        <?php
        $date = date("Y/m/d");
        echo "Date : ".$date;
        ?>
    </div>
    <div class="akses">

        <a href="<?php echo base_url(); ?>Welcome">Kembali</a>
    </div>
</div>



<div class="container">

    <form id="signup" method="post" action="cek_login">

        <div class="header">

            <h3>Login</h3>



        </div>

        <div class="sep"></div>

        <div class="inputs">

            <input type="text" placeholder="Username / Nomor Anggota" name="username" autofocus />

            <input type="password" placeholder="Password" name="password" />



            <input type="submit" name="submit" id="submit" value="Login">
            </form>

            <div class="reg">
                <span style="font-size: 12px;color: grey;">OR</span><br><br>
            <span class="link-2">
            <a href="<?php echo base_url() ?>Auth/register">Registrasi Anggota</a>
            </span>
            </div>
        </div>

    
    

</div>
​
</body>

</html>
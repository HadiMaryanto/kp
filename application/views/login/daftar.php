<!DOCTYPE html>
<html>
<head>
    <title></title>

    <link href="<?php echo base_url() ?>/assets/css/bootstrap.css" rel="stylesheet" />
    <link href="<?php echo base_url() ?>/assets/icon/puswil.png" rel="shortcut icon">

    <script src="<?php echo base_url() ?>/assets/js/jquery-1.11.3.min.js" charset="utf-8"></script>
    <script src="<?php echo base_url() ?>/assets/js/jquery-validasi.js" charset="utf-8"></script>
</head>
<body>
<div class="c1" style="width: 50%;margin: 0 auto;">
    <form action="cek_login" method="post">

        <h1>Silahkan Login !</h1>
        <div class="form-group">
            <label>Username / No Anggota</label>
            <input type="text" name="username" class="form-control">

        </div>

        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control">

        </div>
        <div class="form-group">
            <button type="submit" name="submit" class="btn btn-success">Login</button>
        </div>
    </form>
    <button class="btn btn-succes">Daftar</button>

</div>
</body>
</html>
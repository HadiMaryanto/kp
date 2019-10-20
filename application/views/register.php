<head>
	<link href="<?php echo base_url() ?>/assets/css/bootstrap.css" rel="stylesheet" />

	
</head>
<style type="text/css">
	.box-1{
		width: 40%;
		padding: 30px;
		margin: 0 auto;
		background: #d0d0d09c;
	}
	legend{
		text-align: center;
	}

</style>
<div class="box-1">
<form action="<?php echo base_url() ?>Auth/post_reg" method="POST">
	<legend>Form Pendaftaran</legend>
	<div class="form-group">
		<label>Nama Lengkap</label>
		<input type="text" name="nama" class="form-control" required>                            
    </div>
    <div class="form-group">
		<label>E-mail</label>
		<input type="email" name="email" placeholder="example@email.com" class="form-control" required>                            
    </div>
    <div class="form-group">
		<label>Password</label>
		<input type="password" name="password" placeholder="*******" class="form-control" required>                            
    </div>
    <div class="form-group">
		<label>Ulangi Password</label>
		<input type="password" name="repassword" placeholder="********" class="form-control" required>                            
    </div>
    <div class="form-group">
		<label>Tanggal Lahir</label>
		<input type="date" name="tgl_lahir" class="form-control" required>                            
    </div>
    <div class="form-group">
		<label>Jenis Kelamin</label>
		<select class="form-control" name="jk">

			<option>Laki-Laki</option>
			<option>Perempuan</option>
		</select>                            
    </div>
    <input type="submit" name="submit" value="daftar" style="width: 100%;" class="btn btn-success">


</form>
</div>
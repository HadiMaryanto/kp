

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Online Public Access Catalog Perpustakaan Soeman HS</title>
  
  
  		<link href="<?php echo base_url() ?>/assets/css/bootstrap.css" rel="stylesheet" />
  	  <link href="<?php echo base_url() ?>/assets/icon/puswil.png" rel="shortcut icon">
      <link rel="stylesheet" href="<?php echo base_url() ?>/assets/style.css">
      
      <script src="<?php echo base_url() ?>/assets/js/jquery-1.11.3.min.js" charset="utf-8"></script>
	<script src="<?php echo base_url() ?>/assets/js/jquery-validasi.js" charset="utf-8"></script>
	<!-- <script src="<?php echo base_url() ?>/assets/js/validasi.js" charset="utf-8"></script> -->

  
</head>
<style type="text/css">
#button {margin: 5% auto; width: 100px; text-align: center;}
#button a {
	width: 100px;
	height: 30px;
	vertical-align: middle;
	background-color: #F00;
	color: #fff;
	text-decoration: none;
	padding: 10px;
	border-radius: 5px;
	border: 1px solid transparent;
}

/* Jendela Pop Up */
#popup {
	width: 100%;
	height: 100%;
	position: fixed;
	background: rgba(0,0,0,.7);
	top: 0;
	left: 0;
	z-index: 9999;
	visibility: hidden;
	
}

.window {
	width: 700px;
	background: lightblue;
	border-radius: 10px;
	position: relative;
	padding: 20px;
	text-align: left;
	margin: 15% auto;

}
.window p{
	font-size: 16px;
}
.window h2 {
	margin: 5px 0 0 0;
}
/* Button Close */
.close-button {
	width: 30px;
	height: 30px;
	line-height: 23px;
	background: #000;
	border-radius: 50%;
	border: 3px solid #fff;
	display: block;
	text-align: center;
	color: #fff;
	text-decoration: none;
	position: absolute;
	top: -10px;
	right: -10px;	
}

#popup:target {
	visibility: visible;
}

body{
	padding:0;
	background: url('<?php echo base_url() ?>assets/background/bg2.jpg');
	background-repeat: no-repeat;
	background-size: cover;
}
	#container{
		display: flex;
		width: 70%;
		margin : 0 auto;
		
	}
	.btn-search{
		width: 100px;
	}
	.nav-bot{
		width: 70%;
		margin: 0 auto;
	}
	.head1{
		margin-top: 5%;
		text-align: center;
	}
	.logo-head{
		width: 70%;
		height: 40%;
		max-width: 70%;
		max-height: 40%;
		margin: 0 auto;
	}
	#input-1,#sel1{
		width: 100%;
		font-size: 100%;
	}
	
	footer{
		
		background: #1f4d25;
		width: 100%;

	}
	.foot{
		color: white;
		padding-top: 20px;
		padding-bottom: 20px;
		width: 70%;
		margin: 0 auto;
		margin-top: 80px;
		
	}
	.nav-top{
		background-color: #1f4d25;
		height: 50px;
		padding: 15px;
        color:white;

	}
    .nav-top a{
        text-decoration: none;
        color: white;
        border-radius: 10px;
        padding: 10px;
        background-color: #51A351;
    }
    .nav-top a:hover{
        background-color: #8ABC1E;
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
	.box-atas{
		margin-top: 5%;
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
	<a href="Auth/login">Login</a>
	</div>
</div>	
	

<div class="box-atas">

<div class="head1">
	
<a href="welcome"><img src="<?php echo base_url() ?>/assets/icon/opac.png" width="70%" height="40%" class="logo-head"></a>



</div>



<!-- ---------------- -->		
<div class="cont-atas">

<?php echo form_open('Search'); ?>
<div id="container">

<div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
      <input id="input-1" type="text" class="form-control"  name="key" placeholder="Keyword" required>
   </div>
  
<div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-list-alt"></i></span>
	<select id="sel1" name="berdasarkan" class="form-control">
		<option>Judul</option>
		<option>Pengarang</option>
		<option>Penerbit</option>
		<option>Nomor Panggil</option>
		<option>ISBN</option>
		<option>ISSN</option>
		<option>ISMN</option>
	</select>
</div>
	<button type="submit" class="btn btn-success" id="btn-1" class="btn-search" name="submit">Search  <i class="glyphicon glyphicon-search"></i></button>

</div>
<div class="nav-bot">
	<a href="Search/tampil_data">Riwayat Pencarian</a> | <a href="#" onclick="tampil()">Bantuan</a> <!-- | <a href="search/tes">Email</a> -->
</div>

</div>
<!-- ------------------- -->
</div>
</body>

<footer>
	<div class="foot">
		<span>Perpustakaan Soeman HS</span><br>
		<span>Jl. Jendral Sudirman No.462, Jadirejo, Sukajadi, Jadirejo, Sukajadi, Kota Pekanbaru, Riau 28121</span>
	</div>
</footer>

<div id="popup">
    	<div class="window">
        	<a href="#" class="close-button" title="Close" onclick=tutup()> X </a>
            <h2>Petunjuk Pemakaian OPAC</h2><hr>
            <p>  
            1.	Ketikkan kata kunci pencarian, misalnya : " Sejarah Peradaban Islam " <br>
			2.	Pilih ruas yang dicari, misalnya : " Judul " . <br>
			3.	Klik tombol "Cari" atau tekan tombol Enter pada keyboard. <br>
            </p>
        </div>
 </div>


<script type="text/javascript">

	function tampil() {
		document.getElementById('popup').style.visibility="visible";
	}
	function tutup(){
		document.getElementById('popup').style.visibility="hidden";
	}
</script>
  
    

</body>
</html>
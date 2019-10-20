<html>
<head>
  <title>Form Import</title>
  
  <!-- Load File jquery.min.js yang ada difolder js -->
  <script src="<?php echo base_url('asset/js/jquery.min.js.js'); ?>"></script>
  
  <script>
  $(document).ready(function(){
    // Sembunyikan alert validasi kosong
    $("#kosong").hide();
  });
  </script>
</head>
<body>
  <h3>Form Import</h3>
  <hr>
  
  <a href="<?php echo base_url("excel/format.xlsx"); ?>">Download Format</a>
  <br>
  <br>
  
  <!-- Buat sebuah tag form dan arahkan action nya ke controller ini lagi -->
  <form method="post" action="<?php echo base_url("Muzakki/form"); ?>" enctype="multipart/form-data">
    <!-- 
    -- Buat sebuah input type file
    -- class pull-left berfungsi agar file input berada di sebelah kiri
    -->
    <input type="file" name="file">
    
    <!--
    -- BUat sebuah tombol submit untuk melakukan preview terlebih dahulu data yang akan di import
    -->
    <input type="submit" name="preview" value="Preview">
  </form>
  
  <?php
  if(isset($_POST['preview'])){ // Jika user menekan tombol Preview pada form 
    if(isset($upload_error)){ // Jika proses upload gagal
      echo "<div style='color: red;'>".$upload_error."</div>"; // Muncul pesan error upload
      die; // stop skrip
    }
    
    // Buat sebuah tag form untuk proses import data ke database
    echo "<form method='post' action='".base_url("Muzakki/import")."'>";
    
    // Buat sebuah div untuk alert validasi kosong
    echo "<div style='color: red;' id='kosong'>
    Semua data belum diisi, Ada <span id='jumlah_kosong'></span> data yang belum diisi.
    </div>";
    
    echo "<table border='1' cellpadding='8'>
    <tr>
      <th colspan='5'>Preview Data</th>
    </tr>
    <tr>
      <th>Nama</th>
      <th>Alamat</th>
      <th>No. Hp</th>
      <th>Cara Donasi</th>
      <th>Email</th>
      <th>No. NPWP</th>
      <th>Program Donasi</th>
      <th>Tanggal Transaksi</th>
      <th>Jenis Donasi</th>
    </tr>";
    
    $numrow = 1;
    $kosong = 0;
    
    // Lakukan perulangan dari data yang ada di excel
    // $sheet adalah variabel yang dikirim dari controller
    foreach($sheet as $row){ 
      // Ambil data pada excel sesuai Kolom
      $nama_muz = $row['A']; // Ambil data NIS
      $alamat_muz = $row['B']; // Ambil data nama
      $no_hp = $row['C']; // Ambil data jenis kelamin
      $cara_donasi = $row['D']; // Ambil data alamat
      $email = $row['E']; // Ambil data alamat
      $no_npwp = $row['F']; // Ambil data alamat
      $program_donasi = $row['G']; // Ambil data alamat
      $tgl_transaksi = $row['H']; // Ambil data alamat
      $jenis_donasi = $row['I']; // Ambil data alamat

      
      // Cek jika semua data tidak diisi
      if(empty($nama_muz) && empty($alamat_muz) && empty($no_hp) && empty($cara_donasi) && empty($email) && empty($no_npwp) && empty($program_donasi) && empty($tgl_transaksi) && empty($jenis_donasi))
        continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)
      
      // Cek $numrow apakah lebih dari 1
      // Artinya karena baris pertama adalah nama-nama kolom
      // Jadi dilewat saja, tidak usah diimport
      if($numrow > 1){
        // Validasi apakah semua data telah diisi
        $nama_muz_td = ( ! empty($nama_muz))? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
        $alamat_muz_td = ( ! empty($alamat_muz))? "" : " style='background: #E07171;'"; // Jika Nama kosong, beri warna merah
        $no_hp_td = ( ! empty($no_hp))? "" : " style='background: #E07171;'"; // Jika Jenis Kelamin kosong, beri warna merah
        $cara_donasi_td = ( ! empty($cara_donasi))? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
        $email_td = ( ! empty($email))? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
        $no_npwp_td = ( ! empty($no_npwp))? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
        $tgl_transaksi_td = ( ! empty($tgl_transaksi))? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
        $jenis_donasi_td = ( ! empty($jenis_donasi))? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
        
        // Jika salah satu data ada yang kosong
        if(empty($nama_muz) or empty($alamat_muz) or empty($no_hp) or empty($cara_donasi) or empty($email) or empty($no_npwp) or empty($cara_donasi) or empty($tgl_transaksi) or empty($jenis_donasi)){
          $kosong++; // Tambah 1 variabel $kosong
        }
        
        echo "<tr>";
        echo "<td".$nama_muz_td.">".$nama_muz."</td>";
        echo "<td".$alamat_muz_td.">".$alamat_muz."</td>";
        echo "<td".$no_hp_td.">".$no_hp."</td>";
        echo "<td".$cara_donasi_td.">".$cara_donasi."</td>";
        echo "<td".$email_td.">".$email."</td>";
        echo "<td".$no_npwp_td.">".$no_npwp."</td>";
        echo "<td".$program_donasi_td.">".$program_donasi."</td>";
        echo "<td".$tgl_transaksi_td.">".$tgl_transaksi."</td>";
        echo "<td".$jenis_donasi_td.">".$jenis_donasi."</td>";
        echo "</tr>";
      }
      
      $numrow++; // Tambah 1 setiap kali looping
    }
    
    echo "</table>";
    
    // Cek apakah variabel kosong lebih dari 0
    // Jika lebih dari 0, berarti ada data yang masih kosong
    if($kosong > 0){
    ?>  
      <script>
      $(document).ready(function(){
        // Ubah isi dari tag span dengan id jumlah_kosong dengan isi dari variabel kosong
        $("#jumlah_kosong").html('<?php echo $kosong; ?>');
        
        $("#kosong").show(); // Munculkan alert validasi kosong
      });
      </script>
    <?php
    }else{ // Jika semua data sudah diisi
      echo "<hr>";
      
      // Buat sebuah tombol untuk mengimport data ke database
      echo "<button type='submit' name='import'>Import</button>";
      echo "<a href='".base_url("Muzakki")."'>Cancel</a>";
    }
    
    echo "</form>";
  }
  ?>
</body>
</html>
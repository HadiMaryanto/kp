<?php if($this->session->flashdata('sukses')): ?>
  <div class="alert alert-success " role="alert" id="sukses-tambah">
    <?php echo $this->session->flashdata('sukses') ?>
   </div>
<?php endif; ?>

<!-- /. ROW  -->
  <div class="row">
    <div class="col-md-12">
      <h2 class="page-header">
  
        Detail Data <b><?php echo $record['nama_muz'];  ?></b> (Muzakki)
      </h2>
    </div>
  </div>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
<?php if ($this->session->userdata('level') != 'pimpinan'): ?>
                 
                 <a title="Cetak Data Muzakki" class="btn btn-primary btn-sm" 
                 href="<?php echo site_url().'Muzakki/cetak_detail/'.$record['id_muzakki']; ?>"><i class="glyphicon glyphicon-print"> Cetak</i></a>
<?php endif ?>
</div>

    <!-- =====================-->
    
    <div class="row">
    <div class="col-md-12">
    <div class="panel panel-default">
     <div class="panel-body abox" style="display: flex;"> 
      <div class="box">
      <!-- <div class="box"> -->
     <table>
      <tbody>
      <tr>
        <td>Nama</td>
        <td>&emsp;</td>
        <td>:</td>
        <td>&emsp;</td>
        <td><?php echo $record['nama_muz'];  ?></td>
      </tr>
      <br>
      <tr>
        <td>Alamat</td>
        <td></td>
        <td>:</td>
        <td></td>
        <td><?php echo $record['alamat_muz'];  ?></td>
      </tr>
      <br>
      <tr>
        <td>No.HP</td>
        <td></td>
        <td>:</td>
        <td></td>
        <td><?php echo $record['no_hp'];  ?></td>
      </tr>
      </tbody>
    </table>
    </div>
      
      
      <!-- <span>Cara Donasi : <?php echo $record['cara_donasi'];  ?></span><br> -->
      <!-- </tr>
      </div> -->
      <div class="box">
        <table>
          <tbody>
            <tr>
              <td>Email</td>
              <td>&emsp;</td>
              <td>:</td>
              <td>&emsp;</td>
              <td><?php echo $record['email'];  ?></td>
            </tr>
            <br>
            
            <tr>
              <td>No. NPWP</td>
              <td></td>
              <td>:</td>
              <td></td>
              <td><?php echo $record['no_npwp'];  ?></td>
            </tr>
          </tbody>
        </table>
      </div>
      
    </div>
    </div>
    </div>
  <style type="text/css">
    table th {
      text-align: center;
    }
  </style>  
</div>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
              
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                      <thead>
                            <tr>
                                <th>No.</th>
                                
                                <th>Nama Program</th>
                                <th>Jenis Donasi</th>
                                <th>Cara Donasi</th>
                                <th>Tanggal Transaksi</th>
                                <th>Jumlah</th>
                                

                            </tr>
                        </thead>
                        <tbody>
                        
                        <?php $no=1; foreach($detail_promuz as $key => $row) { ?>
                            <tr class="gradeU">
                             
                               <td><?php echo $no?></td>
                               
                               <td><?php echo $row['nama_program']?></td>
                               <td><?php echo $row['jenis_donasi']?></td>
                               <td><?php echo $row['cara_donasi']?></td>
                               <td><?php echo $row['tgl_transaksi'] ?></td>
                               <td class="jumlah"><?php echo $row['jumlah']?></td>

                                
                            </tr>
                        <?php $no++; } ?>
                        </tbody>
 
                        <!-- <colgroup>

                            <tr>
                                <th colspan="4">Januari</th>
                                <th colspan="4">Februari</th>
                            </tr>
                            <tr>
                              <th colspan="2">Program 1</th>
                              <th colspan="2">Program 2</th>
                              <th colspan="2">Program 1</th>
                              <th colspan="2">Program 2</th>

                            </tr>
                            <tr>
                              <th>Program</th>
                              <th>Jumlah</th>
                              <th>Program</th>
                              <th>Jumlah</th>
                              <th>Program</th>
                              <th>Jumlah</th>
                              <th>Program</th>
                              <th>Jumlah</th>
                            </tr>
                        </colgroup> -->
                        <!-- </thead>
                        <tbody>
                       
                        </tbody> -->
                    </table>
                </div>

            </div>
        </div>
        <!-- /. PANEL  -->
    </div>
</div>
<!-- /. ROW  -->

<script src="<?php echo base_url() ?>assets/js/jquery.js" charset="utf-8"></script>
<script type="text/javascript">
  $(document).ready(function(){
    var jumlah = $('.jumlah').text();
    var td  = $('.jumlah');

    for (var i = 0; i < td.length; i++) {
      // var nilai = td[i];
      td[i].innerHTML = "Rp "+td[i].innerText.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
    }

    // var 


    // console.log(hasil);
    // $('#sukses-tambah').fadeOut(600);
  });
</script>

<!-- <script type="text/javascript">

  var bilangan = document.getElementById('jumlah').innerText;
  var jumlah = document.getElementById('jumlah');
  // console.log(jumlah);
  // var bilangan = ;
  
  var number_string = bilangan.toString(),
    sisa  = number_string.length % 3,
    rupiah  = number_string.substr(0, sisa),
    ribuan  = number_string.substr(sisa).match(/\d{3}/g);
      
  if (ribuan) {
    separator = sisa ? '.' : '';
    rupiah += separator + ribuan.join('.');
  }
  // console.log(rupiah);
  jumlah.innerHTML = "Rp "+rupiah;
  // // Cetak hasil
  // document.write(rupiah); // Hasil: 23.456.789
</script>
 -->
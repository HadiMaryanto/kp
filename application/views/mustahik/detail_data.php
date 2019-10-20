<?php if($this->session->flashdata('sukses')): ?>
  <div class="alert alert-success " role="alert" id="sukses-tambah">
    <?php echo $this->session->flashdata('sukses') ?>
   </div>
<?php endif; ?>

<div class="row">
    <div class="col-md-12">
        <h2 class="page-header">
           Detail Data <b><?php echo $record['nama_mus'];  ?></b> (Mustahik)
        </h2>
    </div>

</div>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
<?php if ($this->session->userdata('level') != 'pimpinan'): ?>

                 <a title="Cetak Data Mustahik" class="btn btn-primary btn-sm"
                 href="<?php echo site_url().'Mustahik/cetak_detail/'.$record['id_mustahik']; ?>"><i class="glyphicon glyphicon-print"> Cetak</i></a>
<?php endif ?>
</div>

<!-- /. ROW  -->
<div class="row">
    <div class="col-md-12">
    <div class="panel panel-default">
     <div class="panel-body abox" style="display: flex;">
      <div class="box">
      <span>No.Registrasi : <?php echo $record['no_registrasi'];  ?></span><br>
      <span>Tgl Registrasi : <?php echo $record['tgl_registrasi'];  ?></span><br>
      <span>Nama : <?php echo $record['nama_mus'];  ?></span><br>
      <span>TTL : <?php echo $record['tempat_lahir'];  ?>,<?php echo $record['tgl_lahir'];  ?></span><br>
       <span>Usia : <?php echo $record['usia'];?> <br>
      <span>Pekerjaan : <?php echo $record['pekerjaan'];  ?></span><br>
    </div>
    <div class="box">
      <span>Alamat : <?php echo $record['alamat_mus'];  ?></span><br>
      <span>RT/RW : <?php echo $record['rt_rw'];  ?></span><br>
      <span>Kelurahan : <?php echo $record['kelurahan'];  ?></span><br>
      <span>Kecamatan : <?php echo $record['kecamatan'];  ?></span><br>
      <span>Masjid/Musholla : <?php echo $record['masjid_musholla'];  ?></span><br>

    </div>
    <div class="box">
      <span>Kategori Asnaf :<?php echo $record['kategori_asnaf'];  ?></span><br>
      <span>Tgl Survey :<?php echo $record['waktu_survey'];  ?></span><br>
      <span>Surveyor :<?php echo $record['surveyor'];  ?></span><br>
      <span>Status Persetujuan :<?php echo $record['status_persetujuan'];  ?></span><br>
      <span>Keterangan :<?php echo $record['keterangan'];  ?></span><br>
      <span>Latitude : <?php echo $record['latitude'];  ?></span><br>
      <span>Longitude : <?php echo $record['longitude'];  ?></span><br>


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
            <!-- <div class="panel-heading">
                 <?php echo anchor('Mustahik/post','Tambah Data',array('class'=>'btn btn-info btn-sm')) ?>
            </div> -->
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                      <thead>
                            <tr>
                                <th>No.</th>

                                <th>Nama Program</th>
                                <th>Jenis Program</th>
                                <th>Tanggal Transaksi</th>
                                <!-- <th>Penyalur</th> -->
                                <th>Jumlah</th>


                            </tr>
                        </thead>
                        <tbody>

                        <?php $no=1; foreach($detail_promus as $key => $row) { ?>
                            <tr class="gradeU">
                              <!-- <?php
                                  $bulan = new DateTime($row['bulan']);

                                ?> -->
                               <td><?php echo $no?></td>

                               <td><?php echo $row['nama_program']?></td>
                               <td><?php echo $row['jenis_program']?></td>
                               <!-- <td><?php echo $bulan->format('F') ?></td> -->
                               <td><?php echo $row['bulan']?></td>
                               <td class="jumlah"><?php echo $row['jumlah']?></td>


                            </tr>
                        <?php $no++; } ?>
                        </tbody>
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


    // $('#sukses-tambah').fadeOut(600);
  });
</script>

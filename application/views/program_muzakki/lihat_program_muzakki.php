<section class="content-header">
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('#') ?>"></i><i class="fa fa-users"></i> Program Muzakki</a></li>

      </ol>
    </section>

<div class="row"> 
  <div class="col-md-12">
      <section class="content-header">
        <h1 class="page-header">
           Data <small>Program Muzakki</small>
        </h1>
      </section>
    

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <!-- <div class="panel-heading">
                 <?php echo anchor('Muzakki/post','Tambah Data',array('class'=>'btn btn-info btn-sm')) ?>
            </div> -->
            <div class="panel-body">
                <div class="table-responsive">
                  <table id="tabelProgramMuz" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>                                
                                <th>Alamat</th>
                                <th>No. NPWP</th>
                                <th>Nama Program</th>
                                <th>Jenis Program</th>
                                <th>Cara Donasi</th>
                                <th>Tanggal Transaksi</th>
                                <th>Jumlah</th>
                           <?php if ($this->session->userdata('level') != 'pimpinan'): ?>
                                <th>Aksi</th>
                            <?php endif ?>

                            </tr>
                        </thead>
                        <tbody>
                        <?php $no=1; foreach($program_muzakki as $key => $row) { ?>
                            <tr class="gradeU">
                              <!-- <?php
                                  $bulan = new DateTime($row['bulan']);

                                ?> -->
                               <td><?php echo $no?></td>
                               <td><?php echo $row['nama_muz']?></td>
                               <td><?php echo $row['alamat_muz']?></td>
                               <td><?php echo $row['no_npwp']?></td>                               
                               <td><?php echo $row['nama_program']?></td>
                               <td><?php echo $row['jenis_program']?></td>
                               <td><?php echo $row['cara_donasi']?></td>
                               <td><?php echo $row['tgl_transaksi']?></td>
                               <td class="jumlah"><?php echo $row['jumlah']?></td>

                        <?php if ($this->session->userdata('level') != 'pimpinan'): ?>
                                <td class="center">
                                  
                                    <a title="Hapus" class="btn btn-danger" href=""
                                       onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"> <i class="glyphicon glyphicon-trash"></i></a>
                                </td>
                        <?php endif ?>
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

<script src="<?php echo base_url() ?>assets/js/jquery.js" charset="utf-8"></script>
                <script type="text/javascript">
                  $(document).ready(function(){
                    $('#sukses-login').fadeOut('slow');

                    $('#tabelProgramMuz').DataTable({
                      'paging'      : true,
                      'lengthChange': true,
                      'searching'   : true,
                      'ordering'    : true,
                      'info'        : true,
                      'autoWidth'   : false
                    })  
                  });
                </script>
                <!-- /. ROW  -->
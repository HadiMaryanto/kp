<section class="content-header">
      <!-- <h1>
        Dashboard
        <small>Control panel</small>
      </h1> -->
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('#') ?>"></i><i class="fa fa-users"></i> Program Mustahik</a></li>
        <!-- <li class="active">Home</li> -->
      </ol>
    </section>

<div class="row">
  <div class="col-md-12">
      <section class="content-header">
        <h1 class="page-header">
           Data <small>Program Mustahik</small>
        </h1>
      </section>

<!-- /. ROW  -->

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <!-- <div class="panel-heading">
                 <?php echo anchor('Mustahik/post','Tambah Data',array('class'=>'btn btn-info btn-sm')) ?>
            </div> -->
            <div class="panel-body">
                <div class="table-responsive">
                  <table id="tabelProgramMus" class="table table-bordered table-striped">
                    <!-- <table class="table table-striped table-bordered table-hover" id="dataTables-example"> -->
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>No. KTP</th>
                                <th>Alamat</th>
                                <th>Waktu Survey</th>
                                <th>Nama Program</th>
                                <th>Jenis Program</th>
                                <th>Tanggal Transaksi</th>
                                <!-- <th>Penyalur</th> -->
                                <th>Jumlah</th>
                           <?php if ($this->session->userdata('level') != 'pimpinan'): ?>
                                <th>Aksi</th>
                            <?php endif ?>

                            </tr>
                        </thead>
                        <tbody>
                        <?php $no=1; foreach($program_mustahik as $key => $row) { ?>
                            <tr class="gradeU">

                               <td><?php echo $no?></td>
                               <td><?php echo $row['nama_mus']?></td>
                               <td><?php echo $row['no_ktp']?></td>
                               <td><?php echo $row['alamat_mus']?></td>
                               <td><?php echo $row['waktu_survey']?></td>
                               <td><?php echo $row['nama_program']?></td>
                               <td><?php echo $row['jenis_program']?></td>
                               <td><?php echo $row['bulan'] ?></td>
                              <!--  <td><?php echo $row['penyalur']?></td> -->
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

<!-- <script src="<?php echo base_url() ?>assets/js/jquery.js" charset="utf-8"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $('#sukses-tambah').fadeOut(600);
  });
</script>
 -->
 <script src="<?php echo base_url() ?>assets/js/jquery.js" charset="utf-8"></script>
                <script type="text/javascript">
                  $(document).ready(function(){
                    $('#sukses-login').fadeOut('slow');

                    $('#tabelProgramMus').DataTable({
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

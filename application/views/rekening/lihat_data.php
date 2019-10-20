  <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('Rekening') ?>"></i><i class="fa fa-credit-card"></i>Rekening</a></li>
      </ol>
    </section>

<div class="row"> 
  <div class="col-md-12">
      <section class="content-header">
        <h1 class="page-header">
           Data <small>Rekening</small>
        </h1>
      </section>
    </div>
</div>


    

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
        <?php if ($this->session->userdata('level') != 'pimpinan'): ?>
            <div class="panel-heading">
                 <?php echo anchor('Rekening/post','Tambah Data',array('class'=>'btn btn-primary btn-sm')) ?>
            </div>
        <?php endif ?>
            <div class="panel-body">
                <div class="table-responsive">
                    <table id="tabelRekening" class="table table-bordered table-striped">
                    <!-- <table class="table table-striped table-bordered table-hover" id="dataTables-example"> -->
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Bank</th>
                                <th>Nomor Rekening</th>
                                <th>Saldo</th>
                                <th>Tanggal Aktivasi</th>
        <?php if ($this->session->userdata('level') != 'pimpinan'): ?>
                                <th>Aksi</th>
        <?php endif ?>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $no=1; foreach ($record->result() as $r) { ?>
                            <tr class="gradeU">
                               <td><?php echo $no?></td>
                               <td><?php echo $r->nama_bank?></td>
                               <td><?php echo $r->no_rek?></td>
                               <td class="saldo">Rp.<?php echo $r->saldo?></td>
                               <td><?php echo $r->tgl_aktivasi?></td>


        <?php if ($this->session->userdata('level') != 'pimpinan'): ?>

                                <td class="center">

                                    <!-- <a title="Edit" class="btn btn-warning" href="<?php echo site_url('Rekening/edit/'.$r->id_rek) ?>"><i class="glyphicon glyphicon-edit"></i></a> -->

                                    <a title="Hapus" class="btn btn-danger" href="<?php echo site_url('Rekening/delete/'.$r->id_rek) ?>"
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
<!-- /. ROW  -->
<script src="<?php echo base_url() ?>assets/js/jquery.js" charset="utf-8"></script>
<script type="text/javascript">
  $(document).ready(function(){
    var saldo = $('.saldo').text();
    var td  = $('.saldo');

    for (var i = 0; i < td.length; i++) {
      // var nilai = td[i];
      td[i].innerHTML = td[i].innerText.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
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

                    $('#tabelRekening').DataTable({
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


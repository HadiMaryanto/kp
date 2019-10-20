<section class="content-header">
      <!-- <h1>
        Dashboard
        <small>Control panel</small>
      </h1> -->
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('Asnaf') ?>"></i><i class="fa fa-folder-open"></i>Asnaf</a></li>
        <!-- <li class="active">Home</li> -->
      </ol>
    </section>

<div class="row">
    <div class="col-md-12">
        <h2 class="page-header">
           Data Kategori Asnaf
        </h2>
    </div>
</div>
<!-- /. ROW  -->

    

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
        <?php if ($this->session->userdata('level') != 'pimpinan'): ?>
            <div class="panel-heading">
                 <?php echo anchor('Asnaf/post','Tambah Data',array('class'=>'btn btn-primary btn-sm')) ?>
            </div>
        <?php endif ?>
            <div class="panel-body">
                <div class="table-responsive">
                    <table id="tabelAsnaf" class="table table-bordered table-striped">
                    <!-- <table class="table table-striped table-bordered table-hover" id="dataTables-example"> -->
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kategori Asnaf</th>
        <?php if ($this->session->userdata('level') != 'pimpinan'): ?>
                                <th>Aksi</th>
        <?php endif ?>

                            </tr>
                        </thead>
                        <tbody>
                        <?php $no=1; foreach ($record->result() as $r) { ?>
                            <tr class="gradeU">
                               <td><?php echo $no?></td>
                               <td><?php echo $r->nama_asnaf?></td>

        <?php if ($this->session->userdata('level') != 'pimpinan'): ?>
                                <td class="center">

                                    <a title="Edit" class="btn btn-warning" href="<?php echo site_url('Asnaf/edit/'.$r->id_asnaf) ?>"><i class="glyphicon glyphicon-edit"></i></a>

                                    <a title="Hapus" class="btn btn-danger" href="<?php echo site_url('Asnaf/delete/'.$r->id_asnaf) ?>"
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
                    $('#sukses-login').fadeOut('slow');

                    $('#tabelAsnaf').DataTable({
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

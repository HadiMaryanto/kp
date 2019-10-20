    <section class="content-header">
      
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('Petugas') ?>"></i><i class="fa fa-users"></i>Data Petugas</a></li>
        <!-- <li class="active">Home</li> -->
      </ol>
    </section>

<div class="row">
    <div class="col-md-12">
        <h2 class="page-header">
           Data Petugas
        </h2>
    </div>
</div>
<!-- /. ROW  -->



<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
    <?php if ($this->session->userdata('level') != 'pimpinan'): ?>
            <div class="panel-heading">
                 <?php echo anchor('Petugas/post','Tambah Data',array('class'=>'btn btn-primary btn-sm')) ?>
            </div>
    <?php endif ?>
            <div class="panel-body">
                <div class="table-responsive">
                    <table id="tabelPetugas" class="table table-bordered table-striped">
                    
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Petugas</th>
                                <th>Jabatan</th>
        <?php if ($this->session->userdata('level') != 'pimpinan'): ?>
                                <th>Aksi</th>
        <?php endif ?>

                            </tr>
                        </thead>
                        <tbody>
                        <?php $no=1; foreach ($record->result() as $r) { ?>
                            <tr class="gradeU">
                               <td><?php echo $no?></td>
                               <td><?php echo $r->nama_petugas?></td>
                               <td><?php echo $r->jabatan?></td>

        <?php if ($this->session->userdata('level') != 'pimpinan'): ?>

                                <td class="center">

                                    <a title="Edit" class="btn btn-warning" href="<?php echo site_url('Petugas/edit/'.$r->id_petugas) ?>"><i class="glyphicon glyphicon-edit"></i></a>

                                    <a title="Hapus" class="btn btn-danger" href="<?php echo site_url('Petugas/delete/'.$r->id_petugas) ?>"
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

                    $('#tabelPetugas').DataTable({
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

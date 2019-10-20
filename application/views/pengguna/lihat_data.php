 <section class="content-header">
      <!-- <h1>
        Dashboard
        <small>Control panel</small>
      </h1> -->
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('Pengguna') ?>"></i><i class="fa fa-folder"></i> Pengguna</a></li>
        <!-- <li class="active">Home</li> -->
      </ol>
    </section>

<div class="row">
    <div class="col-md-12">
        <h2 class="page-header">
           Data Pengguna
        </h2>
    </div>
</div>
<!-- /. ROW  -->

   

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
        
            <div class="panel-heading">
                 <?php echo anchor('Pengguna/post','Tambah Data',array('class'=>'btn btn-primary btn-sm')) ?>
            </div>
       
            <div class="panel-body">
                <div class="table-responsive">
                    <table id="tabelPengguna" class="table table-bordered table-striped">
                    <!-- <table class="table table-striped table-bordered table-hover" id="dataTables-example"> -->
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Nama Lengkap</th>
                                <th>Level</th>
                        
                                <th>Aksi</th>
                        

                            </tr>
                        </thead>
                        <tbody>
                        <?php $no=1; foreach ($record->result() as $r) { ?>
                            <tr class="gradeU">
                               <td><?php echo $no?></td>
                               <td><?php echo $r->username?></td>
                               <td>*******</td>
                               <td><?php echo $r->nama_lengkap?></td>
                               <td><?php echo $r->level?></td>


                        
                                <td class="center">

                                    <!-- <a title="Edit" class="btn btn-warning" href="<?php echo site_url('Pengguna/edit/'.$r->id_user) ?>"><i class="glyphicon glyphicon-edit"></i></a> -->

                                    <a title="Hapus" class="btn btn-danger" href="<?php echo site_url('Pengguna/delete/'.$r->id_user) ?>"
                                       onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"> <i class="glyphicon glyphicon-trash"></i></a>
                                </td>
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

                    $('#tabelPengguna').DataTable({
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

    <section class="content-header">
      
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('Muzakki') ?>"></i><i class="fa fa-user-secret"></i>Muzakki</a></li>
        <!-- <li class="active">Home</li> -->
      </ol>
    </section>
                
                <div class="row">
                    <div class="col-md-12">
                      <section class="content-header">
                        <h1 class="page-header">
                           Data <small>Muzakki</small>
                        </h1>
                      </section>
                    </div>
                </div>
                <!-- /. ROW  -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
<?php if ($this->session->userdata('level') != 'pimpinan'): ?>

                                 <!-- <?php echo anchor('Muzakki/post','Tambah Data',array('class'=>'btn btn-primary btn-sm ')) ?> -->

                                 <a title="Tambah Data Muzakki" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModalLong"><i class="glyphicon glyphicon-pencil"> Tambah</i></a>

                                 <!-- <?php echo anchor('Muzakki/form',' Import',array('class'=>'btn btn-success btn-sm glyphicon glyphicon-floppy-save')) ?>
 -->
                                 <!-- <a title="Import Data Excel" class="btn btn-success btn-sm" href="<?php echo site_url('Muzakki/form') ?>"><i class="glyphicon glyphicon-floppy-save"> Import</i></a>

                                 <a title="Export Data Excel" class="btn btn-danger btn-sm" href="<?php echo site_url('Muzakki/export') ?>"><i class="  glyphicon glyphicon-floppy-open"> Export</i></a> -->

                                 <!-- <?php echo anchor('Muzakki/export',' Export',array('class'=>'btn btn-danger btn-sm glyphicon glyphicon-floppy-open')) ?> -->
  <?php endif ?>
                            </div>


<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLongTitle" style="display: block; text-align: center;">Tambah Data</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <?php echo form_open('Muzakki/post'); ?>

              <div class="input-group form-group">
              <span class="input-group-addon" id="sizing-addon2">
                <i class="glyphicon glyphicon-user"></i>
              </span>
              <input type="text" class="form-control" placeholder="Nama" name="nama" aria-describedby="sizing-addon2">
            </div>
 
            <div class="input-group form-group">
              <span class="input-group-addon" id="sizing-addon2">
                <i class="glyphicon glyphicon-road"></i>
              </span>
              <input type="text" class="form-control" placeholder="Alamat" name="alamat" aria-describedby="sizing-addon2">
            </div>

            <div class="input-group form-group">
              <span class="input-group-addon" id="sizing-addon2">
                <i class="glyphicon glyphicon-send"></i>
              </span>
              <input type="number" class="form-control" placeholder="No. HP" name="no_hp" aria-describedby="sizing-addon2">
            </div>

            

            <div class="input-group form-group">
              <span class="input-group-addon" id="sizing-addon2">
                <i class="glyphicon glyphicon-envelope"></i>
              </span>
              <input type="text" class="form-control" placeholder="Email" name="email" aria-describedby="sizing-addon2">
            </div>

            <div class="input-group form-group">
              <span class="input-group-addon" id="sizing-addon2">
                <i class="glyphicon glyphicon-road"></i>
              </span>
              <input type="number" class="form-control" placeholder="No. NPWP" name="no_npwp" aria-describedby="sizing-addon2">
            </div>

            


      </div>
      <div class="modal-footer">
        <button type="submit" class="form-control btn btn-primary" name="submit" class="glyphicon glyphicon-ok">Simpan</button>
        <!-- <button type="button" class="form-control btn btn-danger" data-dismiss="modal" class="glyphicon glyphicon-ok">Batal</button> -->
      </div>
    </form>
    </div>
  </div>
</div>


                                 
                            

                            <!-- <div class="col-md-3">
                                <a href="<?php echo base_url('Pegawai/export'); ?>" class="form-control btn btn-default"><i class="glyphicon glyphicon glyphicon-floppy-save"></i> Export Data Excel</a>
                            </div>
 -->
                            <div class="panel-body">
                                <div class="table-responsive">
                                  <table id="tabelMuzaki" class="table table-bordered table-striped">
                                    <!-- <table class="table table-striped table-bordered table-hover" id="dataTables-example"> -->
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Alamat</th>
                                                <th>No. Hp</th>
                                                <!-- <th>Cara Donasi</th> -->
                                                <th>Email</th>
                                                <th>No. NPWP</th>
                                                <!-- <th>Program Donasi</th> -->
                                                <!-- <th>Tanggal Transaksi</th> -->
                                                <!-- <th>Jenis Donasi</th> -->
                                                <th>Aksi</th>


                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $no=1; foreach ($record->result() as $r) { ?>
                                            <tr class="gradeU">
                                               <td><?php echo $no?></td>
                                                <td><?php echo $r->nama_muz?></td>
                                               <td><?php echo $r->alamat_muz?></td>
                                               <td><?php echo $r->no_hp?></td>
                                               <!-- <td><?php echo $r->cara_donasi?></td> -->
                                               <td><?php echo $r->email?></td>
                                               <td><?php echo $r->no_npwp?></td>
                                              <!--  <td><?php echo $r->program_donasi?></td> -->
                                              <!-- <td><?php echo $r->tgl_transaksi?></td> -->
                                              <!--  <td><?php echo $r->jenis_donasi?></td>-->

  <td class="center">
<?php if ($this->session->userdata('level') != 'pimpinan'): ?>
                                                    <a title="Tambah Program Muzakki" class="btn btn-primary btn-sm" href="<?php echo site_url('Muzakki/tambahProgram/'.$r->id_muzakki) ?>"><i class="glyphicon glyphicon-plus"></i></a>

                                                    <a title="Edit" class="btn btn-warning btn-sm" href="<?php echo site_url('Muzakki/edit/'.$r->id_muzakki) ?>"><i class="glyphicon glyphicon-edit"></i></a>
<?php endif?>

                                                    <a title="Detail" class="btn btn-success btn-sm" href="<?php echo site_url('Muzakki/detail/'.$r->id_muzakki) ?>"><i class="glyphicon glyphicon-eye-open"></i></a>

<?php if ($this->session->userdata('level') != 'pimpinan'): ?>
                                                    <a title="Hapus" class="btn btn-danger btn-sm" href="<?php echo site_url('Muzakki/delete/'.$r->id_muzakki) ?>"
                                                       onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"> <i class="glyphicon glyphicon-trash"></i></a>
<?php endif ?>
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
                <script src="<?php echo base_url() ?>assets/js/jquery.js" charset="utf-8"></script>
                <script type="text/javascript">
                  $(document).ready(function(){
                    $('#sukses-login').fadeOut('slow');

                    $('#tabelMuzaki').DataTable({
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

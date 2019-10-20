<?php if($this->session->flashdata('sukses')){?>
  <div class="alert alert-success " role="alert" id="sukses-tambah">
    <?php echo $this->session->flashdata('sukses') ?>
   </div>
<?php } else if ($this->session->flashdata('error')) {
  ?>
  <div class="alert alert-error " role="alert" id="sukses-tambah">
    <?php echo $this->session->flashdata('error') ?>
   </div>

<?php }
  ?>

    <section class="content-header">

      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('Mustahik') ?>"></i><i class="fa fa-user"></i>Mustahik</a></li>
        <!-- <li class="active">Home</li> -->
      </ol>
    </section>


<div class="row">
  <div class="col-md-12">
    <section class="content-header">
     <h1 class="page-header">
       Data <small>Mustahik</small>
     </h1>
    </section>
  </div>
</div>


<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
<?php if ($this->session->userdata('level') != 'pimpinan'): ?>

                 <a title="Tambah Data Mustahik" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModalLong"><i class="glyphicon glyphicon-pencil"> Tambah</i></a>
                 <form method="post" id="import_form" enctype="multipart/form-data" style="margin-left:8px;">
                   <p><label>Select Excel File</label>
                     <input type="file" name="file" id="file" required accept=".xls, .xlsx">
                   </p>
                    <input type="submit" name="import" value="Import" class="btn btn-info">
                </form>


                 <!-- <a title="Import Data Excel" class="btn btn-success btn-sm" href="<?php echo site_url('Mustahik/form') ?>"><i class="glyphicon glyphicon-floppy-save"> Import</i></a>

                <a title="Export Data Excel" class="btn btn-danger btn-sm" href="<?php echo site_url('Mustahik/export') ?>"><i class="  glyphicon glyphicon-floppy-open"> Export</i></a> -->


                 <!-- <?php echo anchor('Mustahik/post','Tambah Data',array('class'=>'btn btn-primary btn-sm')) ?> -->
                <!--  <?php echo anchor('Muzakki/import',' Import',array('class'=>'btn btn-success btn-sm glyphicon glyphicon-floppy-save')) ?>

                 <?php echo anchor('Muzakki/export',' Export',array('class'=>'btn btn-danger btn-sm glyphicon glyphicon-floppy-open')) ?> -->
<?php endif ?>
            </div>

 <!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLongTitle" style="display: block; text-align: center;">Tambah Data Mustahik</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <?php echo form_open('Mustahik/post'); ?>

              <div class="input-group form-group">
              <span class="input-group-addon" id="sizing-addon2">
                <i class="glyphicon glyphicon-th-list"></i>
              </span>
              <input type="text" class="form-control" placeholder="Nomor Registrasi" name="no_registrasi" aria-describedby="sizing-addon2">
            </div>

            <div class="input-group form-group">
              <span class="input-group-addon" id="sizing-addon2">
                <i class="glyphicon glyphicon-calendar"> Tanggal Registrasi</i>
              </span>
              <input type="date" class="form-control" title="Tanggal Registrasi" name="tgl_registrasi" aria-describedby="sizing-addon2">
            </div>

              <div class="input-group form-group">
              <span class="input-group-addon" id="sizing-addon2">
                <i class="glyphicon glyphicon-user"></i>
              </span>
              <input type="text" class="form-control" placeholder="Nama" name="nama" aria-describedby="sizing-addon2">
            </div>

            <div class="input-group form-group">
              <span class="input-group-addon" id="sizing-addon2">
                <i class="glyphicon glyphicon-credit-card"></i>
              </span>
              <input type="number" class="form-control" placeholder="No.KTP" name="no_ktp" aria-describedby="sizing-addon2">
            </div>



            <div class="input-group form-group">
              <span class="input-group-addon" id="sizing-addon2">
                <i class="glyphicon glyphicon-calendar"> Tanggal Survey</i>
              </span>
              <input type="date" class="form-control" title ="Tanggal Survey" name="waktu_survey" aria-describedby="sizing-addon2">
            </div>

            <div class="input-group form-group">
            <span class="input-group-addon" id="sizing-addon2">
              <i class="glyphicon glyphicon-list"></i>
            </span>
            <select name="Asnaf" class="form-control select2" aria-describedby="sizing-addon2">

                <option disabled selected>Pilih Kategori Asnaf
                  <?php
                               $asnaf = $this->model_mustahik->getKatAsnaf();
                               foreach ($asnaf->result() as $row) {
                                 echo "<option value='".$row->nama_asnaf."'>".$row->nama_asnaf."</option>";
                               }

                                ?>

                </option>
            </select>
            </div>

            <!-- <div class="input-group form-group">
            <span class="input-group-addon" id="sizing-addon2">
              <i class="glyphicon glyphicon-th-list"></i>
            </span>
            <select name="Program" class="form-control select2" aria-describedby="sizing-addon2">

                <option disabled selected>Pilih Program
                              <?php
                               $program = $this->model_mustahik->getProDonasi();
                               foreach ($program->result() as $row) {
                                 echo "<option value='".$row->nama_program."'>".$row->nama_program."</option>";
                               }

                                ?>

                </option>
            </select>
            </div> -->

            <div class="input-group form-group">
              <span class="input-group-addon" id="sizing-addon2">
                <i class="glyphicon glyphicon-phone-alt"></i>
              </span>
              <input type="number" class="form-control" placeholder="No. HP" name="no_hp" aria-describedby="sizing-addon2">
            </div>

            <div class="input-group form-group">
              <span class="input-group-addon" id="sizing-addon2">
                <i class="glyphicon glyphicon-picture"></i>
              </span>
              <input type="text" class="form-control" placeholder="Tempat Lahir" name="tempat_lahir" aria-describedby="sizing-addon2">
            </div>

            <div class="input-group form-group">
              <span class="input-group-addon" id="sizing-addon2">
                <i class="glyphicon glyphicon-calendar"> Tanggal Lahir</i>
              </span>
              <input type="date" class="form-control" title="Tanggal Lahir" name="tgl_lahir" aria-describedby="sizing-addon2" id="birthdate">
            </div>

            <div class="input-group form-group">
              <span class="input-group-addon" id="sizing-addon2">
                <i class="glyphicon glyphicon-edit"></i>
              </span>
              <input type="text" class="form-control" placeholder="Usia" name="usia" aria-describedby="sizing-addon2" id="usia">
            </div>

            <div class="input-group form-group">
              <span class="input-group-addon" id="sizing-addon2">
                <i class="glyphicon glyphicon-map-marker"></i>
              </span>
              <input type="text" class="form-control" placeholder="Alamat" name="alamat" aria-describedby="sizing-addon2">
            </div>

            <div class="input-group form-group">
              <span class="input-group-addon" id="sizing-addon2">
                <i class="glyphicon glyphicon-education"></i>
              </span>
              <input type="text" class="form-control" placeholder="Pekerjaan" name="pekerjaan" aria-describedby="sizing-addon2">
            </div>

            <div class="input-group form-group">
              <span class="input-group-addon" id="sizing-addon2">
                <i class="glyphicon glyphicon-map-marker"></i>
              </span>
              <input type="text" class="form-control" placeholder="Latitude" name="latitude" aria-describedby="sizing-addon2">
            </div>

            <div class="input-group form-group">
              <span class="input-group-addon" id="sizing-addon2">
                <i class="glyphicon glyphicon-map-marker"></i>
              </span>
              <input type="text" class="form-control" placeholder="Longitude" name="longitude" aria-describedby="sizing-addon2">
            </div>

            <div class="input-group form-group">
              <span class="input-group-addon" id="sizing-addon2">
                <i class="glyphicon glyphicon-home"></i>
              </span>
              <input type="text" class="form-control" placeholder="RT/RW" name="rt_rw" aria-describedby="sizing-addon2">
            </div>

            <div class="input-group form-group">
            <span class="input-group-addon" id="sizing-addon2">
              <i class="glyphicon glyphicon-map-marker"></i>
            </span>
            <select name="kelurahan" class="form-control select2" aria-describedby="sizing-addon2">

                <option disabled selected>Pilih Kelurahan
                  <?php
                               $kelurahan = $this->model_mustahik->getKelurahan();
                               foreach ($kelurahan->result() as $row) {
                                 echo "<option value='".$row->nama_kel."'>".$row->nama_kel."</option>";
                               }

                                ?>

                </option>
            </select>
            </div>

            <div class="input-group form-group">
            <span class="input-group-addon" id="sizing-addon2">
              <i class="glyphicon glyphicon-tree-conifer"></i>
            </span>
            <select name="kecamatan" class="form-control select2" aria-describedby="sizing-addon2">

                <option disabled selected>Pilih Kecamatan
                  <?php
                               $kecamatan = $this->model_mustahik->getKecamatan();
                               foreach ($kecamatan->result() as $row) {
                                 echo "<option value='".$row->nama_kec."'>".$row->nama_kec."</option>";
                               }

                                ?>

                </option>
            </select>
            </div>


            <div class="input-group form-group">
              <span class="input-group-addon" id="sizing-addon2">
                <i class="glyphicon glyphicon-globe"></i>
              </span>
              <input type="text" class="form-control" placeholder="Masjid/Musholla Setempat" name="masjid_musholla" aria-describedby="sizing-addon2">
            </div>

            <div class="input-group form-group">
            <span class="input-group-addon" id="sizing-addon2">
              <i class="glyphicon glyphicon-tree-conifer"></i>
            </span>
            <select name="petugas_survey" class="form-control select2" aria-describedby="sizing-addon2">

                <option disabled selected>Pilih Petugas Survey
                  <?php
                               $petugas = $this->model_mustahik->getPetugas();
                               foreach ($petugas->result() as $row) {
                                 echo "<option value='".$row->nama_petugas."'>".$row->nama_petugas."</option>";
                               }

                                ?>

                </option>
            </select>
            </div>



            <div class="input-group form-group">
              <span class="input-group-addon" id="sizing-addon2">
                <i class="glyphicon glyphicon-calendar"> Tanggal Verifikasi</i>
              </span>
              <input type="date" class="form-control" title="Tanggal Verifikasi" name="tgl_verifikasi" aria-describedby="sizing-addon2">
            </div>



            <div class="input-group form-group">
              <span class="input-group-addon" id="sizing-addon2">
                <i class="glyphicon glyphicon-comment"></i>
              </span>
              <input type="text" class="form-control" placeholder="Keterangan" name="keterangan" aria-describedby="sizing-addon2">
            </div>

            </div>
      <div class="modal-footer">
        <button type="submit" class="form-control btn btn-primary" name="submit" class="glyphicon glyphicon-ok">Simpan</button>
      </div>
    </form>
    </div>
  </div>
</div>

<!-- END MODAL -->


            <div class="panel-body">
                <div class="table-responsive">
                    <table id="tabelMustahik" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>No. KTP</th>
                                <th>Alamat</th>
                                <th>Kelurahan</th>
                                <th>Kategori Asnaf</th>
                                <th>No. Hp</th>
                                <th>Status Persetujuan</th>


                                <th>Aksi</th>

                            </tr>
                        </thead>
                        <tbody>
                        <?php $no=1; foreach ($record->result() as $r) { ?>
                            <tr class="gradeU">
                               <td><?php echo $no?></td>
                               <td><?php echo $r->nama_mus?></td>
                               <td><?php echo $r->no_ktp?></td>
                               <td><?php echo $r->alamat_mus?></td>
                               <td><?php echo $r->kelurahan?></td>
                               <td><?php echo $r->kategori_asnaf?></td>
                               <td><?php echo $r->no_hp?></td>
                               <td><?php echo $r->status_persetujuan?></td>

                               <?php if ($this->session->userdata('level')=="pimpinan"){ ?>
                                 <td>
                                  <form action="<?php echo base_url() ?>Mustahik/verifikasi" method="POST">
                                  <input type="hidden" name="id" value="<?php echo $r->id_mustahik ?>">
                                 <button name="setuju" class="btn btn-success">Setujui</button>
                                 <button  name="tolak" class="btn btn-danger">Tolak</button>

                                <a title="Detail" class="btn btn-success btn-sm" href="<?php echo site_url('Mustahik/detail/'.$r->id_mustahik) ?>"><i class="glyphicon glyphicon-eye-open"></i></a>


                                </form>
                               </td>
                               <?php }else{ ?>



                                <td class="center">

<?php if ($this->session->userdata('level') != 'pimpinan'): ?>
                                <?php if ($r->status_persetujuan != "DITOLAK"): ?>
                                <?php if ($r->status_persetujuan != "BELUM DISETUJUI"): ?>

                                  <a title="Tambah Program" class="btn btn-primary btn-sm" href="<?php echo site_url('Mustahik/tambahProgram/'.$r->id_mustahik) ?>"><i class="glyphicon glyphicon-plus"></i></a>
                                <?php endif ?>
                                <?php endif ?>


                                    <a title="Edit" class="btn btn-warning btn-sm" href="<?php echo site_url('Mustahik/edit/'.$r->id_mustahik) ?>"><i class="glyphicon glyphicon-edit"></i></a>
<?php endif ?>


<?php if ($this->session->userdata('level') != 'pimpinan'): ?>

                                  <a title="Detail" class="btn btn-success btn-sm" href="<?php echo site_url('Mustahik/detail/'.$r->id_mustahik) ?>"><i class="glyphicon glyphicon-eye-open"></i></a>
                                    <a title="Hapus" class="btn btn-danger btn-sm" href="<?php echo site_url('Mustahik/delete/'.$r->id_mustahik) ?>"
                                       onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"> <i class="glyphicon glyphicon-trash"></i></a>
<?php endif?>
                                </td>
                                  <?php } ?>

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
$(document).ready(function() {
    $('#import_form').on('submit', function(event) {
      event.preventDefault();
      $.ajax({
        url : '<?php echo site_url("Mustahik/import");?>',
        method: "POST",
        data:new FormData(this),
        contentType: false,
        cache: false,
        processData:false,
        success:function(data,status){
          if (data.status!= status) {
            $('#file').val('');
            console.log(data);
            // window.location.reload();
          }
        }
      })
  });
  });
  $(document).ready(function(){
    $('#sukses-tambah').fadeOut(5000);
    // console.log($('#birthdate'));



    $('#birthdate').change(function(event){

      var times = new Date();


      var tahunSekarang = times.getFullYear();
      var bulanSekarang = times.getMonth();
      var tglLahir = $('#birthdate').val();
      var lahir = new Date(tglLahir);
      var bulanLahir = lahir.getMonth()+1;
      var tahunLahir  = lahir.getFullYear();

      var usia = tahunSekarang - tahunLahir;

      $('#usia').val(''+usia+' tahun');
    });

    $(function () {
      $(".select2").select();

      $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
        checkboxClass: 'icheckbox_flat-blue',
        radioClass: 'iradio_flat-blue'
      });
    });

    // data table
    $('#tabelMustahik').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    });

    // auto fil birthdate


  });
</script>

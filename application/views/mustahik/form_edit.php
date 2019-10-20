<div class="row">
    <div class="col-md-12">
        <h2 class="page-header">
            Edit Data <b><?php echo $record['nama_mus'];  ?></b> (Mustahik)
        </h2>
    </div>
</div>



<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default" style="padding: 15px;">
            <div class="panel-body">
                <?php echo form_open('Mustahik/edit'); ?>

              <!--  <div class="form-group">
                                    <label>Id Mustahik</label>
                                    <input type="text" readonly name="id_mustahik" class="form-control"  value="<?php echo $record['id_mustahik']?>">
                                </div> -->

                <div class="form-group">
                <label>No Registrasi</label>
                <input type="text" name="nomor" class="form-control" required value="<?php echo $record['no_registrasi']?>">

                 </div>

                 <div class="form-group">
                <label>Tanggal Registrasi</label>
                <input type="date" name="tgl_registrasi" class="form-control" required value="<?php echo $record['tgl_registrasi']?>">

                 </div>

                <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control" required value="<?php echo $record['nama_mus']?>">

                 </div>

                 <div class="form-group">
                 <label>Latitude</label>
                 <input type="text" name="latitude" class="form-control" required value="<?php echo $record['latitude']?>">

                  </div>

                  <div class="form-group">
                  <label>Longitude</label>
                  <input type="text" name="longitude" class="form-control" required value="<?php echo $record['longitude']?>">

                   </div>


                <div class="form-group">
                <label>No. KTP</label>
                <input type="number" name="no_ktp" class="form-control"  value="<?php echo $record['no_ktp']?>">

                 </div>

                 <div class="form-group">
                 <label>Alamat</label>
                 <input type="text" name="alamat" class="form-control"  value="<?php echo $record['alamat_mus']?>">

                  </div>

                  <div class="form-group">
                  <label>Waktu Survey</label>
                  <input type="date" name="waktu_survey" class="form-control"  value="<?php echo $record['waktu_survey']?>">

                   </div>

                   <div class="form-group">
                   <label>Kategori Asnaf</label>
                   <select class="form-control" name="Asnaf">
                        <option disabled selected>Pilih Kategori Asnaf</option>
                         <?php
                         $asnaf = $this->model_mustahik->getKatAsnaf();
                         foreach ($asnaf->result() as $row) {
                           echo "<option value='".$row->nama_asnaf."'>".$row->nama_asnaf."</option>";
                         }

                          ?>

                     </select>

                    </div>

                    <div class="form-group">
                    <label>Program</label>
                    <select class="form-control" name="Program">
                        <option disabled selected>Pilih Program</option>
                         <?php
                         $program = $this->model_mustahik->getProDonasi();
                         foreach ($program->result() as $row) {
                           echo "<option value='".$row->nama_program."'>".$row->nama_program."</option>";
                         }

                          ?>

                     </select>

                     </div>

                     <div class="form-group">
                     <label>No. HP</label>
                     <input type="text" name="no_hp" class="form-control"  value="<?php echo $record['no_hp']?>">

                      </div>



                    <div class="form-group">
                    <label>Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" class="form-control"  value="<?php echo $record['tempat_lahir']?>">

                    </div>

                    <div class="form-group">
                    <label>Tanggal Lahir</label>
                    <input type="date" name="tgl_lahir" class="form-control" id="birthdate" value="<?php echo $record['tgl_lahir']?>">

                    </div>

                    <div class="form-group">
                    <label>Usia</label>
                    <input type="text" name="usia" class="form-control" id="usia"  value="<?php echo $record['usia']?>">

                    </div>

                    <div class="form-group">
                    <label>Pekerjaan</label>
                    <input type="text" name="pekerjaan" class="form-control"  value="<?php echo $record['pekerjaan']?>">

                    </div>


                    <div class="form-group">
                    <label>RT/RW</label>
                    <input type="text" name="rt_rw" class="form-control"  value="<?php echo $record['rt_rw']?>">

                    </div>

                    <div class="form-group">
                        <label>Kelurahan</label>
                        <select class="form-control" name="Kelurahan">
                        <option disabled selected>Pilih Kelurahan</option>
                         <?php
                         $kelurahan = $this->model_mustahik->getKelurahan();
                         foreach ($kelurahan->result() as $row) {
                           echo "<option value='".$row->nama_kel."'>".$row->nama_kel."</option>";
                         }

                          ?>
                     </select>
                    </div>

                    <div class="form-group">
                        <label>Kecamatan</label>
                        <select class="form-control" name="Kecamatan">
                        <option disabled selected>Pilih Kecamatan</option>
                         <?php
                         $kecamatan = $this->model_mustahik->getKecamatan();
                         foreach ($kecamatan->result() as $row) {
                           echo "<option value='".$row->nama_kec."'>".$row->nama_kec."</option>";
                         }

                          ?>
                     </select>
                    </div>

                    <div class="form-group">
                    <label>Masjid/Musholla Setempat</label>
                    <input type="text" name="masjid_musholla" class="form-control"  value="<?php echo $record['masjid_musholla']?>">

                    </div>


                    <div class="form-group">
                        <label>Petugas Survey</label>
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

                    <div class="form-group">
                    <label>Tanggal Verifikasi</label>
                    <input type="date" name="tgl_verifikasi" class="form-control"  value="<?php echo $record['tgl_verifikasi']?>">

                    </div>

                    <div class="form-group">
                    <label>Tanggal Persetujuan</label>
                    <input type="date" name="tgl_persetujuan" class="form-control"  value="<?php echo $record['tgl_persetujuan']?>">

                    </div>



                    <div class="form-group">
                    <label>Keterangan</label>
                    <input type="text" name="keterangan" class="form-control"  value="<?php echo $record['keterangan']?>">

                    </div>


                <button type="submit" name="submit" class="btn btn-primary btn-sm">Update</button> |
                <?php echo anchor('Mustahik','Kembali',array('class'=>'btn btn-danger btn-sm'))?>
                </form>
            </div>
        </div>
        <!-- /. PANEL  -->
    </div>
</div>
<!-- /. ROW  -->

<script src="<?php echo base_url() ?>assets/js/jquery.js" charset="utf-8"></script>
<script type="text/javascript">
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

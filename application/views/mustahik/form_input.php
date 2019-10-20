<div class="row">
    <div class="col-md-12">
        <h2 class="page-header">
            Tambah Data Mustahik
        </h2>
    </div>
</div>
<!-- /. ROW  -->

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default" style="padding: 15px;">
            <div class="panel-body">
                <?php echo form_open('Mustahik/post'); ?>



<div class="form-group">
<label>Nama</label>
<input type="text" name="nama" class="form-control" required>

 </div>

 <div class="form-group">
 <label>No. KTP</label>
 <input type="number" name="no_ktp" class="form-control" required>

  </div>


<div class="form-group">
<label>Alamat</label>
<input type="text" name="alamat" class="form-control" required>

 </div>

 <div class="form-group">
 <label>Waktu Survey</label>
 <input type="date" name="waktu_survey" class="form-control" required>

  </div>

  <div class="form-group">
  <label>Kategori Asnaf</label>
  <!-- <input type="text" name="kategori_asnaf" class="form-control" required> -->
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
   <!-- <input type="text" name="program" class="form-control" required> -->
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
    <input type="number" name="no_hp" class="form-control" required>

     </div>

    <div class="form-group">
    <label>No. Registrasi</label>
    <input type="text" name="no_registrasi" class="form-control" required>

    </div>

    <div class="form-group">
    <label>Tanggal Registrasi</label>
    <input type="date" name="tgl_registrasi" class="form-control" required>

    </div>

    <div class="form-group">
    <label>Tempat Lahir</label>
    <input type="text" name="tempat_lahir" class="form-control" required>

    </div>

    <div class="form-group">
    <label>Tanggal Lahir</label>
    <input type="date" name="tgl_lahir" class="form-control" required>

    </div>

    <div class="form-group">
    <label>Usia</label>
    <input type="number" name="usia" class="form-control" required>

    </div>

    <!-- <div class="form-group">
    <label>Latitude</label>
    <input type="text" name="latitude" class="form-control" required>

    </div>

    <div class="form-group">
    <label>Longitude</label>
    <input type="text" name="longitude" class="form-control" required>

    </div> -->

    <div class="form-group">
    <label>Pekerjaan</label>
    <input type="text" name="pekerjaan" class="form-control" required>

    </div>

    <!-- <div class="form-group">
    <label>Dokumentasi</label>
    <input type="text" name="dokumentasi" class="form-control" required>

    </div> -->

    <div class="form-group">
    <label>Titik Koordinat Google Maps (Longitude)</label>
    <input type="text" name="longitude" class="form-control" required>

    </div>

    <div class="form-group">
    <label>Titik Koordinat Google Maps (Intitude)</label>
    <input type="text" name="intitude" class="form-control" required>

    </div>

    <div class="form-group">
    <label>RT/RW</label>
    <input type="text" name="rt_rw" class="form-control" required>

    </div>

    <div class="form-group">
      <label>Kelurahan</label>
      <!-- <input type="text" name="kategori_asnaf" class="form-control" required> -->
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
      <!-- <input type="text" name="kategori_asnaf" class="form-control" required> -->
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
    <input type="text" name="masjid_musholla" class="form-control" required>

    </div>

    <div class="form-group">
    <label>Surveyor</label>
    <input type="text" name="surveyor" class="form-control" required>

    </div>

    <div class="form-group">
    <label>Tanggal Verifikasi</label>
    <input type="date" name="tgl_verifikasi" class="form-control" required>

    </div>

    <div class="form-group">
    <label>Tanggal Persetujuan</label>
    <input type="date" name="tgl_persetujuan" class="form-control" required>

    </div>

    <div class="form-group">
    <label>Status Persetujuan </label>
    <input type="text" name="status_persetujuan" class="form-control" required>

    </div>

    <div class="form-group">
    <label>Tanggal Penyaluran</label>
    <input type="date" name="tgl_penyaluran" class="form-control" required>

    </div>

    <div class="form-group">
    <label>Penyalur</label>
    <input type="text" name="penyalur" class="form-control" required>

    </div>

    <div class="form-group">
    <label>Keterangan</label>
    <input type="text" name="keterangan" class="form-control" required>

    </div>







                <button type="submit" name="submit" class="btn btn-primary btn-sm">Simpan</button> |
                <?php echo anchor('Mustahik','Kembali',array('class'=>'btn btn-danger btn-sm'))?>
                </form>
            </div>
        </div>
        <!-- /. PANEL  -->
    </div>
</div>
<!-- /. ROW  -->

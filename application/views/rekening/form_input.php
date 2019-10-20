<div class="row">
    <div class="col-md-12">
        <h2 class="page-header">
            Tambah Data Rekening
        </h2>
    </div>
</div>
<!-- /. ROW  -->

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default" style="padding: 15px;">
            <div class="panel-body">
                <?php echo form_open('Rekening/post'); ?>



<div class="form-group">
<label>Nama Bank</label>
<input type="text" name="nama_bank" class="form-control" required>

 </div>

 <div class="form-group">
 <label>Nomor Rekening</label>
 <input type="text" name="no_rek" class="form-control" required>

  </div>

  <div class="form-group">
  <label>Saldo</label>
  <input type="number" name="saldo" class="form-control" required>

   </div>

   <div class="form-group">
   <label>Tanggal Aktivasi</label>
   <input type="date" name="tgl_aktivasi" class="form-control" required>

    </div>

                <button type="submit" name="submit" class="btn btn-primary btn-sm">Simpan</button> |
                <?php echo anchor('Rekening','Kembali',array('class'=>'btn btn-danger btn-sm'))?>
                </form>
            </div>
        </div>
        <!-- /. PANEL  -->
    </div>
</div>
<!-- /. ROW  -->

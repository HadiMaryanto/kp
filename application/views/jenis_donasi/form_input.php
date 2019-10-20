<div class="row">
    <div class="col-md-12">
        <h2 class="page-header">
            Tambah Data Jenis Donasi
        </h2>
    </div>
</div>
<!-- /. ROW  -->

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default" style="padding: 15px;">
            <div class="panel-body">
                <?php echo form_open('Jenis_Donasi/post'); ?>



<div class="form-group">
<label>Jenis Donasi</label>
<input type="text" name="jenis_donasi" class="form-control" required>

 </div>

                <button type="submit" name="submit" class="btn btn-primary btn-sm">Simpan</button> |
                <?php echo anchor('Jenis_Donasi','Kembali',array('class'=>'btn btn-danger btn-sm'))?>
                </form>
            </div>
        </div>
        <!-- /. PANEL  -->
    </div>
</div>
<!-- /. ROW  -->

<div class="row">
    <div class="col-md-12">
        <h2 class="page-header">
            Tambah Data Asnaf
        </h2>
    </div>
</div>
<!-- /. ROW  -->

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default" style="padding: 15px;">
            <div class="panel-body">
                <?php echo form_open('Asnaf/post'); ?>



<div class="form-group">
<label>Kategori Asnaf</label>
<input type="text" name="nama_asnaf" class="form-control" required>

 </div>

                <button type="submit" name="submit" class="btn btn-primary btn-sm">Simpan</button> |
                <?php echo anchor('Asnaf','Kembali',array('class'=>'btn btn-danger btn-sm'))?>
                </form>
            </div>
        </div>
        <!-- /. PANEL  -->
    </div>
</div>
<!-- /. ROW  -->

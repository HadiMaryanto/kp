<div class="row">
    <div class="col-md-12">
        <h2 class="page-header">
            Tambah Data Program
        </h2>
    </div>
</div>
<!-- /. ROW  -->

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default" style="padding: 15px;">
            <div class="panel-body">
                <?php echo form_open('Program/post'); ?>



                <div class="form-group">
                    <label>Nama Program</label>
                    <input type="text" name="nama_program" class="form-control" required>

                 </div>
                 <div class="form-group">
                    <label for="exampleFormControlSelect1">Jenis Program</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="jenis_program">
                      <option>kemanusiaan</option>
                      <option>kesehatan</option>
                      <option>ekonomi</option>
                      <option>pendidikan</option>
                      <option>dakwah</option>
                    </select>
                  </div>

                <button type="submit" name="submit" class="btn btn-primary btn-sm">Simpan</button> |
                <?php echo anchor('Program','Kembali',array('class'=>'btn btn-danger btn-sm'))?>
                </form>
            </div>
        </div>
        <!-- /. PANEL  -->
    </div>
</div>
<!-- /. ROW  -->

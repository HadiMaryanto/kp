<div class="row">
    <div class="col-md-12">
        <h2 class="page-header">
            Edit Data Petugas
        </h2>
    </div>
</div>



<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default" style="padding: 15px;">
            <div class="panel-body">
                <?php echo form_open('Petugas/edit'); ?>

               <div class="form-group">
                                    <label>Id Petugas</label>
                                    <input type="text" readonly name="id_petugas" class="form-control"  value="<?php echo $record['id_petugas']?>">
                                </div>

                <div class="form-group">
                <label>Nama Petugas</label>
                <input type="text" name="nama_petugas" class="form-control" required value="<?php echo $record['nama_petugas']?>">

                 </div>

                 <div class="form-group">
                <label>Jabatan</label>
                <input type="text" name="jabatan" class="form-control" required value="<?php echo $record['jabatan']?>">

                 </div>


                 
                <button type="submit" name="submit" class="btn btn-primary btn-sm">Update</button> |
                <?php echo anchor('Petugas','Kembali',array('class'=>'btn btn-danger btn-sm'))?>
                </form>
            </div>
        </div>
        <!-- /. PANEL  -->
    </div>
</div>
<!-- /. ROW  -->

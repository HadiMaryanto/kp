<div class="row">
    <div class="col-md-12">
        <h2 class="page-header">
            Edit Kelurahan
        </h2>
    </div>
</div>



<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default" style="padding: 15px;">
            <div class="panel-body">
                <?php echo form_open('Kelurahan/edit'); ?>

               <div class="form-group">
                                    <label>Id Kelurahan</label>
                                    <input type="text" readonly name="id_kel" class="form-control"  value="<?php echo $record['id_kel']?>">
                                </div>

                <div class="form-group">
                <label>Nama Kelurahan</label>
                <input type="text" name="nama_kel" class="form-control" required value="<?php echo $record['nama_kel']?>">

                 </div>

                <button type="submit" name="submit" class="btn btn-primary btn-sm">Update</button> |
                <?php echo anchor('Kelurahan','Kembali',array('class'=>'btn btn-danger btn-sm'))?>
                </form>
            </div>
        </div>
        <!-- /. PANEL  -->
    </div>
</div>
<!-- /. ROW  -->

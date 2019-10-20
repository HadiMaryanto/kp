<div class="row">
    <div class="col-md-12">
        <h2 class="page-header">
            Edit Cara Donasi
        </h2>
    </div>
</div>



<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default" style="padding: 15px;">
            <div class="panel-body">
                <?php echo form_open('Cara_Donasi/edit'); ?>

               <div class="form-group">
                                    <label>Id Cara Donasi</label>
                                    <input type="text" readonly name="id_cara" class="form-control"  value="<?php echo $record['id_cara']?>">
                                </div>

                <div class="form-group">
                <label>Cara Donasi</label>
                <input type="text" name="cara_donasi" class="form-control" required value="<?php echo $record['cara_donasi']?>">

                 </div>

                <button type="submit" name="submit" class="btn btn-primary btn-sm">Update</button> |
                <?php echo anchor('Cara_Donasi','Kembali',array('class'=>'btn btn-danger btn-sm'))?>
                </form>
            </div>
        </div>
        <!-- /. PANEL  -->
    </div>
</div>
<!-- /. ROW  -->

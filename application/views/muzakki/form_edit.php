<div class="row">
    <div class="col-md-12">
        <h2 class="page-header">
            Edit Data <b><?php echo $record['nama_muz'];  ?></b> (Muzakki)
        </h2>
    </div>
</div>



<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default" style="padding: 15px;">
            <div class="panel-body">
                <?php echo form_open('Muzakki/edit'); ?>

               <!-- <div class="form-group">
                                    <label>Id Muzakki</label>
                                    <input type="text" readonly name="id_muzakki" class="form-control"  value="<?php echo $record['id_muzakki']?>">
                                </div> -->

                <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama_muz" class="form-control" required value="<?php echo $record['nama_muz']?>">

                 </div>


                <div class="form-group">
                <label>Alamat</label>
                <input type="text" name="alamat_muz" class="form-control"  value="<?php echo $record['alamat_muz']?>">

                 </div>

                 <div class="form-group">
                 <label>No. HP</label>
                 <input type="text" name="no_hp" class="form-control"  value="<?php echo $record['no_hp']?>">

                  </div>

                   <div class="form-group">
                   <label>Email</label>
                   <input type="text" name="email" class="form-control"  value="<?php echo $record['email']?>">

                    </div>

                    <div class="form-group">
                    <label>No. NPWP</label>
                    <input type="text" name="no_npwp" class="form-control"  value="<?php echo $record['no_npwp']?>">

                     </div>


                <button type="submit" name="submit" class="btn btn-primary btn-sm">Update</button> |
                <?php echo anchor('Muzakki','Kembali',array('class'=>'btn btn-danger btn-sm'))?>
                </form>
            </div>
        </div>
        <!-- /. PANEL  -->
    </div>
</div>
<!-- /. ROW  -->

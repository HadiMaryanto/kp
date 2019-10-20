<div class="row">
    <div class="col-md-12">
        <h2 class="page-header">
            Edit Data Pengguna
        </h2>
    </div>
</div>



<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default" style="padding: 15px;">
            <div class="panel-body">
                <?php echo form_open('Pengguna/edit'); ?>

               <div class="form-group">
                                    <label>Id Pengguna</label>
                                    <input type="text" readonly name="id_user" class="form-control"  value="<?php echo $record['id_user']?>">
                                </div>

                <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control" required value="<?php echo $record['username']?>">

                 </div>

                <div class="form-group">
                <label>Password</label>
                <input type="text" name="password" class="form-control" required value="<?php echo $record['password']?>">

                 </div>

                 <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" name="nama_lengkap" class="form-control" required value="<?php echo $record['nama_lengkap']?>">

                 </div>


                 
                <button type="submit" name="submit" class="btn btn-primary btn-sm">Update</button> |
                <?php echo anchor('Pengguna','Kembali',array('class'=>'btn btn-danger btn-sm'))?>
                </form>
            </div>
        </div>
        <!-- /. PANEL  -->
    </div>
</div>
<!-- /. ROW  -->

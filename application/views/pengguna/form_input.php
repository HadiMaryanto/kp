<div class="row">
    <div class="col-md-12">
        <h2 class="page-header">
            Tambah Data Pengguna
        </h2>
    </div>
</div>
<!-- /. ROW  -->

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default" style="padding: 15px;">
            <div class="panel-body">
                <?php echo form_open('Pengguna/post'); ?>



                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" required>

                 </div>

                 <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" required>

                 </div>

                 <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" class="form-control" required>

                 </div>

                 <!-- <div class="form-group">
                    <label>Level</label>
                    <input type="text" name="level" class="form-control" required>

                 </div> -->

                <div class="input-group form-group" style="display: inline-block;">
                <span class="input-group-addon" id="sizing-addon2">
                <i class="glyphicon glyphicon-tag"> <b>Level</b></i>
                </span>
                <span class="input-group-addon">
                    <input type="radio" name="level" value="1" id="pimpinan" class="minimal">
                    <label for="pimpinan">pimpinan</label>
                </span>
                <span class="input-group-addon">
                  <input type="radio" name="level" value="2" id="administrasi" class="minimal"> 
                  <label for="administrasi">administrasi</label>
                </span>
            </div>
<!-- 
            <div class="input-group form-group">
              <span class="input-group-addon" id="sizing-addon2">
                <i class="glyphicon glyphicon-pushpin"></i>
              </span>
              <input type="text" class="form-control" placeholder="Level" name="level" aria-describedby="sizing-addon2">
            </div> -->
                 
                <button type="submit" name="submit" class="btn btn-primary btn-sm">Simpan</button> |
                <?php echo anchor('Pengguna','Kembali',array('class'=>'btn btn-danger btn-sm'))?>
                </form>
            </div>
        </div>
        <!-- /. PANEL  -->
    </div>
</div> 
<!-- /. ROW  -->
<!-- $(function () {
      $(".select2").select();

      $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
        checkboxClass: 'icheckbox_flat-blue',
        radioClass: 'iradio_flat-blue'
      }); -->
<div class="row">
    <div class="col-md-12">
        <h2 class="page-header">
            Tambah Program Muzakki
        </h2>
    </div>
</div>
<!-- /. ROW  -->

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default" style="padding: 15px;">
            <div class="panel-body">
                <?php echo form_open('Muzakki/tambahProgram/'.$muzakki['id_muzakki']); ?>



                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control" readonly value="<?php echo $muzakki['nama_muz'] ?>">

                 </div>

                 <div class="form-group">
                     <label>ALamat</label>
                     <input type="text" name="alamat" class="form-control" readonly value="<?php echo $muzakki['alamat_muz'] ?>" >

                  </div>

                  <div class="form-group">
                     <label for="exampleFormControlSelect1">Program</label>
                     <select class="form-control" id="exampleFormControlSelect1" name="id_program">
                       <?php foreach ($program->result() as $row): ?>
                            <option value="<?php echo $row->id_program ?>"><?php echo $row->nama_program ?></option>
                        <?php endforeach; ?>
                     </select>
                   </div>

                   <div class="form-group">
                       <label>Bulan</label>
                       <input type="date" name="bulan" class="form-control"  value="<?php echo $muzakki['bulan'] ?>" >
                    </div>

                    <div class="form-group">
                        <label>Jumlah</label>
                        <input type="number" name="jumlah" class="form-control"  value="<?php echo $muzakki['jumlah'] ?>" placeholder="input hanya angka">
                     </div>

                    <div class="form-group">
                     <label for="exampleFormControlSelect1">Rekening</label>
                     <select class="form-control" id="exampleFormControlSelect1" name="id_rek">
                       <?php foreach ($rekening->result() as $row): ?>
                            <option value="<?php echo $row->id_rek ?>"><?php echo $row->nama_bank ?></option>
                        <?php endforeach; ?>
                     </select>
                   </div>



                <button type="submit" name="program" class="btn btn-primary btn-sm">Tambah</button> |
                <?php echo anchor('Mustahik','Kembali',array('class'=>'btn btn-danger btn-sm'))?>
                </form>
            </div>
        </div>
        <!-- /. PANEL  -->
    </div>
</div>
<!-- /. ROW  -->

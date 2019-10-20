<div class="row">
    <div class="col-md-12">
        <h2 class="page-header">
            Tambah Program Mustahik
        </h2>
    </div>
</div>
<!-- /. ROW  -->

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default" style="padding: 15px;">
            <div class="panel-body">
                <?php echo form_open('Mustahik/tambahProgram/'.$mustahik['id_mustahik']); ?>



                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control" readonly value="<?php echo $mustahik['nama_mus'] ?>">

                 </div>

                 <div class="form-group">
                     <label>Alamat</label>
                     <input type="text" name="alamat" class="form-control" readonly value="<?php echo $mustahik['alamat_mus'] ?>" >

                  </div>

                  <div class="form-group">
                     <label for="exampleFormControlSelect1">Program</label>
                     <select class="form-control" id="exampleFormControlSelect1" name="id_program">
                        <option disabled selected>Pilih Program</option>
                        <?php foreach ($program->result() as $row): ?>
                            <option value="<?php echo $row->id_program ?>"><?php echo $row->nama_program ?></option>
                        <?php endforeach; ?>
                     </select>
                   </div>

                   <div class="form-group">
                     <label for="exampleFormControlSelect1">Rekening</label>
                     <select class="form-control" id="exampleFormControlSelect1" name="id_rek">
                        <option disabled selected>Pilih Rekening</option>
                        <?php foreach ($rekening->result() as $row): ?>
                            <option value="<?php echo $row->id_rek ?>"><?php echo $row->nama_bank ?></option>
                        <?php endforeach; ?>
                     </select>
                   </div>

                    <div class="form-group">
                       <label>Tanggal Transaksi</label>
                       <input type="date" name="bulan" class="form-control" >
                    </div>

                    <div class="form-group">
                     <label for="exampleFormControlSelect1">Penyalur</label>
                     <select class="form-control" id="exampleFormControlSelect1" name="id_petugas">
                        <option disabled selected>Pilih Penyalur</option>
                        <?php foreach ($petugas->result() as $row): ?>
                            <option value="<?php echo $row->id_petugas ?>"><?php echo $row->nama_petugas ?></option>
                        <?php endforeach; ?> 
                     </select>
                   </div>


                    <div class="form-group">
                        <label>Jumlah</label>
                        <input type="number" name="jumlah" class="form-control"  placeholder="Masukkakn Jumlah Uang">
                     </div>



                <button type="submit" name="program" class="btn btn-primary btn-sm">Tambah</button> |
                <?php echo anchor('Muzakki','Kembali',array('class'=>'btn btn-danger btn-sm'))?>
                </form>
            </div>
        </div>
        <!-- /. PANEL  -->
    </div>
</div>
<!-- /. ROW  -->

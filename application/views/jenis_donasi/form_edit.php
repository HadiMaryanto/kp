<div class="row">
    <div class="col-md-12">
        <h2 class="page-header">
            Edit Bank
        </h2>
    </div>
</div>



<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default" style="padding: 15px;">
            <div class="panel-body">
                <?php echo form_open('Jenis_Donasi/edit'); ?>

               <div class="form-group">
                                    <label>Id Jenis</label>
                                    <input type="text" readonly name="id_jenis" class="form-control"  value="<?php echo $record['id_jenis']?>">
                                </div>

                <div class="form-group">
                <label>Jenis Donasi</label>
                <input type="text" name="jenis_donasi" class="form-control" required value="<?php echo $record['jenis_donasi']?>">

                 </div>


                 <!-- <div class="form-group">
                <label>Jenis Bahan</label>
                <select class="form-control" name="jenis_bahan" value="<?php echo $record['jenis_bahan']?>">
                    <option>Nama</option>
                    <option>Alamat</option>
                    <option>No HP</option>
                    <option>Cara Donasi</option>
                    <option>Email</option>
                    <option>No. NPWP</option>
                    <option>Program Donasi</option>
                    <option>Tanggal Transaksi</option>
                    <option>Jenis Donasi</option>

                </select>
                 </div> -->


                 <!-- <div class="form-group">
                <label>Penerbit</label>
                <input type="text" name="penerbit" class="form-control"  value="<?php echo $record['penerbit']?>">

                 </div>
                 <div class="form-group">
                <label>Ketersediaan</label>
                <input type="text" name="ketersediaan" class="form-control"  value="<?php echo $record['ketersediaan']?>">

                 </div>
                 <div class="form-group">
                <label>ISBN</label>
                <input type="text" name="isbn" class="form-control"  value="<?php echo $record['isbn']?>">

                 </div>
                 <div class="form-group">
                <label>ISSN</label>
                <input type="text" name="issn" class="form-control" value="<?php echo $record['issn']?>">

                 </div>
                 <div class="form-group">
                <label>Edisi</label>
                <input type="text" name="edisi" class="form-control"  value="<?php echo $record['edisi']?>">

                 </div>
                 <div class="form-group">
                <label>Dekripsi fisik</label>
                <input type="text" name="dekripsi_fisik" class="form-control"  value="<?php echo $record['dekripsi_fisik']?>">

                 </div>

                 <div class="form-group">
                <label>Target Pembaca</label>
                <input type="text" name="target_pembaca" class="form-control"  value="<?php echo $record['target_pembaca']?>">

                 </div>
                 <div class="form-group">
                <label>Bahasa</label>
                <input type="text" name="bahasa" class="form-control"  value="<?php echo $record['bahasa']?>">

                 </div>
                 <div class="form-group">
                <label>Subjek</label>
                <input type="text" name="subjek" class="form-control" value="<?php echo $record['subjek']?>">

                 </div>
                 <div class="form-group">
                <label>Catatan</label>
                <textarea name="catatan" class="form-control" ><?php echo $record['catatan']?></textarea>

                 </div>
                 <div class="form-group">
                <label>Rak</label>
                <input type="text" name="rak" class="form-control"  value="<?php echo $record['rak']?>">

                 </div> -->


                <button type="submit" name="submit" class="btn btn-primary btn-sm">Update</button> |
                <?php echo anchor('Jenis_Donasi','Kembali',array('class'=>'btn btn-danger btn-sm'))?>
                </form>
            </div>
        </div>
        <!-- /. PANEL  -->
    </div>
</div>
<!-- /. ROW  -->

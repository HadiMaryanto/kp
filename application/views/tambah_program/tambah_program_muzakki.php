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
                     <label>Alamat</label>
                     <input type="text" name="alamat" class="form-control" readonly value="<?php echo $muzakki['alamat_muz'] ?>" >

                  </div>

                  <div class="form-group">
                     <label for="exampleFormControlSelect1">Cara Donasi</label>
                     <select class="form-control" id="exampleFormControlSelect1" name="id_cara">
                          <option value="pilih">Pilih Cara Donasi</option>
                       <?php foreach ($cara_donasi->result() as $row): ?>
                            <option value="<?php echo $row->id_cara ?>"><?php echo $row->cara_donasi ?></option>
                        <?php endforeach; ?>
                     </select>
                   </div>
                  <!-- <div class="form-group">
                     <label for="exampleFormControlSelect1">Cara Donasi</label>
                     <select class="form-control" id="exampleFormControlSelect1" name="id_cara">
                       <?php foreach ($cara_donasi->result() as $row): ?>
                            <option value="<?php echo $row->id_cara ?>"><?php echo $row->cara_donasi ?></option>
                        <?php endforeach; ?>
                     </select>
                   </div>
 -->
                   <div class="form-group">
                     <label for="exampleFormControlSelect1">Program</label>
                     <select class="form-control" id="exampleFormControlSelect1" name="id_program">
                          <option value="pilih">Pilih Program</option>
                       <?php foreach ($program->result() as $row): ?>
                            <option value="<?php echo $row->id_program ?>"><?php echo $row->nama_program ?></option>
                        <?php endforeach; ?>
                     </select>
                   </div>


                  <!-- <div class="form-group">
                     <label for="exampleFormControlSelect1">Program</label>
                     <select class="form-control" id="exampleFormControlSelect1" name="id_program">
                       <?php foreach ($program->result() as $row): ?>
                            <option value="<?php echo $row->id_program ?>"><?php echo $row->nama_program ?></option>
                        <?php endforeach; ?>
                     </select>
                   </div> -->

                   <div class="form-group">
                     <label for="exampleFormControlSelect1">Jenis Donasi</label>
                     <select class="form-control" id="exampleFormControlSelect1" name="id_jenis">
                          <option value="pilih">Pilih Jenis Donasi</option>
                       <?php foreach ($jenis_donasi->result() as $row): ?>
                            <option value="<?php echo $row->id_jenis ?>"><?php echo $row->jenis_donasi ?></option>
                        <?php endforeach; ?>
                     </select>
                   </div>

                   <!-- <div class="form-group">
                     <label for="exampleFormControlSelect1">Jenis Donasi</label>
                     <select class="form-control" id="exampleFormControlSelect1" name="id_jenis">
                       <?php foreach ($jenis_donasi->result() as $row): ?>
                            <option value="<?php echo $row->id_jenis ?>"><?php echo $row->jenis_donasi ?></option>
                        <?php endforeach; ?>
                     </select>
                   </div> -->

                    <div class="form-group">
                       <label>Tanggal Transaksi</label>
                       <input type="date" name="tgl_transaksi" class="form-control" >
                    </div>

                  <div class="form-group">
                     <label for="exampleFormControlSelect1">Rekening</label>
                     <select class="form-control" id="exampleFormControlSelect1" name="id_rek">
                          <option value="pilih">pilih rekening</option>
                       <?php foreach ($rekening->result() as $row): ?>
                            <option value="<?php echo $row->id_rek ?>"><?php echo $row->nama_bank ?></option>
                        <?php endforeach; ?>
                     </select>
                   </div>


                    <div class="form-group">
                        
                        <label>Jumlah Uang</label>
                        <input type="number" name="jumlah" class="form-control"  placeholder="Masukkan Jumlah Uang" id="uang" >
                        
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
<script src="<?php echo base_url() ?>assets/bower_components/jquery/dist/jquery.min.js" charset="utf-8"></script>
<script src="<?php echo base_url() ?>assets/bower_components/jquery/dist/jquery.mask.min.js" charset="utf-8"></script>
<script type="text/javascript">
$(document).ready(function(){

                // Format mata uang.
                $( '.uang' ).mask('000.000.000', {reverse: true});

            })
</script>

<script src="<?php echo base_url() ?>assets/js/jquery.js" charset="utf-8"></script>
<script type="text/javascript">
  $(document).ready(function(){
    var jumlah = $('.jumlah').text();
    var td  = $('.jumlah');

    for (var i = 0; i < td.length; i++) {
      // var nilai = td[i];
      td[i].innerHTML = "Rp "+td[i].innerText.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
    }

    // var 


    // console.log(hasil);
    // $('#sukses-tambah').fadeOut(600);
  });
</script>
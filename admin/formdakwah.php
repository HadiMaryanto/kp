<div class="container-fluid">
    <div class="row">
        <div class="col-md-4 col-sm-3">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title"><span class="glyphicon glyphicon-list-alt"></span> Form program Dakwah</h3>
              </div>
              <div class="panel-body">
                  <form action="#">
                    <div class="form-group">
                      <label for="program">Program</label>
                      <input type="text" class="form-control" id="program" placeholder="">
                      <input type="hidden" name="id_dakwah" id="id_dakwah" value="">
                    </div>
                      <div class="form-group">
                        <label for="namapenerima">Nama</label>
                        <input type="text" class="form-control" id="namapenerima" placeholder="">
                      </div>
                      <div class="form-group">
                        <label for="jenis">Jenis</label>
                        <select class="form-control" id="jenis">
                          <option value="">pilih</option>
                          <option value="dai bina umat">dai bina umat</option>
                          <option value="mualaf terbina">mualaf terbina</option>
                          <option value="edukasi zakat">edukasi zakat</option>
                          <option value="kado utk yatim">kado utk yatim</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="tglbinaan">Tgl Binaan</label>
                        <input type="date" class="form-control" id="tglbinaan" placeholder="">
                      </div>
                      <div class="form-group">
                        <label for="foto">foto</label>
                        <input type="text" class="form-control" id="foto" placeholder="">
                      </div>
                      <div class="form-group">
                        <label for="keterangan">Alamat</label>
                        <textarea name="keterangan" class="form-control" id="alamat"></textarea>
                      </div>
                      <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <textarea name="keterangan" class="form-control" id="keterangan"></textarea>
                      </div>
                      <div class="form-group">
                        <button type="button" name="simpandakwah" id="simpandakwah" class="btn btn-primary">Simpan</button>
                        <button type="button" name="resetdakwah"  id="resetdakwah" class="btn btn-warning">Reset</button>
                        <button type="button" name="updatedakwah" id="updatedakwah" class="btn btn-info" disabled="true">Update</button>
                      </div>
                  </form>
          </div>
        </div>
    </div>
    <div class="col-md-8 col-sm-8">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title"><span class="glyphicon glyphicon-list"></span> Daftar program Dakwah</h3>
        </div>
        <div class="panel-body">
          <table class="table table-bordered">
            <th>No</th>
            <th>Program</th>
            <th>Nama Penerima</th>
            <th>Jenis</th>
            <th>Tgl Binaan</th>
            <th>Foto</th>
            <th>Alamat</th>
            <th>Keterangan</th>
            <th></th>
            <tbody id="daftardakwah">
              <?php
              $no = 1;
              foreach ($itemdakwah->result() as $dakwah) {
                ?>
                <tr>
                  <td><?php echo $no;?></td>
                  <td><?php echo $dakwah->program;?></td>
                  <td><?php echo $dakwah->namapenerima;?></td>
                  <td><?php echo $dakwah->jenis;?></td>
                  <td><?php echo $dakwah->tglbinaan;?></td>
                  <td><?php echo $dakwah->foto;?></td>
                  <td><?php echo $dakwah->alamat;?></td>
                  <td><?php echo $dakwah->keterangan;?></td>
                  <td>
                    <button type="button" class="btn btn-sm btn-info" data-iddakwah="<?php echo $dakwah->id_dakwah;?>" name="editdakwah" id="editdakwah"><span class="glyphicon glyphicon-edit"></span></button>
                    <button type="button" class="btn btn-sm btn-danger" data-iddakwah="<?php echo $dakwah->id_dakwah;?>" name="deletedakwah" id="deletedakwah"><span class="glyphicon glyphicon-trash"></span></button>
                  </td>
                </tr>
                <?php
                $no++;
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
    $(document).on('click','#simpandakwah',simpandakwah)
    .on('click','#resetdakwah',resetdakwah)
    .on('click','#updatedakwah',updatedakwah)
    .on('click','#editdakwah',editdakwah)
    .on('click','#deletedakwah',deletedakwah);
    function simpandakwah() {//simpan jalan
        var datadakwah = {'program':$('#program').val(),
        'namapenerima':$('#namapenerima').val(),
        'jenis':$('#jenis').val(),
        'tglbinaan':$('#tglbinaan').val(),
        'foto':$('#foto').val(),
        'alamat':$('#alamat').val(),
        'keterangan':$('#keterangan').val()};console.log(datadakwah);
        $.ajax({
            url : '<?php echo site_url("admin/dakwah/create");?>',
            data : datadakwah,
            dataType : 'json',
            type : 'POST',
            success : function(data,status){
                if (data.status!='error') {
                    $('#daftardakwah').load('<?php echo current_url()." #daftardakwah > *";?>');
                    resetjalan();//form langsung dikosongkan pas selesai input data
                }else{
                    alert(data.msg);
                }
            },
            error : function(x,t,m){
                alert(x.responseText);
            }
        })
    }
    function resetdakwah() {//reset form jalan
      $('#program').val('');
      $('#namapenerima').val('');
      $('#jenis').val('');
      $('#namajalan').val('');
      $('#tglbinaan').val('');
      $('#foto').val('');
      $('#alamat').val('');
      $('#keterangan').val('');
      $('#id_manusia').val('');
      $('#simpandakwah').attr('disabled',false);
      $('#updatedakwah').attr('disabled',true);
    }
    function editdakwah() {//edit jalan
        var id = $(this).data('iddakwah');
        var datadakwah = {'id_dakwah':id};console.log(datadakwah);
        $('input[name=editdakwah'+id+']').attr('disabled',true);//biar ga di klik dua kali, maka di disabled
        $.ajax({
            url : '<?php echo site_url("admin/dakwah/edit");?>',
            data : datadakwah,
            dataType : 'json',
            type : 'POST',
            success : function(data,status){
                if (data.status!='error') {
                    $('input[name=editdakwah'+id+']').attr('disabled',false);//disabled di set false, karena transaksi berhasil
                    $('#simpandakwah').attr('disabled',true);
                    $('#updatedakwah').attr('disabled',false);
                    $.each(data.msg,function(k,v){
                      $('#id_dakwah').val(v['id_dakwah']);
                      $('#program').val(v['program']);
                      $('#namapenerima').val(v['namapenerima']);
                      $('#jenis').val(v['jenis']);
                      $('#tglbinaan').val(v['tglbinaan']);
                      $('#foto').val(v['foto']);
                      $('#alamat').val(v['alamat']);
                      $('#keterangan').val(v['keterangan']);
                    })
                }else{
                    alert(data.msg);
                    $('input[name=editdakwah'+id+']').attr('disabled',false);//disabled di set false, karena transaksi berhasil
                }
            },
            error : function(x,t,m){
                alert(x.responseText);
                $('input[name=editdakwah'+id+']').attr('disabled',false);//disabled di set false, karena transaksi berhasil
            }
        })
    }
    function updatedakwah() {//update jalan
      var datadakwah = {'program':$('#program').val(),
      'namapenerima':$('#namapenerima').val(),
      'jenis':$('#jenis').val(),
      'tglbinaan':$('#tglbinaan').val(),
      'foto':$('#foto').val(),
      'alamat':$('#alamat').val(),
      'keterangan':$('#keterangan').val(),
      'id_dakwah':$('#id_dakwah').val()};console.log(datadakwah);
        $.ajax({
            url : '<?php echo site_url("admin/dakwah/update");?>',
            data : datadakwah,
            dataType : 'json',
            type : 'POST',
            success : function(data,status){
                if (data.status!='error') {
                    $('#daftardakwah').load('<?php echo current_url()." #daftardakwah > *";?>');
                    resetdakwah();//form langsung dikosongkan pas selesai input data
                }else{
                    alert(data.msg);
                }
            },
            error : function(x,t,m){
                alert(x.responseText);
            }
        })
    }
    function deletedakwah() {//delete jalan
        if (confirm("Anda yakin akan menghapus data program dakwah ini?")) {
            var id = $(this).data('iddakwah');
            var datadakwah = {'id_dakwah':id};console.log(datadakwah);
            $.ajax({
                url : '<?php echo site_url("admin/dakwah/delete");?>',
                data : datadakwah,
                dataType : 'json',
                type : 'POST',
                success : function(data,status){
                    if (data.status!='error') {
                        $('#daftardakwah').load('<?php echo current_url()." #daftardakwah > *";?>');
                        resetdakwah();//form langsung dikosongkan pas selesai input data
                    }else{
                        alert(data.msg);
                    }
                },
                error : function(x,t,m){
                    alert(x.responseText);
                }
            })
        }
    }
</script>

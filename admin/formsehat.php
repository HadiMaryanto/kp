<div class="container-fluid">
    <div class="row">
        <div class="col-md-4 col-sm-3">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title"><span class="glyphicon glyphicon-list-alt"></span> Form Program Kesehatan</h3>
              </div>
              <div class="panel-body">
                  <form action="#">
                    <div class="form-group">
                      <label for="program">Program</label>
                      <input type="text" class="form-control" id="program" placeholder="">
                      <input type="hidden" name="id_kesehatan" id="id_kesehatan" value="">
                    </div>
                      <div class="form-group">
                        <label for="namapenerima">Nama</label>
                        <input type="text" class="form-control" id="namapenerima" placeholder="">
                      </div>
                      <div class="form-group">
                        <label for="jenis">Jenis</label>
                        <select class="form-control" id="jenis">
                          <option value="">pilih</option>
                          <option value="duafa sehat">duafa sehat</option>
                          <option value="program senyum ibu">program senyum ibu</option>
                          <option value="program khitan ceria">program khitan ceria</option>
                          <option value="pengobatan gratis">pengobatan gratis</option>
                          <option value="cek kesehatan gratis">cek kesehatan gratis</option>
                          <option value="gerakan sadar sehat">gerakan sadar sehat</option>
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
                        <button type="button" name="simpansehat" id="simpansehat" class="btn btn-primary">Simpan</button>
                        <button type="button" name="resetsehat"  id="resetsehat" class="btn btn-warning">Reset</button>
                        <button type="button" name="updatesehat" id="updatesehat" class="btn btn-info" disabled="true">Update</button>
                      </div>
                  </form>
          </div>
        </div>
    </div>
    <div class="col-md-8 col-sm-8">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title"><span class="glyphicon glyphicon-list"></span> Daftar Program Kesehatan</h3>
        </div>
        <div class="panel-body">
          <table class="table table-bordered">
            <th>No</th>
            <th>Program</th>
            <th>Nama</th>
            <th>Jenis</th>
            <th>Tgl Binaan</th>
            <th>Foto</th>
            <th>Alamat</th>
            <th>Keterangan</th>
            <th></th>
            <tbody id="daftarsehat">
              <?php
              $no = 1;
              foreach ($itemsehat->result() as $sehat) {
                ?>
                <tr>
                  <td><?php echo $no;?></td>
                  <td><?php echo $sehat->program;?></td>
                  <td><?php echo $sehat->namapenerima;?></td>
                  <td><?php echo $sehat->jenis;?></td>
                  <td><?php echo $sehat->tglbinaan;?></td>
                  <td><?php echo $sehat->foto;?></td>
                  <td><?php echo $sehat->alamat;?></td>
                  <td><?php echo $sehat->keterangan;?></td>
                  <td>
                    <button type="button" class="btn btn-sm btn-info" data-idsehat="<?php echo $sehat->id_kesehatan;?>" name="editsehat" id="editsehat"><span class="glyphicon glyphicon-edit"></span></button>
                    <button type="button" class="btn btn-sm btn-danger" data-idsehat="<?php echo $sehat->id_kesehatan;?>" name="deletesehat" id="deletesehat"><span class="glyphicon glyphicon-trash"></span></button>
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
    $(document).on('click','#simpansehat',simpansehat)
    .on('click','#resetsehat',resetsehat)
    .on('click','#updatesehat',updatesehat)
    .on('click','#editsehat',editsehat)
    .on('click','#deletesehat',deletesehat);
    function simpansehat() {
        var datasehat = {'program':$('#program').val(),
        'namapenerima':$('#namapenerima').val(),
        'jenis':$('#jenis').val(),
        'tglbinaan':$('#tglbinaan').val(),
        'foto':$('#foto').val(),
        'alamat':$('#alamat').val(),
        'keterangan':$('#keterangan').val()};console.log(datasehat);
        $.ajax({
            url : '<?php echo site_url("admin/kesehatan/create");?>',
            data : datasehat,
            dataType : 'json',
            type : 'POST',
            success : function(data,status){
                if (data.status!='error') {
                    $('#daftarsehat').load('<?php echo current_url()." #daftarsehat > *";?>');
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
    function resetsehat() {//reset form jalan
      $('#program').val('');
      $('#namapenerima').val('');
      $('#jenis').val('');
      $('#namajalan').val('');
      $('#tglbinaan').val('');
      $('#foto').val('');
      $('#alamat').val('');
      $('#keterangan').val('');
      $('#id_kesehatan').val('');
      $('#simpansehat').attr('disabled',false);
      $('#updatesehat').attr('disabled',true);
    }
    function editsehat() {//edit jalan
        var id = $(this).data('idsehat');
        var datasehat = {'id_kesehatan':id};console.log(datasehat);
        $('input[name=editsehat'+id+']').attr('disabled',true);//biar ga di klik dua kali, maka di disabled
        $.ajax({
            url : '<?php echo site_url("admin/kesehatan/edit");?>',
            data : datasehat,
            dataType : 'json',
            type : 'POST',
            success : function(data,status){
                if (data.status!='error') {
                    $('input[name=editsehat'+id+']').attr('disabled',false);//disabled di set false, karena transaksi berhasil
                    $('#simpansehat').attr('disabled',true);
                    $('#updatesehat').attr('disabled',false);
                    $.each(data.msg,function(k,v){
                      $('#id_kesehatan').val(v['id_kesehatan']);
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
                    $('input[name=editsehat'+id+']').attr('disabled',false);//disabled di set false, karena transaksi berhasil
                }
            },
            error : function(x,t,m){
                alert(x.responseText);
                $('input[name=editsehat'+id+']').attr('disabled',false);//disabled di set false, karena transaksi berhasil
            }
        })
    }
    function updatesehat() {//update jalan
      var datasehat = {'program':$('#program').val(),
      'namapenerima':$('#namapenerima').val(),
      'jenis':$('#jenis').val(),
      'tglbinaan':$('#tglbinaan').val(),
      'foto':$('#foto').val(),
      'alamat':$('#alamat').val(),
      'keterangan':$('#keterangan').val(),
      'id_kesehatan':$('#id_kesehatan').val()};console.log(datasehat);
        $.ajax({
            url : '<?php echo site_url("admin/kesehatan/update");?>',
            data : datasehat,
            dataType : 'json',
            type : 'POST',
            success : function(data,status){
                if (data.status!='error') {
                    $('#daftarsehat').load('<?php echo current_url()." #daftarsehat > *";?>');
                    resetsehat();//form langsung dikosongkan pas selesai input data
                }else{
                    alert(data.msg);
                }
            },
            error : function(x,t,m){
                alert(x.responseText);
            }
        })
    }
    function deletesehat() {//delete jalan
        if (confirm("Anda yakin akan menghapus data program ekonomi ini?")) {
            var id = $(this).data('idsehat');
            var datasehat = {'id_kesehatan':id};console.log(datasehat);
            $.ajax({
                url : '<?php echo site_url("admin/kesehatan/delete");?>',
                data : datasehat,
                dataType : 'json',
                type : 'POST',
                success : function(data,status){
                    if (data.status!='error') {
                        $('#daftarsehat').load('<?php echo current_url()." #daftarsehat > *";?>');
                        resetsehat();//form langsung dikosongkan pas selesai input data
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

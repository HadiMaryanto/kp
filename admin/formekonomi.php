<div class="container-fluid">
    <div class="row">
        <div class="col-md-4 col-sm-3">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title"><span class="glyphicon glyphicon-list-alt"></span> Form Program Ekonomi</h3>
              </div>
              <div class="panel-body">
                  <form action="#">
                    <div class="form-group">
                      <label for="program">Program</label>
                      <input type="text" class="form-control" id="program" placeholder="">
                      <input type="hidden" name="id_ekonomi" id="id_ekonomi" value="">
                    </div>
                      <div class="form-group">
                        <label for="namapenerima">Nama</label>
                        <input type="text" class="form-control" id="namapenerima" placeholder="">
                      </div>
                        <div class="form-group">
                        <label for="jenis">Jenis</label>
                        <select class="form-control" id="jenis">
                          <option value="">pilih</option>
                          <option value="perhatian khusus">perhatian khusus</option>
                          <option value="berkembang">berkembang</option>
                          <option value="mandiri">mandiri</option>
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
                        <button type="button" name="simpanekonomi" id="simpanekonomi" class="btn btn-primary">Simpan</button>
                        <button type="button" name="resetekonomi"  id="resetekonomi" class="btn btn-warning">Reset</button>
                        <button type="button" name="updateekonomi" id="updateekonomi" class="btn btn-info" disabled="true">Update</button>
                      </div>
                  </form>
          </div>
        </div>
    </div>
    <div class="col-md-8 col-sm-8">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title"><span class="glyphicon glyphicon-list"></span> Daftar Program Ekonomi</h3>
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
            <tbody id="daftarekonomi">
              <?php
              $no = 1;
              foreach ($itemekonomi->result() as $ekonomi) {
                ?>
                <tr>
                  <td><?php echo $no;?></td>
                  <td><?php echo $ekonomi->program;?></td>
                  <td><?php echo $ekonomi->namapenerima;?></td>
                  <td><?php echo $ekonomi->jenis;?></td>
                  <td><?php echo $ekonomi->tglbinaan;?></td>
                  <td><?php echo $ekonomi->foto;?></td>
                  <td><?php echo $ekonomi->alamat;?></td>
                  <td><?php echo $ekonomi->keterangan;?></td>
                  <td>
                    <button type="button" class="btn btn-sm btn-info" data-idekonomi="<?php echo $ekonomi->id_ekonomi;?>" name="editekonomi" id="editekonomi"><span class="glyphicon glyphicon-edit"></span></button>
                    <button type="button" class="btn btn-sm btn-danger" data-idekonomi="<?php echo $ekonomi->id_ekonomi;?>" name="deleteekonomi" id="deleteekonomi"><span class="glyphicon glyphicon-trash"></span></button>
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
    $(document).on('click','#simpanekonomi',simpanekonomi)
    .on('click','#resetekonomi',resetekonomi)
    .on('click','#updateekonomi',updateekonomi)
    .on('click','#editekonomi',editekonomi)
    .on('click','#deleteekonomi',deleteekonomi);
    function simpanekonomi() {
        var dataekonomi = {'program':$('#program').val(),
        'namapenerima':$('#namapenerima').val(),
        'jenis':$('#jenis').val(),
        'tglbinaan':$('#tglbinaan').val(),
        'foto':$('#foto').val(),
        'alamat':$('#alamat').val(),
        'keterangan':$('#keterangan').val()};console.log(dataekonomi);
        $.ajax({
            url : '<?php echo site_url("admin/ekonomi/create");?>',
            data : dataekonomi,
            dataType : 'json',
            type : 'POST',
            success : function(data,status){
                if (data.status!='error') {
                    $('#daftarekonomi').load('<?php echo current_url()." #daftarekonomi > *";?>');
                    resetekonomi();//form langsung dikosongkan pas selesai input data
                }else{
                    alert(data.msg);
                }
            },
            error : function(x,t,m){
                alert(x.responseText);
            }
        })
    }
    function resetekonomi() {//reset form jalan
      $('#program').val('');
      $('#namapenerima').val('');
      $('#jenis').val('');
      $('#namajalan').val('');
      $('#tglbinaan').val('');
      $('#foto').val('');
      $('#alamat').val('');
      $('#keterangan').val('');
      $('#id_ekonomi').val('');
      $('#simpanekonomi').attr('disabled',false);
      $('#updateekonomi').attr('disabled',true);
    }
    function editekonomi() {//edit jalan
        var id = $(this).data('idekonomi');
        var dataekonomi = {'id_ekonomi':id};console.log(dataekonomi);
        $('input[name=editekonomi'+id+']').attr('disabled',true);//biar ga di klik dua kali, maka di disabled
        $.ajax({
            url : '<?php echo site_url("admin/ekonomi/edit");?>',
            data : dataekonomi,
            dataType : 'json',
            type : 'POST',
            success : function(data,status){
                if (data.status!='error') {
                    $('input[name=editekonomi'+id+']').attr('disabled',false);//disabled di set false, karena transaksi berhasil
                    $('#simpanekonomi').attr('disabled',true);
                    $('#updateekonomi').attr('disabled',false);
                    $.each(data.msg,function(k,v){
                      $('#id_ekonomi').val(v['id_ekonomi']);
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
                    $('input[name=editekonomi'+id+']').attr('disabled',false);//disabled di set false, karena transaksi berhasil
                }
            },
            error : function(x,t,m){
                alert(x.responseText);
                $('input[name=editekonomi'+id+']').attr('disabled',false);//disabled di set false, karena transaksi berhasil
            }
        })
    }
    function updateekonomi() {//update jalan
      var dataekonomi = {'program':$('#program').val(),
      'namapenerima':$('#namapenerima').val(),
      'jenis':$('#jenis').val(),
      'tglbinaan':$('#tglbinaan').val(),
      'foto':$('#foto').val(),
      'alamat':$('#alamat').val(),
      'keterangan':$('#keterangan').val(),
      'id_ekonomi':$('#id_ekonomi').val()};console.log(dataekonomi);
        $.ajax({
            url : '<?php echo site_url("admin/ekonomi/update");?>',
            data : dataekonomi,
            dataType : 'json',
            type : 'POST',
            success : function(data,status){
                if (data.status!='error') {
                    $('#daftarekonomi').load('<?php echo current_url()." #daftarekonomi > *";?>');
                    resetekonomi();//form langsung dikosongkan pas selesai input data
                }else{
                    alert(data.msg);
                }
            },
            error : function(x,t,m){
                alert(x.responseText);
            }
        })
    }
    function deleteekonomi() {//delete jalan
        if (confirm("Anda yakin akan menghapus data program ekonomi ini?")) {
            var id = $(this).data('idekonomi');
            var dataekonomi = {'id_ekonomi':id};console.log(dataekonomi);
            $.ajax({
                url : '<?php echo site_url("admin/ekonomi/delete");?>',
                data : dataekonomi,
                dataType : 'json',
                type : 'POST',
                success : function(data,status){
                    if (data.status!='error') {
                        $('#daftarekonomi').load('<?php echo current_url()." #daftarekonomi > *";?>');
                        resetekonomi();//form langsung dikosongkan pas selesai input data
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

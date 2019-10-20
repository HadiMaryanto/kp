<div class="container-fluid">
    <div class="row">
        <div class="col-md-4 col-sm-3">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title"><span class="glyphicon glyphicon-list-alt"></span> Form program Kemanusiaan</h3>
              </div>
              <div class="panel-body">
                  <form action="#">
                    <div class="form-group">
                      <label for="program">Program</label>
                      <input type="text" class="form-control" id="program" placeholder="">
                      <input type="hidden" name="id_manusia" id="id_manusia" value="">
                    </div>
                      <div class="form-group">
                        <label for="namapenerima">Nama penerimaan</label>
                        <input type="text" class="form-control" id="namapenerima" placeholder="">
                      </div>
                      <div class="form-group">
                        <label for="jenis">Jenis</label>
                        <select class="form-control" id="jenis">
                          <option value="">pilih</option>
                          <option value="lansia sejahtera">lansia sejahtera</option>
                          <option value="peduli duafa">peduli duafa</option>
                          <option value="tanggap bencana">tanggap bencana</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="tglbinaan">Tanggal Binaan</label>
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
                        <button type="button" name="simpankeman" id="simpankeman" class="btn btn-primary">Simpan</button>
                        <button type="button" name="resetkeman"  id="resetkeman" class="btn btn-warning">Reset</button>
                        <button type="button" name="updatekeman" id="updatekeman" class="btn btn-info" disabled="true">Update</button>
                      </div>
                  </form>
          </div>
        </div>
    </div>
    <div class="col-md-8 col-sm-8">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title"><span class="glyphicon glyphicon-list"></span> Daftar program Kemanusian</h3>
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
            <tbody id="daftarkemanusian">
              <?php
              $no = 1;
              foreach ($itemkemanusian->result() as $kemanusian) {
                ?>
                <tr>
                  <td><?php echo $no;?></td>
                  <td><?php echo $kemanusian->program;?></td>
                  <td><?php echo $kemanusian->namapenerima;?></td>
                  <td><?php echo $kemanusian->jenis;?></td>
                  <td><?php echo $kemanusian->tglbinaan;?></td>
                  <td><?php echo $kemanusian->foto;?></td>
                  <td><?php echo $kemanusian->alamat;?></td>
                  <td><?php echo $kemanusian->keterangan;?></td>
                  <td>
                    <button type="button" class="btn btn-sm btn-info" data-idmanusia="<?php echo $kemanusian->id_manusia;?>" name="editkeman" id="editkeman"><span class="glyphicon glyphicon-edit"></span></button>
                    <button type="button" class="btn btn-sm btn-danger" data-idmanusia="<?php echo $kemanusian->id_manusia;?>" name="deletekeman" id="deletekeman"><span class="glyphicon glyphicon-trash"></span></button>
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
    $(document).on('click','#simpankeman',simpankeman)
    .on('click','#resetkeman',resetkeman)
    .on('click','#updatekeman',updatekeman)
    .on('click','#editkeman',editkeman)
    .on('click','#deletekeman',deletekeman);
    function simpankeman() {//simpan jalan
        var datakemanusian = {'program':$('#program').val(),
        'namapenerima':$('#namapenerima').val(),
        'jenis':$('#jenis').val(),
        'tglbinaan':$('#tglbinaan').val(),
        'foto':$('#foto').val(),
        'alamat':$('#alamat').val(),
        'keterangan':$('#keterangan').val()};console.log(datakemanusian);
        $.ajax({
            url : '<?php echo site_url("admin/kemanusian/create");?>',
            data : datakemanusian,
            dataType : 'json',
            type : 'POST',
            success : function(data,status){
                if (data.status!='error') {
                    $('#daftarkemanusian').load('<?php echo current_url()." #daftarkemanusian > *";?>');
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
    function resetkeman() {//reset form jalan
        $('#program').val('');
        $('#namapenerima').val('');
        $('#jenis').val('');
        $('#namajalan').val('');
        $('#tglbinaan').val('');
        $('#foto').val('');
        $('#alamat').val('');
        $('#keterangan').val('');
        $('#id_manusia').val('');
        $('#simpankeman').attr('disabled',false);
        $('#updatekeman').attr('disabled',true);
    }
    function editkeman() {//edit jalan
        var id = $(this).data('idmanusia');
        var datakemanusian = {'id_manusia':id};console.log(datakemanusian);
        $('input[name=editkeman'+id+']').attr('disabled',true);//biar ga di klik dua kali, maka di disabled
        $.ajax({
            url : '<?php echo site_url("admin/kemanusian/edit");?>',
            data : datakemanusian,
            dataType : 'json',
            type : 'POST',
            success : function(data,status){
                if (data.status!='error') {
                    $('input[name=editkeman'+id+']').attr('disabled',false);//disabled di set false, karena transaksi berhasil
                    $('#simpankeman').attr('disabled',true);
                    $('#updatekeman').attr('disabled',false);
                    $.each(data.msg,function(k,v){
                        $('#id_manusia').val(v['id_manusia']);
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
                    $('input[name=editkeman'+id+']').attr('disabled',false);//disabled di set false, karena transaksi berhasil
                }
            },
            error : function(x,t,m){
                alert(x.responseText);
                $('input[name=editkeman'+id+']').attr('disabled',false);//disabled di set false, karena transaksi berhasil
            }
        })
    }
    function updatekeman() {
      var datakemanusian = {'program':$('#program').val(),
      'namapenerima':$('#namapenerima').val(),
      'jenis':$('#jenis').val(),
      'tglbinaan':$('#tglbinaan').val(),
      'foto':$('#foto').val(),
      'alamat':$('#alamat').val(),
      'keterangan':$('#keterangan').val(),
      'id_manusia':$('#id_manusia').val()};console.log(datakemanusian);
      $.ajax({
          url : '<?php echo site_url("admin/kemanusian/update");?>',
          data : datakemanusian,
          dataType : 'json',
          type : 'POST',
          success : function(data,status){
              if (data.status!='error') {
                  $('#daftarkemanusian').load('<?php echo current_url()." #daftarkemanusian > *";?>');
                  resetkeman();//form langsung dikosongkan pas selesai input data
              }else{
                  alert(data.msg);
              }
          },
          error : function(x,t,m){
              alert(x.responseText);
          }
      })
    }
    function deletekeman() {//delete jalan
        if (confirm("Anda yakin akan menghapus program kemanusian ini?")) {
            var id = $(this).data('idmanusia');
            var datakemanusian = {'id_manusia':id};console.log(datakemanusian);
            $.ajax({
                url : '<?php echo site_url("admin/kemanusian/delete");?>',
                data : datakemanusian,
                dataType : 'json',
                type : 'POST',
                success : function(data,status){
                    if (data.status!='error') {
                        $('#daftarkemanusian').load('<?php echo current_url()." #daftarkemanusian > *";?>');
                        resetkeman();//form langsung dikosongkan pas selesai input data
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

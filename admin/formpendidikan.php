<div class="container-fluid">
    <div class="row">
        <div class="col-md-4 col-sm-3">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title"><span class="glyphicon glyphicon-list-alt"></span> Form program Pendidikan</h3>
              </div>
              <div class="panel-body">
                  <form action="#">
                    <div class="form-group">
                      <label for="program">Program</label>
                      <input type="text" class="form-control" id="program" placeholder="">
                      <input type="hidden" name="id_pendidikan" id="id_pendidikan" value="">
                    </div>
                      <div class="form-group">
                        <label for="namapenerima">Nama</label>
                        <input type="text" class="form-control" id="namapenerima" placeholder="">
                      </div>
                      <div class="form-group">
                        <label for="jenis">Jenis</label>
                        <select class="form-control" id="jenis">
                          <option value="">pilih</option>
                          <option value="beasiswa rumbai cerdas">beasiswa rumbai cerdas</option>
                          <option value="guru berdaya">guru berdaya</option>
                          <option value="sekolah berdaya">sekolah berdaya</option>
                          <option value="beasiswa duafa">beasiswa duafa</option>
                          <option value="duafa terampil">duafa terampil</option>
                          <option value="masyarakat terampil">masyarakat terampil</option>
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
                        <button type="button" name="simpanpendidikan" id="simpanpendidikan" class="btn btn-primary">Simpan</button>
                        <button type="button" name="resetpendidikan"  id="resetpendidikan" class="btn btn-warning">Reset</button>
                        <button type="button" name="updatependidikan" id="updatependidikan" class="btn btn-info" disabled="true">Update</button>
                      </div>
                  </form>
          </div>
        </div>
    </div>
    <div class="col-md-8 col-sm-8">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title"><span class="glyphicon glyphicon-list"></span> Daftar Program Pendidikan</h3>
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
            <tbody id="daftarpendidikan">
              <?php
              $no = 1;
              foreach ($itempendidikan->result() as $pendidikan) {
                ?>
                <tr>
                  <td><?php echo $no;?></td>
                  <td><?php echo $pendidikan->program;?></td>
                  <td><?php echo $pendidikan->namapenerima;?></td>
                  <td><?php echo $pendidikan->jenis;?></td>
                  <td><?php echo $pendidikan->tglbinaan;?></td>
                  <td><?php echo $pendidikan->foto;?></td>
                  <td><?php echo $pendidikan->alamat;?></td>
                  <td><?php echo $pendidikan->keterangan;?></td>
                  <td>
                    <button type="button" class="btn btn-sm btn-info" data-idpendidikan="<?php echo $pendidikan->id_pendidikan;?>" name="editpendidikan" id="editpendidikan"><span class="glyphicon glyphicon-edit"></span></button>
                    <button type="button" class="btn btn-sm btn-danger" data-idpendidikan="<?php echo $pendidikan->id_pendidikan;?>" name="deletependidikan" id="deletependidikan"><span class="glyphicon glyphicon-trash"></span></button>
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
    $(document).on('click','#simpanpendidikan',simpanpendidikan)
    .on('click','#resetpendidikan',resetpendidikan)
    .on('click','#updatependidikan',updatependidikan)
    .on('click','#editpendidikan',editpendidikan)
    .on('click','#deletependidikan',deletependidikan);
    function simpanpendidikan() {
        var datapendidikan = {'program':$('#program').val(),
        'namapenerima':$('#namapenerima').val(),
        'jenis':$('#jenis').val(),
        'tglbinaan':$('#tglbinaan').val(),
        'foto':$('#foto').val(),
        'alamat':$('#alamat').val(),
        'keterangan':$('#keterangan').val()};console.log(datapendidikan);
        $.ajax({
            url : '<?php echo site_url("admin/pendidikan/create");?>',
            data : datapendidikan,
            dataType : 'json',
            type : 'POST',
            success : function(data,status){
                if (data.status!='error') {
                    $('#daftarpendidikan').load('<?php echo current_url()." #daftarpendidikan > *";?>');
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
    function resetpendidikan() {//reset form jalan
      $('#program').val('');
      $('#namapenerima').val('');
      $('#jenis').val('');
      $('#namajalan').val('');
      $('#tglbinaan').val('');
      $('#foto').val('');
      $('#alamat').val('');
      $('#keterangan').val('');
      $('#id_pendidikan').val('');
      $('#simpanpendidikan').attr('disabled',false);
      $('#updatependidikan').attr('disabled',true);
    }
    function editpendidikan() {//edit jalan
        var id = $(this).data('idpendidikan');
        var datapendidikan = {'id_pendidikan':id};console.log(datapendidikan);
        $('input[name=editpendidikan'+id+']').attr('disabled',true);//biar ga di klik dua kali, maka di disabled
        $.ajax({
            url : '<?php echo site_url("admin/pendidikan/edit");?>',
            data : datapendidikan,
            dataType : 'json',
            type : 'POST',
            success : function(data,status){
                if (data.status!='error') {
                    $('input[name=editpendidikan'+id+']').attr('disabled',false);//disabled di set false, karena transaksi berhasil
                    $('#simpanpendidikan').attr('disabled',true);
                    $('#updatependidikan').attr('disabled',false);
                    $.each(data.msg,function(k,v){
                      $('#id_pendidikan').val(v['id_pendidikan']);
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
                    $('input[name=editpendidikan'+id+']').attr('disabled',false);//disabled di set false, karena transaksi berhasil
                }
            },
            error : function(x,t,m){
                alert(x.responseText);
                $('input[name=editpendidikan'+id+']').attr('disabled',false);//disabled di set false, karena transaksi berhasil
            }
        })
    }
    function updatependidikan() {//update jalan
      var datapendidikan = {'program':$('#program').val(),
      'namapenerima':$('#namapenerima').val(),
      'jenis':$('#jenis').val(),
      'tglbinaan':$('#tglbinaan').val(),
      'foto':$('#foto').val(),
      'alamat':$('#alamat').val(),
      'keterangan':$('#keterangan').val(),
      'id_pendidikan':$('#id_pendidikan').val()};console.log(datapendidikan);
        $.ajax({
            url : '<?php echo site_url("admin/pendidikan/update");?>',
            data : datapendidikan,
            dataType : 'json',
            type : 'POST',
            success : function(data,status){
                if (data.status!='error') {
                    $('#daftarpendidikan').load('<?php echo current_url()." #daftarpendidikan > *";?>');
                    resetpendidikan();//form langsung dikosongkan pas selesai input data
                }else{
                    alert(data.msg);
                }
            },
            error : function(x,t,m){
                alert(x.responseText);
            }
        })
    }
    function deletependidikan() {//delete jalan
        if (confirm("Anda yakin akan menghapus data program ekonomi ini?")) {
            var id = $(this).data('idpendidikan');
            var datapendidikan = {'id_pendidikan':id};console.log(datapendidikan);
            $.ajax({
                url : '<?php echo site_url("admin/pendidikan/delete");?>',
                data : datapendidikan,
                dataType : 'json',
                type : 'POST',
                success : function(data,status){
                    if (data.status!='error') {
                        $('#daftarpendidikan').load('<?php echo current_url()." #daftarpendidikan > *";?>');
                        resetpendidikan();//form langsung dikosongkan pas selesai input data
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

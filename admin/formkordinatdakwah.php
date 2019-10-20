<div class="container-fluid">
  <div class="row">
    <div class="col-md-8 col-sn-8">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title"><span class="glyphicon glyphicon-globe"></span> Peta</h3>
        </div>
        <div class="panel-body">
          <div class="col-md-12 col-sn-12" id="map-canvas" style="height:300px;">

          </div>

        </div>
      </div>
    </div>
    <div class="col-md-4 col-sn-4">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title"><span class="glyphicon glyphicon-map-marker"></span> form marker program kemanusian</h3>
        </div>
        <div class="panel-body">
          <form>
            <div class="row">
              <div class="col-md-6 col-sn-6">
                <div class="form-group">
                  <label for="latitude">Latitude</label>
                  <input type="text" class="form-control" id="latitude" placeholder="">
                </div>
              </div>
              <div class="col-md-6 col-sn-6">
                <div class="form-group">
                  <label for="longitude">Longitude</label>
                  <input type="text" class="form-control" id="longitude" placeholder="">
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="manusia_id">Program</label>
              <select class="form-control" name="id_dakwah" id="id_dakwah">
                <option value="">pilih program</option>
                <?php foreach ($itemdakwah->result() as $dakwah) {
                  ?>
                  <option value="<?php echo $dakwah->id_dakwah;?>" ><?php echo $dakwah->program;?></option>
                  <?php
                } ?>
              </select>
            </div>
            <!-- <div class="col-md-6 col-sn-6">
              <div class="form-group">
                <label for=>tes</label>
                <input type="text" class="form-control" id="id_jembatan" placeholder="">
              </div>
            </div> -->
            <div class="form-group">
              <button type="button" class="btn btn-primary" id="simpan" name="simpan"> Simpan</button>
              <button type="button" class="btn btn-warning" id="reset" name="reset"> Reset</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12 col-sn-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title"><span class="glyphicon glyphicon-list"></span> Daftar marker program kemanusian</h3>
      </div>
      <div class="panel-body">
        <table class="table table-bordered">
          <th>no</th>
          <th>Program</th>
          <th>Latitude</th>
          <th>Longitude</th>
          <th>Alamat</th>
          <th>keterangan</th>
          <th></th>
          <tbody id="daftarmarkerdak">
            <?php
            $no = 1;
            foreach ($itemkordinat->result() as $kordinat) {
              ?>
              <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $kordinat->program;?></td>
                <td><?php echo $kordinat->latitude;?></td>
                <td><?php echo $kordinat->longitude;?></td>
                <td><?php echo $kordinat->alamat;?></td>
                <td><?php echo $kordinat->keterangan;?></td>
                <td><button type="button" id="viewmarker" data-idkordidakwah="<?php echo $kordinat->id_kordidakwah; ?>" class="btn btn-sn btn-info" name="button" title="view marker kemanusian"><span class="glyphicon glyphicon-eye-open"></span> </button>
                  <button type="button" id="deletemarker" data-idkordidakwah="<?php echo $kordinat->id_kordidakwah; ?>" class="btn btn-sn btn-danger" name="button" title="delete marker kemanusian"><span class="glyphicon glyphicon-trash"></span> </button>
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
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBlMRxpKIfyeDQjRxAzhdKvNIvELxcAhxw&callback"></script>
<script>
var map;
  var markers = [];

  function initialize() {
      var mapOptions = {
      zoom: 14,
      // Center di kantor kabupaten kudus
      center: new google.maps.LatLng(0.506566, 101.437790)
      };

      map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

      // Add a listener for the click event
      google.maps.event.addListener(map, 'rightclick', addLatLng);
      google.maps.event.addListener(map, "rightclick", function(event) {
        var lat = event.latLng.lat();
        var lng = event.latLng.lng();
        $('#latitude').val(lat);
        $('#longitude').val(lng);
        //alert(lat +" dan "+lng);
      });
  }
  function addLatLng(event) {
        var marker = new google.maps.Marker({
        position: event.latLng,
        title: 'jembatan',
        map: map
        });
        markers.push(marker);
    }
    function addMarker(nama,location) {
        var marker = new google.maps.Marker({
            position: location,
            map: map,
            title : nama
        });
        markers.push(marker);
    }

    function clearmap(){
        //e.preventDefault();
        $('#latitude').val('');
        $('#longitude').val('');
        setMapOnAll(null);
    }
    //buat hapus marker
    function setMapOnAll(map) {
      for (var i = 0; i < markers.length; i++) {
        markers[i].setMap(map);
      }
      markers = [];
    }
 google.maps.event.addDomListener(window, 'load', initialize);

 $(document).on('click','#simpan',simpan)
 .on('click','#viewmarker',viewmarker)
 .on('click','#deletemarker',deletemarker)
 .on('click','#reset',reset);

  function simpan(){
    var datadakwah = {'id_dakwah':$('#id_dakwah').val(),
    'latitude':$('#latitude').val(),
    'longitude':$('#longitude').val()};console.log(datadakwah);
    $.ajax({
      url : '<?php echo site_url('admin/kordinatdakwah/create');?>',
      data : datadakwah,
      dataType : 'json',
      type : 'POST',
      success : function(data,status){
        if (data.status!='error') {
          reset();
          $('#daftarmarkerdak').load('<?php echo current_url()." #daftarmarkerdak > *"; ?>');
        }else {
          alert(data.msg)
        }
      },
      error : function(x,t,m){
        alert(x.responseText);
      }
    })
  }
  function reset(){
    $('#id_jembatan').val("");
    $('#latitude').val("");
    $('#longitude').val("");
    clearmap();
  }
  function viewmarker(){
    var id = $(this).data('idkordidakwah');
    var datamarker = {'id_kordidakwah':id};console.log(datamarker);
    $.ajax({
      url : '<?php echo site_url('admin/kordinatdakwah/read');?>',
      data : datamarker,
      dataType : 'json',
      type : 'POST',
      success : function(data,status){
        if (data.status!='error') {
        //  reset();
          $('#daftarmarkerdak').load('<?php echo current_url()." #daftarmarkerdak > *"; ?>');
          $.each(data.msg,function(k,v){
            $('#latitude').val(v['latitude']);
            $('#longitude').val(v['longitude']);
            $('#id_dakwah').val(v['id_dakwah']);
             var myLatLng = {lat: parseFloat(v["latitude"]), lng: parseFloat(v["longitude"])};
             addMarker(v['program'],myLatLng);
          })
        }else {
          alert(data.msg)
        }
      },
      error : function(x,t,m){
        alert(x.responseText);
      }
    })
  }
  function deletemarker(){
    if (confirm("apakah anda ingin menghapus data ini?")) {
      var id = $(this).data('idkordidakwah');
      var datamarker = {'id_kordidakwah':id};console.log(datamarker);
      $.ajax({
        url : '<?php echo site_url('admin/kordinatdakwah/delete');?>',
        data : datamarker,
        dataType : 'json',
        type : 'POST',
        success : function(data,status){
          if (data.status!='error') {
          //  reset();
            $('#daftarmarkerdak').load('<?php echo current_url()." #daftarmarkerdak > *"; ?>');
          }else {
            alert(data.msg)
          }
        },
        error : function(x,t,m){
          alert(x.responseText);
        }
      })
    }
  }
</script>

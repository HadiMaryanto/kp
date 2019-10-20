<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!-- <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet"> -->

  <!--  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>-->
    <!-- <script src="https://code.jquery.com/jquery-3.1.0.js"></script> -->
    <!-- <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!-- <script src="<?php echo base_url() ?>asset/dataTables/js/jquery-3.1.0.js"></script>
    <script src="<?php echo base_url() ?>asset/dataTables/js/jquery.dataTables.min.js"></script> -->

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script type="text/javascript"  src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
  </head>
  <body>
    <div class="col-md-12 col-sn-8">
      <div class="panel panel-default">
           <div class="panel-heading">
             <h3 class="panel-title"><span class="glyphicon glyphicon-globe"></span> Peta</h3>
           </div>
           <div class="panel-body">
             <div class="col-md-12 col-sn-12" id="map-canvas" style="height:400px;">
             </div>

           </div>
         </div>

    <section class="content-header">
          <!-- <h1>
            Dashboard
            <small>Control panel</small>
          </h1> -->
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url('#') ?>"></i><i class="fa fa-users"></i> Program Mustahik</a></li>
            <!-- <li class="active">Home</li> -->
          </ol>
        </section>

    <div class="row">
      <div class="col-md-12">
          <section class="content-header">
            <h1 class="page-header">
               Data <small>Program Mustahik</small>
            </h1>
          </section>

    <!-- /. ROW  -->

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <!-- <div class="panel-heading">
                     <?php echo anchor('Mustahik/post','Tambah Data',array('class'=>'btn btn-info btn-sm')) ?>
                </div> -->
                <div class="panel-body">
                    <div class="table-responsive">
                      <table id="tabelProgramMus" class="table table-bordered table-striped">
                        <!-- <table class="table table-striped table-bordered table-hover" id="dataTables-example"> -->
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>No. KTP</th>
                                    <th>Alamat</th>
                                    <th>Kelurahan</th>
                                    <th>Kategori Asnaf</th>
                                    <th>No Hp</th>
                                    <th>Status Persetujuan</th>
                                    <!-- <th>Penyalur</th> -->
                               <?php if ($this->session->userdata('level') != 'pimpinan'): ?>
                                    <th>Aksi</th>
                                <?php endif ?>

                                </tr>
                            </thead>
                            <tbody>
                            <?php $no=1; foreach($detail_promus as $key => $row) { ?>
                                <tr class="gradeU">

                                   <td><?php echo $no?></td>
                                   <td><?php echo $row['nama_mus']?></td>
                                   <td><?php echo $row['no_ktp']?></td>
                                   <td><?php echo $row['alamat_mus']?></td>
                                   <td><?php echo $row['kelurahan']?></td>
                                   <td><?php echo $row['kategori_asnaf']?></td>
                                   <td><?php echo $row['no_hp']?></td>
                                   <td><?php echo $row['status_persetujuan'] ?></td>
                                  <!--  <td><?php echo $row['penyalur']?></td> -->
                                    <td class="center">
                                        <button type="button" id="viewmarker" class="btn btn-sm btn-warning" data-idkemanusian="<?php echo $row['id_mustahik'] ?>" name="button" title="view marker kemanusian"><span class="glyphicon glyphicon-eye-open"></span> </button>
                                    </td>
                                </tr>
                            <?php $no++; } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /. PANEL  -->
        </div>
    </div>
    </div>
    </div>
  </div>

<script src="https://maps.googleapis.com/maps/api/js?key=?_YOUR_API_KEY_callback"></script>
<!-- <script src="<?php echo base_url() ?>assets/js/jquery.js" charset="utf-8"></script> -->
<script>
// <script src="<?php echo base_url() ?>assets/js/jquery.js" charset="utf-8"></script>
<script type="text/javascript">
var map;
var markers = [];

function initialize() {
 var mapOptions = {
     zoom: 12,
     center: new google.maps.LatLng(0.506566, 101.437790),
     // mapTypeId: google.maps.MapTypeId.ROADMAP
 };
 $(document).on('click','#viewmarker',viewmarker);

 map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
 // var bounds = new google.maps.LatLngBounds();
    createMarker();

    function createMarker(){
      var mustahikUrl = window.location.origin+'/kp/Peta/getMustahik';

        $.ajax({
         url : mustahikUrl,
         dataType : 'json',
         type : 'GET',
         async : true,
         cache : false,
         success : function(data) {
           startMarker(data);
         },
         error: function(data){
           console.log(data);
         }
       });
    }

    function startMarker(data){
      for (var i = 0; i < data.length; i++) {

         createmarker(data[i].nama_mus, data[i].tgl_verifikasi, data[i].waktu_survey,
           data[i].status_persetujuan, data[i].surveyor, data[i].tempat_lahir, data[i].no_ktp, data[i].usia, data[i].pekerjaan,
            data[i].rt_rw, data[i].kelurahan, data[i].kecamatan, data[i].alamat_mus, data[i].latitude, data[i].longitude,data[i].id_mustahik);

      }
    }


  function createmarker(nama, tgl_verifikasi, survey, status, surveyor, lahir, ktp, umur, pekerjaan, rt_rw, kelurahan, kecamatan, alamat, lat, lng, program)
  {
      // start ajax get programMustahik

      var tables = "";
      var programUrl = window.location.origin+'/kp/Peta/getProgramMustahik/'+program;
      $.ajax({
       url : programUrl,
       dataType : 'json',
       type : 'GET',
       async : true,
       cache : false,
       success : function(response) {

         if (response.length > 0) {
           for (var i = 0; i < response.length; i++) {
             tables +=      "<ol type='1'>"+
                            "<li> nama program no "+(i+1)+" : "+response[i].nama_program+" </li>"+
                            "<li> jenis program: "+response[i].jenis_program+" </li></ol> <br>";
           }
         }
       },
       error: function(response){
         console.log(response);
       }
     });

      // end ajax get programMustahik

      infoWindow = new google.maps.InfoWindow();
      // var image = new google.maps.MapIcons({
      //   icon :{
      //     path : mapIcons.shapes.Map_PIN,
      //     fillColor : '#ba0000',
      //     fillOpacity : 1,
      //     strokeColor : '',
      //     strokeWeight: 0,
      //     scale: 0.8
      //   },
      //   map_icon_label: '<span class="map-icon map-icon-museum"></span>'
      // });
      var image = new google.maps.MarkerImage('../assets/ikonrumh.png');
      var latLng = new google.maps.LatLng(lat,lng);
      var marker = new google.maps.Marker({
        icon : image,
        map: map,
        position: latLng
      });
      // map.fitBounds(bounds);
      // bindInfoWindow(marker, map, InfoWindow, nama, namaprog);
      google.maps.event.addListener(marker,'click', function(){
      var html =  '<p>Nama: <b>'+nama+'</b></p>'+
                  '<p>tempat lahir: <b>'+lahir+'</b></p>'+
                  '<p>Usia: <b>'+umur+'</b></p>'+
                  '<p>Pekerjaan: <b>'+pekerjaan+'</b></p>'+
                  '<p>RT/RW: <b>'+rt_rw+'</b></p>'+
                  '<p>Kelurahan: <b>'+kelurahan+'</b></p>'+
                  '<p>Kecamatan: <b>'+kecamatan+'</b></p>'+
                  '<p>KTP: <b>'+ktp+'</b></p>'+
                  '<p>Alamat: <b>'+alamat+'</b></p>'+
                  '<p>Tgl Survei: <b>'+survey+'</b></p>'+
                  '<p>Surveyor: <b>'+surveyor+'</b></p>'+
                  '<p>Tgl Verifikasi: <b>'+tgl_verifikasi+'</b></p>'+
                  '<p>Status: <b>'+status+'</b></p>'+
                  '<p>program yang diterima: <b>'+tables+'</b></p>';


      infoWindow.setContent(html);
      infoWindow.open(map, marker);
    })
    }
    // function bindInfoWindow(marker, map, infoWindow, nama, namaprog){
    //   google.maps.event.addListener(marker, 'click', function(){
    //     infoWindow.setContent(nama,namaprog);
    //     InfoWindow.open(map, marker);
    //   });
    // }
 google.maps.event.addListener(map, "rightclick", function(event) {
   var lat = event.latLng.lat();
   var lng = event.latLng.lng();
   $('#latitude').val(lat);
   $('#longitude').val(lng);
   //alert(lat +" dan "+lng);
 });


}
  google.maps.event.addDomListener(window, 'load', initialize);
//   $(document).ready(function(){
//     var jumlah = $('.jumlah').text();
//     var td  = $('.jumlah');
//
//     for (var i = 0; i < td.length; i++) {
//       // var nilai = td[i];
//       td[i].innerHTML = "Rp "+td[i].innerText.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
//     }
// }
    function viewmarker(){
      var id = $(this).data('idkemanusian');
      urlview = '<?php echo site_url("peta/semua/");?>/'+id;
      // $('input[name=edit'+id+']').attr('disabled', true);
      var datakemanusian = {'id_promus':id};
      // window.location.reload();

      $.ajax({
       url : urlview,
       data : datakemanusian,
       dataType : 'json',
       type : 'POST',
       async : true,
       success : function(data,status){
         console.log(data);
         $('input[name=viewmarker'+id+']').attr('disabled',false);//disabled di set false, karena transaksi berhasil
         $('createMarker').attr('disabled',true);
         //$('createMarker').attr('disabled',true);
         var namapenerima = data[0].nama_mus;
         var noktp = data[0].no_ktp;
         var alamat = data[0].alamat_mus;
         var usia = data[0].usia;
         var lat = data[0].latitude;
         var lng = data[0].longitude;
         var kec = data[0].kecamatan;
         var kel = data[0].kelurahan;
         var peke = data[0].pekerjaan;
         var namprog = '';
         var jenis = '';
         var status = data[0].status_persetujuan;
         for (var i = 0; i < data.length; i++) {
           namprog += data[i].nama_program+'<br>';
           jenis += data[i].jenis_program+'<br>';
         }

         var latLng = new google.maps.LatLng(lat,lng);
              // var myLatLng = {lat: parseFloat(v["latitude"]), lng: parseFloat(v["longitude"])};
              // addMarker(v['namapenerima'],latLng,v['alamat'],v['programjenis']);
              infoWindow = new google.maps.InfoWindow();
              var image = new google.maps.MarkerImage('https://img.icons8.com/ios/26/000000/home.png');
              var marker = new google.maps.Marker({
                position: latLng,
                icon: image,
                map: map,
                title: 'Click to zoom'
              });
              // marker.addListener('click', function() {
              //   map.setZoom(17);
              //   map.setCenter(marker.getPosition());
              // });

              google.maps.event.addListener(marker,'click', function(){
                var html = '<p>Nama: <b>'+namapenerima+'</b></p>'+
                            '<p>No KTP: <b>'+noktp+'</b></p>'+
                            '<p>Alamat: <b>'+alamat+'</b></p>'+
                            '<p>Kelurahan: <b>'+kel+'</b></p>'+
                            '<p>Kecamatan: <b>'+kec+'</b></p>'+
                            '<p>Usia: <b>'+usia+'</b></p>'+
                            '<p>Alamat: <b>'+alamat+'</b></p>'+
                            '<p>Pekerjaan: <b>'+peke+'</b></p>'+
                            '<p>Status: <b>'+status+'</b></p>'+
                            '<table class="table table-bordered">'+
                              '<th>Nama Program</th>'+
                              '<th>Jenis</th>'+
                              '<tr>'+
                                '<td>'+namprog+'</td>'+
                                '<td>'+jenis+'</td>'+
                              '</tr>'+
                            '</table>';

                infoWindow.setContent(html);
                infoWindow.open(map, marker);
              })
       },
     })

    }
    $(document).ready(function(){
      $('#sukses-login').fadeOut('slow');

      $('#tabelProgramMus').DataTable({
        'paging'      : true,
        'lengthChange': true,
        'searching'   : true,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : false
      })
    });


    // console.log(hasil);
    // $('#sukses-tambah').fadeOut(600);

</script>


  </body>
</html>

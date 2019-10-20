<?php if($this->session->flashdata('sukses')){?>
  <div class="alert alert-success " role="alert" id="sukses-tambah">
    <?php echo $this->session->flashdata('sukses') ?>
   </div>
<?php }?>

    <section class="content-header">      
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('Home') ?>"></i><i class="fa fa-home"></i> Home</a></li>
      </ol>
    </section>

<div class="row">
    <div class="col-md-12">
      <section class="content-header">
        <h1 class="page-header">
           Halaman <small>Beranda</small>
        </h1>
      </section>
    

<div class="row">
  <div class="col-lg-4 col-xs-6">
    <div class="small-box bg-aqua">
      <div class="inner">
        <h3><?php  echo $this->db->count_all_results('mustahik'); ?></h3>

        <p>Jumlah Mustahik</p>
      </div>
      <div class="icon">
        <i class="ion ion-ios-person"></i>
      </div>
      <a href="<?php echo base_url('Mustahik') ?>" class="small-box-footer">Detail Info  <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>

  <div class="col-lg-4 col-xs-6">
    <div class="small-box bg-green">
      <div class="inner">
        <h3><?php $s =  $this->db->count_all_results('muzakki'); echo $s;?></h3>
     
        <p>Jumlah Muzakki</p>
       

      </div>
      <div class="icon">
        <i class="ion ion-ios-contact"></i>
      </div>
      <a href="<?php echo base_url('Muzakki') ?>" class="small-box-footer">Detail Info  <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>

  <div class="col-lg-4 col-xs-6">
    <div class="small-box bg-yellow">
      <div class="inner">
      
      <?php 
          $hasil = $this->db->query("SELECT * FROM rekening");
          $data = 0;
      foreach ($hasil->result_array() as $value) {
        $data += $value['saldo'];
      }echo "<h3 class='saldo'>".$data."</h3>";
      ?>
        <p>Total Saldo Rekening</p>
      </div>

      <div class="icon">
        <i class="ion ion-card"></i>
      </div>
      <a href="<?php echo base_url('Rekening') ?>" class="small-box-footer">Detail Info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
</div>


  

<div class="col-lg-6 col-xs-12">
    <div class="box box-info">
      <div class="box-header with-border">
        <i class="fa fa-briefcase"></i>
        <h3 class="box-title">Statistik <small>Data Program Mustahik</small></h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
          <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
      </div>
      <div class="box-body">
        <canvas id="myChart" style="height:250px"></canvas>
      </div>
    </div>
  </div>


<!-- <div class="col-lg-6 col-xs-12">
    <div class="box box-info">
      <div class="box-header with-border">
        <i class="fa fa-briefcase"></i>
        <h3 class="box-title">Statistik <small>Data Program Muzaki</small></h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
          <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
      </div>
      <div class="box-body">
        <canvas id="myChart2" style="height:250px"></canvas>
      </div>
    </div>
  </div> -->

  </div>
</div>
<script>
var ctx = document.getElementById("myChart").getContext('2d');


data = {
    datasets: [{
        data: [<?php echo $ProgramBeasiswaRumbaiCerdas ?>,
        <?php echo $ProgramPengobatanGratis ?>,
        <?php echo $ProgramMiskin?>,
        <?php echo $ProgramFaqir ?>,
        <?php echo $ProgramMiskinTanggap ?>,
        <?php echo $ProgramGharimin ?>,
        <?php echo $ProgramIbnu ?>,
        <?php echo $ProgramPasar ?>,
        <?php echo $ProgramModal ?>,
        <?php echo $ProgramFisabilillah ?>

        ],

        backgroundColor: [
        'blue',
        'green',
        'red',
        'yellow',
        'pink',
        'black',
        'brown',
        'cyan',
        'lightgreen',
        'lightblue'
    ]
    }],

    // These labels appear in the legend and in the tooltips when hovering different arcs
    labels: [
        'ProgramBeasiswaRumbaiCerdas',
        'ProgramPengobatanGratis',
        'ProgramMiskin',
        'ProgramFaqir',
        'ProgramMiskinTanggap',
        'ProgramGharimin',
        'ProgramIbnu',
        'ProgramPasar',
        'ProgramModal',
        'ProgramFisabilillah'
    ]
     
};

// And for a doughnut chart
var myDoughnutChart = new Chart(ctx, {
    type: 'doughnut',
    data: data,
    options: Chart.defaults.doughnut
});
</script>

<!-- ==================chart2===================== -->
<script>
var ctx2 = document.getElementById("myChart2").getContext('2d');


data = {
    datasets: [{
        data: [<?php echo $ProgramBeasiswaRumbaiCerdas ?>,
        <?php echo $ProgramPengobatanGratis ?>,
        <?php echo $ProgramMiskin?>,
        <?php echo $ProgramFaqir ?>,
        <?php echo $ProgramMiskinTanggap ?>,
        <?php echo $ProgramGharimin ?>,
        <?php echo $ProgramIbnu ?>,
        <?php echo $ProgramPasar ?>,
        <?php echo $ProgramModal ?>,
        <?php echo $ProgramFisabilillah ?>

        ],

        backgroundColor: [
        'green',
        'blue',
        'yellow',
        'red',
        'cyan',
        'pink',
        'brown',
        'black',
        'lightgreen',
        'lightblue'
    ]
    }],

    // These labels appear in the legend and in the tooltips when hovering different arcs
    labels: [
        'ProgramBeasiswaRumbaiCerdas',
        'ProgramPengobatanGratis',
        'ProgramMiskin',
        'ProgramFaqir',
        'ProgramMiskinTanggap',
        'ProgramGharimin',
        'ProgramIbnu',
        'ProgramPasar',
        'ProgramModal',
        'ProgramFisabilillah'
    ]
     
};


// And for a doughnut chart
var myDoughnutChart = new Chart(ctx, {
    type: 'doughnut',
    data: data,
    options: Chart.defaults.doughnut
});
</script>

<script src="<?php echo base_url() ?>assets/js/jquery.js" charset="utf-8"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $('#sukses-tambah').fadeOut(5000);

  }
</script>
<script src="<?php echo base_url() ?>assets/js/jquery.js" charset="utf-8"></script>
<script type="text/javascript">
  $(document).ready(function(){
    var saldo = $('.saldo').text();
    var td  = $('.saldo');

    for (var i = 0; i < td.length; i++) {
      td[i].innerHTML = "Rp "+td[i].innerText.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
    }
  });
</script>

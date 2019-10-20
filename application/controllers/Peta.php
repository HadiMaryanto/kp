<?php
class Peta extends CI_Controller{

    function __construct() {
        parent::__construct();
        $this->load->model('model_mustahik');
        $this->load->model('model_program');
        $this->load->model('model_peta');
        $this->load->model('model_rekening');
        $this->load->model('model_kecamatan');
        $this->load->model('model_kelurahan');
        chek_session();
    }
    // function index(){
    //   $data['record'] = $this->model_mustahik->tampilkan_data();
    //   $this->template->load('template', 'peta/map',$data);
    // }


    function lihatProgram()
    {

      $data = array('program_mustahik' => $this->model_peta->get_program_mustahik1());
      $data['detail_promus'] = $this->model_peta->get_program_mustahik();

      // $data['tes_program'] = $this->model_peta->get_join_penerima($idPenerima);
      // $data['record'] = $this->model_peta->tampilkan_data();
      $this->template->load('template', 'peta/map',$data);
    }

    function getMustahik()
    {
      $data['daftarMustahik'] =  $this->model_peta->get_mustahik();
      echo json_encode($data['daftarMustahik']);
    }

    function getProgramMustahik($id)
    {
      $data['programMustahik'] = $this->model_peta->get_programs($id);
      echo json_encode($data['programMustahik']);
    }

    function semua($idPenerima){
          $editPenerima = $this->model_peta->get_join_penerima($idPenerima);
          echo json_encode($editPenerima);
    }
    function detail($idPenerima){
      $data['detail_pro'] = $this->model_peta->detail_pro($idPenerima);
      $this->template->load('template', 'peta/map',$data);

    }
  }
 ?>

<?php
class Home extends CI_Controller{

function __construct() {
        parent::__construct();
        $this->load->model('model_home');
        $this->load->helper('date');
        // $this->load->library('calendar');
        chek_session();
    }

    function index()
    {
        $data['bln'] = $this->model_home->get_program_mustahik();
        $data['bln'] = $this->model_home->get_program_muzakki();
        $data['saldo'] = $this->model_home->getAllSaldo();
        $data['ProgramBeasiswaRumbaiCerdas'] = $this->model_home->countProgram(8);
        $data['ProgramPengobatanGratis'] = $this->model_home->countProgram(12);
        $data['ProgramMiskin'] = $this->model_home->countProgram(15);
        $data['ProgramFaqir'] = $this->model_home->countProgram(16);
        $data['ProgramMiskinTanggap'] = $this->model_home->countProgram(17);
        $data['ProgramGharimin'] = $this->model_home->countProgram(18);
        $data['ProgramIbnu'] = $this->model_home->countProgram(19);
        $data['ProgramPasar'] = $this->model_home->countProgram(20);
        $data['ProgramModal'] = $this->model_home->countProgram(21);
        $data['ProgramFisabilillah'] = $this->model_home->countProgram(22);

        $this->template->load('template','homes/lihat_data',$data);
    }
    

}

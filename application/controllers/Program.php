<?php
class Program extends CI_Controller{

    function __construct() {
        parent::__construct();
        $this->load->model('model_program');
        chek_session();
    }


    function index()
    {
        $data['record'] = $this->model_program->tampilkan_data();
        $this->template->load('template','program/lihat_data',$data);
    }
    
    function post()
    {
        if(isset($_POST['submit'])){
          $nama = $this->input->post('nama_program');
          $jenis = $this->input->post('jenis_program');


            $data  = array(
              'nama_program'=>$nama,
              'jenis_program'=>$jenis
            );

            $this->model_program->post($data);
            redirect('Program');
        }
        else{
            //$this->load->view('uangkeluar/form_input');


            $this->template->load('template','program/form_input');
        }
    }



    function edit()
    {
       if(isset($_POST['submit'])){
       		$id = $this->input->post('id_program');
          $nama = $this->input->post('nama_program');


            $data           = array('nama_program'=>$nama

            );
            $this->model_program->edit($data,$id);
            redirect('Program');
        }
        else{
            $id=  $this->uri->segment(3);
            $this->load->model('model_program');
            $data['record']     =  $this->model_program->get_one($id)->row_array();
            //$this->load->view('siswa/form_edit',$data);
            $this->template->load('template','program/form_edit',$data);
        }
    }


    function delete()
    {
        $id=  $this->uri->segment(3);
        $this->model_program->delete($id);
        redirect('Program');
    }
}
